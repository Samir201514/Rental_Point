<?php
session_start();

require_once "../Model/dbConnect.php";
require_once "../Model/authenticationModel.php";

$email = "";
$errors = [];
$successMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";

    if (empty($email)) {
        $errors["email"] = "Email is required";
    } 
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format";
    }

    if (empty($password)) {
        $errors["login"] = "Invalid email or password";
    }

    if (empty($errors)) {

        $user = loginUser($conn, $email, $password);

        if ($user) {

            $_SESSION["UserId"] = $user["UserId"];
            $_SESSION["Name"] = $user["Name"];
            $_SESSION["UserTypeId"] = $user["UserTypeId"];

            if ($user["UserTypeId"] == 1) {
                header("Location: ../Controller/userController.php");
            } 
            else {
                header("Location: ../View/user_views/userProfile.php");
            }

            exit();

        } else {
            $errors["login"] = "Invalid email or password";
        }
    }
}

require_once "../View/login.php";
?>
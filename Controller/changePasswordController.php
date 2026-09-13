<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/accountModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../Controller/userProfileController.php");
    exit();
}

$userId = $_SESSION["UserId"];
if (isset($_POST["currentPassword"])) { $current = $_POST["currentPassword"]; } else { $current = ""; }
if (isset($_POST["NewPassword"])) { $newPass = $_POST["NewPassword"]; } else { $newPass = ""; }
if (isset($_POST["againNewPassword"])) { $confirm = $_POST["againNewPassword"]; } else { $confirm = ""; }

$errors = array();
$currentHash = getPassword($conn, $userId);

if (!password_verify($current, $currentHash)) { $errors["currentPassword"] = "Current password is incorrect"; }
if (strlen($newPass) < 6) { $errors["NewPassword"] = "New password must be at least 6 characters"; }
if ($newPass !== $confirm) { $errors["againNewPassword"] = "Passwords do not match"; }

if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    header("Location: ../Controller/userProfileController.php");
    exit();
}

changePassword($conn, $userId, password_hash($newPass, PASSWORD_DEFAULT));
header("Location: ../Controller/userProfileController.php");
exit();
?>
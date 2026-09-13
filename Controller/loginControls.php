<?php
require_once "../models/adminModel.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pass     = $_POST["pass"];
    $usernameErr = "";
    $passErr     = "";
    $hasErr = false;

    if (empty($username)) {
        $hasErr = true;
        $usernameErr = "Username cannot be empty";
    }

    if (empty($pass)) {
        $hasErr = true;
        $passErr = "Password cannot be empty";
    }

    if ($hasErr) {
        header("Location: ../views/login.php?usernameErr=" . $usernameErr . "&passErr=" . $passErr);
    } else {
        $admin = login($username, $pass);
        if ($admin) {
            session_start();
            $_SESSION["adminId"]       = $admin["id"];
            $_SESSION["adminUsername"] = $admin["username"];
            header("Location: ../views/admin/adminDashboard.php");
        } else {
            header("Location: ../views/login.php?notFoundErr=" . "Invalid username or password");
        }
    }
}

?>

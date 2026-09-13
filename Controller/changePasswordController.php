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

if (isset($_POST["currentPassword"])) {
    $currentPassword = $_POST["currentPassword"];
} else {
    $currentPassword = "";
}

if (isset($_POST["NewPassword"])) {
    $newPassword = $_POST["NewPassword"];
} else {
    $newPassword = "";
}

if (isset($_POST["againNewPassword"])) {
    $confirmPassword = $_POST["againNewPassword"];
} else {
    $confirmPassword = "";
}

$errors = array();

$currentHash = getPassword($conn, $userId);

if (!password_verify($currentPassword, $currentHash)) {
    $errors["currentPassword"] = "Current password is incorrect";
}

if (empty($newPassword) || strlen($newPassword) < 6) {
    $errors["NewPassword"] = "New password must be at least 6 characters";
}

if ($newPassword !== $confirmPassword) {
    $errors["againNewPassword"] = "Passwords do not match";
}

if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    header("Location: ../Controller/userProfileController.php");
    exit();
}

$newHash = password_hash($newPassword, PASSWORD_DEFAULT);
changePassword($conn, $userId, $newHash);

header("Location: ../Controller/userProfileController.php");
exit();
?>
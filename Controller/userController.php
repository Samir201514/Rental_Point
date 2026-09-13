<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/adminModel.php";

if (!isset($_SESSION["UserId"]) || $_SESSION["UserTypeId"] != 1) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    removeUser($conn, (int)$_POST["id"]);
    header("Location: ../Controller/userController.php");
    exit();
}

$users = getAllUsers($conn);
require "../View/admin_views/user.php";
?>
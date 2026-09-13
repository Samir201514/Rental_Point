<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/adminModel.php";

if (!isset($_SESSION["UserId"]) || $_SESSION["UserTypeId"] != 1) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    if (isset($_POST["action"]) && $_POST["action"] == "resolve") {
        respondSupport($conn, $id, $_POST["response"], "Resolved");
    } else {
        respondSupport($conn, $id, $_POST["response"], "Pending");
    }
    header("Location: ../Controller/helpController.php");
    exit();
}

$helps = getAllSupport($conn);
require "../View/admin_views/help.php";
?>
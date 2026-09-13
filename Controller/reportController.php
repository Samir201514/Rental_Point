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
    if (isset($_POST["remove_post"])) {
        removePost($conn, $id);
    } elseif (isset($_POST["response"])) {
        respondReport($conn, $id, $_POST["response"], "Resolved");
    }
    header("Location: ../Controller/reportController.php");
    exit();
}

$reports = getAllReports($conn);
require "../View/admin_views/report.php";
?>
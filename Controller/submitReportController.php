<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/reportModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createReport($conn, $_SESSION["UserId"], (int)$_POST["postId"], $_POST["reportType"], $_POST["description"]);
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
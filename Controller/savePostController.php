<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/postModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["postId"])) {
    toggleSavedPost($conn, $_SESSION["UserId"], (int)$_POST["postId"]);
}

header("Location: " . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "../Controller/homeController.php"));
exit();
?>
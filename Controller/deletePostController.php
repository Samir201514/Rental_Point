<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/postModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["postId"])) {
    deletePost($conn, (int)$_POST["postId"], $_SESSION["UserId"]);
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
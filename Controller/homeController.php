<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/postModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

$posts = getAllPosts($conn);
require_once "../View/user_views/homepage.php";
?>
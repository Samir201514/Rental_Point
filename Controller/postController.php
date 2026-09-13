<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/postModel.php";
require_once "../Model/adminModel.php";

if (!isset($_SESSION["UserId"]) || $_SESSION["UserTypeId"] != 1) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    removePost($conn, (int)$_POST["id"]);
    header("Location: ../Controller/postController.php");
    exit();
}

$posts = getAllPosts($conn);
require_once "../View/admin_views/post.php";
?>
<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/postModel.php";
require_once "../Model/ownerPostModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

$postId = (int)$_GET["id"];
increaseViews($conn, $postId);

$post = getPostById($conn, $postId);
$facilities = getFacilities($conn, $postId);
$isOwnerViewingOwnPost = ($_SESSION["UserId"] == $post["UserId"]);

require_once "../View/user_views/postDetails.php";
?>
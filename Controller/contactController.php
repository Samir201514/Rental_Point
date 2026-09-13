<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/ownerPostModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

$postId = (int)$_GET["post_id"];
$contact = getPostContact($conn, $postId);
increaseContacts($conn, $postId);

echo json_encode($contact);
?>
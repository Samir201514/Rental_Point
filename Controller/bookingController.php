<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/bookingModel.php";
require_once "../Model/postModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = (int)$_POST["postId"];
    $post = getMyPost($conn, $postId);

    if ($post["UserId"] == $_SESSION["UserId"]) {
        die("You cannot book your own post.");
    }

    createBooking($conn, $postId, $_SESSION["UserId"], $_POST["preferredDateTime"], $_POST["note"]);
}

header("Location: ../Controller/postDetailsController.php?id=" . $postId);
exit();
?>
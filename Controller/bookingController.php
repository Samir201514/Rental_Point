<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/bookingModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $postId = (int)$_POST["post_id"];
    $dateTime = $_POST["preferred_datetime"];
    $note = $_POST["note"];

    createBooking($conn, $postId, $_SESSION["UserId"], $dateTime, $note);
}

header("Location: " . (isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "../Controller/homeController.php"));
exit();
?>
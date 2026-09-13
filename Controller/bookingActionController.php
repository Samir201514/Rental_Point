<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/bookingModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    updateBookingStatus($conn, (int)$_POST["booking_id"], $_POST["new_status"]);
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
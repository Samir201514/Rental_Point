<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/userModel.php";
require_once "../Model/postModel.php";
require_once "../Model/ownerPostModel.php";
require_once "../Model/bookingModel.php";
require_once "../Model/reportModel.php";
require_once "../Model/supportModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

$userId = $_SESSION["UserId"];
$user = getUser($conn, $userId);

if (!$user) {
    session_destroy();
    header("Location: ../View/login.php");
    exit();
}

$userPref = array();
if ($user["UserTypeId"] == 3) {
    $userPref = getUserPreference($conn, $userId);
}

$ownerStats = array();
$perPostStats = null;
$myVerification = null;
if ($user["UserTypeId"] == 2) {
    $ownerStats = getOwnerStats($conn, $userId);
    $perPostStats = getPerPostStats($conn, $userId);
    $myVerification = getMyVerification($conn, $userId);
}

$myBookingsSent = getMyBookingSent($conn, $userId);
$myBookingsReceived = getMyBookingReceived($conn, $userId);
$myReports = getMyReports($conn, $userId);
$mySupport = getMySupport($conn, $userId);
$myPosts = getMyPosts($conn, $userId);
$savedPosts = getSavedPosts($conn, $userId);

require_once "../View/user_views/userProfile.php";
?>
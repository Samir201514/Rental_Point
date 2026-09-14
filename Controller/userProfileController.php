<?php
session_start();

require_once "../Model/dbConnect.php";
require_once "../Model/userProfileModel.php";


$userId = $_SESSION["UserId"];

$user = getUserById($conn, $userId);

if (!$user) {
    session_destroy();
    header("Location: ../View/login.php");
    exit();
}

$userPref = array();
if ($user["UserTypeId"] == 3) {
    $userPref = getUserPreference($conn, $userId);
}

$postStats = array();
$perPostAnalytics = null;
if ($user["UserTypeId"] == 2) {
    $postStats = getUserPostStats($conn, $userId);
    $perPostAnalytics = getPerPostAnalytics($conn, $userId);
}

$bookingsReceived = getBookingsReceived($conn, $userId);
$myReports = getMyReports($conn, $userId);
$mySupportTickets = getMySupportTickets($conn, $userId);
$myPosts = getMyPosts($conn, $userId);
$savedPosts = getSavedPostsForUser($conn, $userId);

require_once "../View/user_views/userProfile.php";
?>
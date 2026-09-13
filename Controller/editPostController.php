<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/postModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

$userId = $_SESSION["UserId"];

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $postId = (int)$_GET["id"];
    $post = getPostForEdit($conn, $postId, $userId);
    if (!$post) { die("Post not found or you don't have permission to edit it."); }
    require_once "../View/user_views/editPost.php";
    exit();
}

$postId = (int)$_POST["postId"];

updatePost($conn, $postId, $userId, $_POST["title"], $_POST["description"],
    $_POST["bedrooms"], $_POST["bathrooms"], $_POST["monthlyRent"], $_POST["serviceCharge"],
    $_POST["tenantPreference"], $_POST["genderPref"], $_POST["availableFrom"], $_POST["location"]);

deleteFacilities($conn, $postId);
if (!empty($_POST["facilities"])) {
    foreach ($_POST["facilities"] as $facility) {
        addFacility($conn, $postId, $facility);
    }
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
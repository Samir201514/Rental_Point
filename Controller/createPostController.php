<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/postModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    require_once "../View/user_views/createPost.php";
    exit();
}

$userId = $_SESSION["UserId"];
$postTypeId = (int)$_POST["postTypeId"];

if ($_SESSION["UserTypeId"] == 2 && $postTypeId != 1) {
    die("Owners can only create Rental listings.");
}
if ($_SESSION["UserTypeId"] == 3 && $postTypeId == 1) {
    die("Tenants cannot create Rental listings.");
}

$postId = createPost($conn, $userId, $postTypeId, $_POST["title"], $_POST["description"],
    $_POST["bedrooms"], $_POST["bathrooms"], $_POST["monthlyRent"], $_POST["serviceCharge"],
    $_POST["tenantPreference"], $_POST["genderPref"], $_POST["availableFrom"], $_POST["location"]);

if (isset($_FILES["post_image"]) && $_FILES["post_image"]["error"] == 0) {
    $ext = pathinfo($_FILES["post_image"]["name"], PATHINFO_EXTENSION);
    $imagePath = "storage/user/post/post_" . $postId . "." . $ext;
    $dir = "../storage/user/post/";
    if (!is_dir($dir)) { mkdir($dir, 0777, true); }
    move_uploaded_file($_FILES["post_image"]["tmp_name"], "../" . $imagePath);
    mysqli_query($conn, "UPDATE post SET ImagePath = '$imagePath' WHERE PostId = $postId");
}

if (!empty($_POST["facilities"])) {
    foreach ($_POST["facilities"] as $facility) {
        addFacility($conn, $postId, $facility);
    }
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/userModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

$userId = $_SESSION["UserId"];

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $user = getUser($conn, $userId);
    $userPref = array();
    if ($user["UserTypeId"] == 3) {
        $userPref = getUserPreference($conn, $userId);
    }
    require_once "../View/user_views/editUserProfile.php";
    exit();
}

if (isset($_POST["name"])) { $name = trim($_POST["name"]); } else { $name = ""; }
if (isset($_POST["gender"])) { $gender = $_POST["gender"]; } else { $gender = ""; }
if (isset($_POST["phone"])) { $phone = trim($_POST["phone"]); } else { $phone = ""; }
if (isset($_POST["location"])) { $location = trim($_POST["location"]); } else { $location = ""; }

$errors = array();

if ($name == "") { $errors["name"] = "Name is required"; }
if (!preg_match("/^01[3-9][0-9]{8}$/", $phone)) { $errors["phone"] = "Invalid phone number"; }
if ($location == "") { $errors["location"] = "Current location is required"; }

$existingUser = getUser($conn, $userId);
$profilePhoto = $existingUser["ProfilePhoto"];

if (isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] != UPLOAD_ERR_NO_FILE) {
    if ($_FILES["profile_photo"]["error"] != UPLOAD_ERR_OK) {
        $errors["profile_photo"] = "There was a problem uploading the photo";
    } else {
        $ext = strtolower(pathinfo($_FILES["profile_photo"]["name"], PATHINFO_EXTENSION));
        if (!in_array($ext, array("jpg", "jpeg", "png"))) {
            $errors["profile_photo"] = "Only JPG, JPEG, PNG allowed";
        } elseif (getimagesize($_FILES["profile_photo"]["tmp_name"]) === false) {
            $errors["profile_photo"] = "Uploaded file is not a valid image";
        } else {
            $dir = "../storage/user/profile/";
            if (!is_dir($dir)) { mkdir($dir, 0777, true); }
            $newFileName = "profile_" . time() . "_" . uniqid() . "." . $ext;
            if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $dir . $newFileName)) {
                $profilePhoto = "storage/user/profile/" . $newFileName;
            } else {
                $errors["profile_photo"] = "Failed to save photo";
            }
        }
    }
}

if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    header("Location: ../Controller/editUserProfileController.php");
    exit();
}

updateUser($conn, $profilePhoto, $name, $gender, $phone, $location, $userId);

if ($existingUser["UserTypeId"] == 3) {
    if (isset($_POST["lookingFor"])) { $lookingFor = $_POST["lookingFor"]; } else { $lookingFor = ""; }
    if (isset($_POST["minBudget"])) { $minBudget = $_POST["minBudget"]; } else { $minBudget = 0; }
    if (isset($_POST["maxBudget"])) { $maxBudget = $_POST["maxBudget"]; } else { $maxBudget = 0; }
    if (isset($_POST["prefLocation"])) { $prefLocation = trim($_POST["prefLocation"]); } else { $prefLocation = ""; }
    if (isset($_POST["moveInDate"])) { $moveInDate = $_POST["moveInDate"]; } else { $moveInDate = ""; }
    if (isset($_POST["occupation"])) { $occupation = trim($_POST["occupation"]); } else { $occupation = ""; }

    updateUserPreference($conn, $lookingFor, $minBudget, $maxBudget, $prefLocation, $moveInDate, $occupation, $userId);
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
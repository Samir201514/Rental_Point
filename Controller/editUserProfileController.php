<?php
session_start();

require_once "../Model/dbConnect.php";
require_once "../Model/userProfileModel.php";
require_once "../Model/editProfileModel.php";
require_once "../Model/authenticationModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

$userId = $_SESSION["UserId"];

// ---- GET: load current data to prefill the Edit Profile form ----
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $user = getUserById($conn, $userId);
    $userPref = array();
    if ($user["UserTypeId"] == 3) {
        $userPref = getUserPreference($conn, $userId);
    }
    require_once "../View/user_views/editProfile.php";
    exit();
}

// ---- POST: save changes ----
if (isset($_POST["name"])) {
    $name = trim($_POST["name"]);
} else {
    $name = "";
}

if (isset($_POST["gender"])) {
    $gender = $_POST["gender"];
} else {
    $gender = "";
}

if (isset($_POST["phone"])) {
    $phone = trim($_POST["phone"]);
} else {
    $phone = "";
}

if (isset($_POST["location"])) {
    $location = trim($_POST["location"]);
} else {
    $location = "";
}

$errors = array();

if (empty($name)) {
    $errors["name"] = "Full Name is required";
}

if (empty($phone)) {
    $errors["phone"] = "Phone Number is required";
}

if (empty($location)) {
    $errors["location"] = "Current Location is required";
}

// Keep existing photo unless a new one is uploaded
$existingUser = getUserById($conn, $userId);
$profilePhoto = $existingUser["ProfilePhoto"];

if (isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] != UPLOAD_ERR_NO_FILE) {
    if ($_FILES["profile_photo"]["error"] != UPLOAD_ERR_OK) {
        $errors["profile_photo"] = "There was a problem uploading the photo";
    } else {
        $fileName = $_FILES["profile_photo"]["name"];
        $fileTmp = $_FILES["profile_photo"]["tmp_name"];
        $fileSize = $_FILES["profile_photo"]["size"];
        $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = array("jpg", "jpeg", "png");

        if (!in_array($extension, $allowedExtensions)) {
            $errors["profile_photo"] = "Only JPG, JPEG and PNG files are allowed";
        }

        if ($fileSize > 2 * 1024 * 1024) {
            $errors["profile_photo"] = "Profile photo must be less than 2MB";
        }

        if (empty($errors["profile_photo"])) {
            $checkImage = getimagesize($fileTmp);
            if ($checkImage === false) {
                $errors["profile_photo"] = "Uploaded file is not a valid image";
            }
        }

        if (empty($errors["profile_photo"])) {
            $profileDirectory = "../storage/user/profile/";
            if (!is_dir($profileDirectory)) {
                mkdir($profileDirectory, 0777, true);
            }
            $newFileName = "profile_" . time() . "_" . uniqid() . "." . $extension;
            $filePath = $profileDirectory . $newFileName;

            if (move_uploaded_file($fileTmp, $filePath)) {
                $profilePhoto = "storage/user/profile/" . $newFileName;
            } else {
                $errors["profile_photo"] = "Failed to save profile photo";
            }
        }
    }
}

if (!empty($errors)) {
    $_SESSION["errors"] = $errors;
    $_SESSION["old"] = array("name" => $name, "gender" => $gender, "phone" => $phone, "location" => $location);
    header("Location: ../Controller/editProfileController.php");
    exit();
}

updateUser($conn, $profilePhoto, $name, $gender, $phone, $location, $userId);

// Tenant also updates their UserPreference
if ($existingUser["UserTypeId"] == 3) {
    if (isset($_POST["looking_for"])) {
        $lookingFor = $_POST["looking_for"];
    } else {
        $lookingFor = "";
    }

    if (isset($_POST["min_budget"])) {
        $minBudget = $_POST["min_budget"];
    } else {
        $minBudget = 0;
    }

    if (isset($_POST["max_budget"])) {
        $maxBudget = $_POST["max_budget"];
    } else {
        $maxBudget = 0;
    }

    if (isset($_POST["pref_location"])) {
        $prefLocation = trim($_POST["pref_location"]);
    } else {
        $prefLocation = "";
    }

    if (isset($_POST["move_in_date"])) {
        $moveInDate = $_POST["move_in_date"];
    } else {
        $moveInDate = "";
    }

    if (isset($_POST["occupation"])) {
        $occupation = trim($_POST["occupation"]);
    } else {
        $occupation = "";
    }

    updateUserPreference($conn, $lookingFor, $minBudget, $maxBudget, $prefLocation, $moveInDate, $occupation, $userId);
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
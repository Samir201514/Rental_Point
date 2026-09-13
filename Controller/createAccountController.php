<?php
require_once "../Model/dbConnect.php";
require_once "../Model/authModel.php";

$fullName = '';
$email = '';
$phone = '';
$gender = '';
$accountType = '';
$location = '';
$lookingFor = '';
$minBudget = '';
$maxBudget = '';
$prefLocation = '';
$moveInDate = '';
$occupation = '';
$errors = [];

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../View/create-account.php");
    exit();
}

$fullName = trim($_POST["full_name"] ?? '');
$email = trim($_POST["email"] ?? '');
$phone = trim($_POST["phone"] ?? '');
$password = $_POST["password"] ?? '';
$confirmPassword = $_POST["confirm_password"] ?? '';
$gender = $_POST["gender"] ?? '';
$accountType = $_POST["account_type"] ?? '';
$location = trim($_POST["location"] ?? '');
$lookingFor = $_POST["looking_for"] ?? '';
$minBudget = $_POST["min_budget"] ?? '';
$maxBudget = $_POST["max_budget"] ?? '';
$prefLocation = trim($_POST["pref_location"] ?? '');
$moveInDate = $_POST["move_in_date"] ?? '';
$occupation = trim($_POST["occupation"] ?? '');

if (empty($fullName)) {
    $errors["full_name"] = "Full Name is required";
}

if (empty($email)) {
    $errors["email"] = "Email Address is required";
} 
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors["email"] = "Invalid email format";
} 
elseif (checkDuplicateEmail($conn, $email)) {
    $errors["email"] = "This email is already registered";
}

if (empty($phone)) {
    $errors["phone"] = "Phone Number is required";
}

if (empty($password)) {
    $errors["password"] = "Password is required";
} 
elseif (strlen($password) < 6) {
    $errors["password"] = "Password must be at least 6 characters";
}

if (empty($confirmPassword)) {
    $errors["confirm_password"] = "Confirm Password is required";
} 
elseif ($password !== $confirmPassword) {
    $errors["confirm_password"] = "Passwords do not match";
}

if (empty($gender)) {
    $errors["gender"] = "Gender is required";
} 
elseif ($gender != "Male" && $gender != "Female") {
    $errors["gender"] = "Invalid gender";
}

if (empty($accountType)) {
    $errors["account_type"] = "Account Type is required";
} 
elseif ($accountType != "tenant" && accountType != "owner") 
{
    $errors["account_type"] = "Invalid account type";
}

if (empty($location)) {
    $errors["location"] = "Current Location is required";
}

if (!isset($_POST["terms"])) {
    $errors["terms"] =  "You must agree to the Terms & Conditions";
}

if (!isset($_POST["privacy"])) {
    $errors["privacy"] = "You must agree to the Privacy Policy";
}

if ($accountType == "tenant") {
    if (empty($lookingFor)) {
        $errors["looking_for"] =  "Please select what you are looking for";
    }

    if ($minBudget !== '' && (!is_numeric($minBudget) || $minBudget < 0))
    {
        $errors["min_budget"] = "Invalid minimum budget";
    }

    if ($maxBudget !== '' && (!is_numeric($maxBudget) || $maxBudget < 0)) {
        $errors["max_budget"] = "Invalid maximum budget";
    }

    if ($minBudget !== '' && $maxBudget !== '' && $minBudget > $maxBudget) {
        $errors["max_budget"] = "Maximum budget must be greater than minimum budget";
    }

    if (empty($prefLocation)) {
        $errors["pref_location"] = "Preferred Location is required";
    }

    if (empty($moveInDate)) {
        $errors["move_in_date"] = "Move-in Date is required";
    }

    if (empty($occupation)) {
        $errors["occupation"] = "Occupation is required";
    }
}

$profilePhoto = "storage/user/profile/default.png";

if (isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] != UPLOAD_ERR_NO_FILE) {
    if ($_FILES["profile_photo"]["error"] != UPLOAD_ERR_OK) {
        $errors["profile_photo"] = "There was a problem uploading the photo";
    } 
    else {

        $fileName = $_FILES["profile_photo"]["name"];
        $fileTmp = $_FILES["profile_photo"]["tmp_name"];
        $fileSize = $_FILES["profile_photo"]["size"];

        $extension = strtolower( pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedExtensions = ["jpg", "jpeg","png"];

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
                mkdir($profileDirectory, 0777,true);
            }

            $newFileName = "profile_" . time() . "_" . uniqid() . "." . $extension;

            $filePath = $profileDirectory . $newFileName;

            if (move_uploaded_file($fileTmp,$filePath)) {
                $profilePhoto ="Storage/User/Profile/" . $newFileName;
            } 
            else {
                $errors["profile_photo"] ="Failed to save profile photo";
            }
        }
    }
}

if (!empty($errors)) {
    header("Location: ../View/create-account.php");
    exit();
}

if ($accountType == "owner") {
    $userTypeId = 2;
} 
else {
    $userTypeId = 3;
}

$passwordHash = password_hash($password,PASSWORD_DEFAULT);
$userId = addUser($conn, $profilePhoto, $fullName, $passwordHash, $gender, $userTypeId, $email, $phone, $location);

if ($accountType == "tenant") {
    $minBudgetValue = ($minBudget === '') ? 0 : $minBudget;
    $maxBudgetValue =($maxBudget === '') ? 0 : $maxBudget;
    addUserPreference( $conn,$userId,$lookingFor,$minBudgetValue,$maxBudgetValue,$prefLocation,$moveInDate,$occupation);
}

header("Location: ../View/create-account.php?success=1");
exit();
?>
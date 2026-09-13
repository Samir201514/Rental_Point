<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/ownerPostModel.php";

if (!isset($_SESSION["UserId"]) || $_SESSION["UserTypeId"] != 2) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = $_SESSION["UserId"];
    $errors = array();

    if ($_FILES["VerifyDocPath"]["error"] == UPLOAD_ERR_NO_FILE) {
        $errors["file"] = "A document is required";
    } elseif ($_FILES["VerifyDocPath"]["type"] != "application/pdf") {
        $errors["file"] = "Only PDF files are allowed";
    } elseif ($_FILES["VerifyDocPath"]["size"] > (10 * 1024 * 1024)) {
        $errors["file"] = "File is too large, max 10MB";
    }

    if (empty($errors)) {
        $dir = "../storage/owner/propertydocument/";
        if (!is_dir($dir)) { mkdir($dir, 0775, true); }
        $fileName = "doc_" . $userId . "_" . time() . ".pdf";

        if (move_uploaded_file($_FILES["VerifyDocPath"]["tmp_name"], $dir . $fileName)) {
            submitVerificationDoc($conn, $userId, "storage/owner/propertydocument/" . $fileName);
        } else {
            $errors["file"] = "File could not be saved";
        }
    }

    $_SESSION["errors"] = $errors;
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
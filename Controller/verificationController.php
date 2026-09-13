<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/adminModel.php";

if (!isset($_SESSION["UserId"]) || $_SESSION["UserTypeId"] != 1) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $id = (int)$_POST["id"];
    $status = $_POST["status"];
    $response = $_POST["response"];

    respondVerification($conn, $id, $response, $status);

    if ($status == "Approved") {
        $owner = getVerificationOwner($conn, $id);
        setUserVerified($conn, $owner["UserId"], 1);
    }

    header("Location: ../Controller/verificationController.php");
    exit();
}

$rows = getVerificationDocs($conn);
require "../View/admin_views/verification.php";
?>
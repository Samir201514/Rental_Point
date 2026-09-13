<?php
require_once "../models/adminModel.php";

session_start();
if (!isset($_SESSION["adminId"])) {
    header("Location: ../views/login.php");
    exit;
}

$allowedStatuses = ["Approved", "Rejected"];

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"]) && in_array($_POST["status"] ?? "", $allowedStatuses, true)) {
    $id     = (int) $_POST["id"];
    $status = $_POST["status"];
    updateVerification($id, $status);
    header("Location: ../views/admin/verification.php?msg=Verification " . $status);
} else {
    header("Location: ../views/admin/verification.php?err=Invalid request");
}

?>

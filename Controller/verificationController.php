<?php

require_once "../Model/dbConnect.php";
require_once "../Model/adminModel.php";

// session_start();
// if (!isset($_SESSION["adminId"])) {
//     header("Location: ../views/login.php");
//     exit;
// }
$rows = getVerificationDocs($conn);
// $allowedStatuses = ["Approved", "Rejected"];

require "../View/admin_views/verification.php";

// if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"]) && in_array($_POST["status"] ?? "", $allowedStatuses, true)) {
//     $id     = (int) $_POST["id"];
//     $status = $_POST["status"];
//     updateVerification($id, $status);
//     header("Location: ../views/admin/verification.php?msg=Verification " . $status);
// } else {
//     header("Location: ../views/admin/verification.php?err=Invalid request");
// }

?>

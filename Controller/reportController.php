<?php
require_once "../Model/dbConnect.php";
require_once "../Model/adminModel.php";

// session_start();
// if (!isset($_SESSION["adminId"])) {
//     header("Location: ../views/login.php");
//     exit;
// }
$reports = getAllReports($conn);

require "../View/admin_views/report.php";
// if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"]) && ($_POST["status"] ?? "") == "Resolved") {
//     $id = (int) $_POST["id"];
//     updateReport($id, "Resolved");
//     header("Location: ../views/admin/reports.php?msg=Report resolved");
// } else {
//     header("Location: ../views/admin/reports.php?err=Invalid request");
// }

?>

<?php
require_once "../Model/dbConnect.php";
require_once "../Model/adminModel.php";

session_start();

$reports = getAllReports($conn);

require "../View/admin_views/report.php";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"]) && ($_POST["status"] ?? "") == "Resolved") {
    $id = (int) $_POST["id"];
    updateReport($id, "Resolved");
    header("Location: ../View/admin_views/report.php?msg=Report resolved");
} else {
    // header("Location: ../View/admin_views/report.php?err=Invalid request");
}
?>
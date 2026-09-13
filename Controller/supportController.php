<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/supportModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    createSupport($conn, $_SESSION["UserId"], $_POST["subject"], $_POST["description"]);
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
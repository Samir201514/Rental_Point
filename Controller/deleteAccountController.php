<?php
session_start();
require_once "../Model/dbConnect.php";
require_once "../Model/accountModel.php";

if (!isset($_SESSION["UserId"])) {
    header("Location: ../View/login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirm_delete"])) {
    deleteAccount($conn, $_SESSION["UserId"]);
    session_destroy();
    header("Location: ../View/login.php?deleted=1");
    exit();
}

header("Location: ../Controller/userProfileController.php");
exit();
?>
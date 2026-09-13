<?php
require_once "../models/adminModel.php";

session_start();
if (!isset($_SESSION["adminId"])) {
    header("Location: ../views/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"])) {
    $id = (int) $_POST["id"];
    removeUser($id);
    header("Location: ../views/admin/users.php?msg=User removed");
} else {
    header("Location: ../views/admin/users.php?err=Invalid request");
}

?>

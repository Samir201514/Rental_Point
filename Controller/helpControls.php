<?php
require_once "../models/adminModel.php";

session_start();
if (!isset($_SESSION["adminId"])) {
    header("Location: ../views/login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"])) {
    $id     = (int) $_POST["id"];
    $action = $_POST["action"] ?? "";

    if ($action == "reply" && trim($_POST["admin_reply"] ?? "") !== "") {
        replyHelpTicket($id, trim($_POST["admin_reply"]));
        header("Location: ../views/admin/help.php?msg=Reply sent");
    } elseif ($action == "resolve") {
        resolveHelpTicket($id);
        header("Location: ../views/admin/help.php?msg=Ticket resolved");
    } else {
        header("Location: ../views/admin/help.php?err=Invalid request");
    }
} else {
    header("Location: ../views/admin/help.php?err=Invalid request");
}

?>

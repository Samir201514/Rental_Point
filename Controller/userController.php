<?php
    session_start();
    require_once "../Model/dbConnect.php";
    require_once "../Model/adminModel.php";

    // if (!isset($_SESSION["userId"])) {
    //     header("Location: ../views/login.php");
    //     exit;
    // }

    $users = getAllUsers($conn);

    require "../View/admin_views/user.php";

    // if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"])) 
    // {
    //     $id = (int) $_POST["id"];
    //     removeUser($id);
    //     header("Location: ../views/admin/users.php?msg=User removed");
    // } 
    // else 
    // {
    //     header("Location: ../views/admin/users.php?err=Invalid request");
    // }
?>

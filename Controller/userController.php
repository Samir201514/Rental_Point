<?php
    session_start();
    require_once "../Model/dbConnect.php";
    require_once "../Model/adminModel.php";


    $users = getAllUsers($conn);

    require "../View/admin_views/user.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"])) 
    {
        $id = (int) $_POST["id"];
        removeUser($id);
        header("Location: ../View/admin_views/user.php?msg=User removed");
    } 
    else 
    {
        // header("Location: ../View/admin_views/user.php?err=Invalid request");
    }
?>

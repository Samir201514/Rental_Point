<?php
require_once "../Model/dbConnect.php";
require_once "../Model/adminModel.php";

// session_start();
// if (!isset($_SESSION["adminId"])) {
//     header("Location: ../views/login.php");
//     exit;
// }
$posts = getAllPosts($conn);
require "../View/admin_views/posts.php";
// if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["id"]) && ($_POST["action"] ?? "") == "remove") {
//     $id = (int) $_POST["id"];
//     removePost($id);

//     // Reports/posts pages both submit here, so send the admin back to
//     // whichever page the form came from.
//     $from = $_SERVER["HTTP_REFERER"] ?? "../views/admin/posts.php";
//     if (strpos($from, "reports.php") !== false) {
//         header("Location: ../views/admin/reports.php?msg=Post removed from database");
//     } else {
//         header("Location: ../views/admin/posts.php?msg=Post removed from database");
//     }
// } else {
//     header("Location: ../views/admin/posts.php?err=Invalid request");
// }

?>

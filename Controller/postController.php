<?php
require_once __DIR__. '/../Model/dbConnect.php';
require_once __DIR__ . '/../Model/postModel.php';

function fetchHomePagePosts($conn) {
    return getAllPosts($conn);
}
    $posts = getAllPosts($conn);
    require_once '../View/admin_views/post.php';
?>
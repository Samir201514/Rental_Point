<?php
require_once __DIR__. '/../Model/dbConnect.php';
require_once __DIR__ . '/../Model/postModel.php';

// Function to fetch posts for view pages
function fetchHomePagePosts($conn) {
    return getAllPosts($conn);
}

// Only execute the admin view loading if this file is called directly
if (basename($_SERVER['PHP_SELF']) === 'postController.php') {
    $posts = getAllPosts($conn);
    require_once __DIR__ . '/../View/admin_views/post.php';
}
?>
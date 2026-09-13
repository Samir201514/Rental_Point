<?php
session_start();

// Include the database connection and model files
require_once __DIR__ . '/../../Controller/postController.php';
// Check if user is logged in (Fallback to default values if session is not active)
$logged_in_user = array(
    "name"     => $_SESSION['user_name'] ?? "Guest User",
    "greeting" => "Welcome",
    "avatar"   => $_SESSION['user_avatar'] ?? "https://i.pravatar.cc/100?img=11"
);

// Fetch posts from database using the $conn variable from dbConnect.php
$postsResult = getAllPosts($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Point - Home</title>
    <link rel="stylesheet" href="./css/homepage.css">
    <script src="js/homepage.js" defer></script>
</head>
<body>

    <!-- Top Header Navigation Bar -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                
                <!-- Brand Logo -->
                <a href="homepage.php" class="brand-logo">
                    <span class="logo-icon">&#8962;</span>
                    Rental Point
                </a>

                <!-- Search Input Bar -->
                <div class="search-box">
                    <span class="search-icon">&#128065;</span>
                    <input type="text" placeholder="Search by area, rent, or amenities...">
                </div>

                <!-- User Greeting & Profile Widget -->
                <div class="user-profile-menu">
                    <span><?php echo htmlspecialchars($logged_in_user['greeting']) . ', ' . htmlspecialchars($logged_in_user['name']); ?></span>
                    <img src="<?php echo htmlspecialchars($logged_in_user['avatar']); ?>" alt="User Avatar" class="user-avatar-sm">
                    <span>&#9660;</span>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Layout -->
    <div class="container">
        <div class="main-layout">
            
            <!-- Left Navigation Sidebar -->
            <aside class="sidebar">
                <ul class="sidebar-menu">
                    <li class="sidebar-item">
                        <a href="homepage.php" class="sidebar-link active">
                            <span>&#8962;</span> Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="userProfile.php" class="sidebar-link">
                            <span>&#128100;</span> Profile
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="my_posts.php" class="sidebar-link">
                            <span>&#128196;</span> My Post
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="saved_posts.php" class="sidebar-link">
                            <span>&#128101;</span> Saved Post
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="settings.php" class="sidebar-link">
                            <span>&#9881;</span> Settings
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="help.php" class="sidebar-link">
                            <span>&#10067;</span> Help
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="index.php" class="sidebar-link text-danger">
                            <span>&#10140;</span> Logout
                        </a>
                    </li>
                </ul>
            </aside>

            <!-- Feed Content Section -->
            <main class="feed-content">
                
                <!-- Create Post Bar -->
                <div class="create-post-card">
                    <img src="<?php echo htmlspecialchars($logged_in_user['avatar']); ?>" alt="User Avatar" class="avatar">
                    <input type="text" placeholder="What are you looking for or offering today?" class="create-post-input">
                    <a href="create_post.php" class="btn-create-post" style="text-decoration: none;">+ Create Post</a>
                </div>

                <!-- Category Filter Area -->
                <div class="filter-section">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Rental</button>
                    <button class="filter-btn">Roommate</button>
                    <button class="filter-btn">Sublet</button>
                </div>

                <!-- Listing Cards Loop (Database Results) -->
                 <?php
if ($postsResult && mysqli_num_rows($postsResult) > 0) {
    while ($item = mysqli_fetch_assoc($postsResult)) {
        $facilitiesResult = getFacilities($conn, $item['PostId']);
        
        // Handle database image path resolution
        if (!empty($item['ImagePath'])) {
            // Replace any Windows backslashes with forward slashes
            $cleanPath = str_replace('\\', '/', $item['ImagePath']);
            
            // Navigate up from View/user_views/ to the project root directory
            $imagePath = '../../' . ltrim($cleanPath, '/');
        } else {
            // Fallback default image if ImagePath is empty
            $imagePath = 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80';
        }

        $avatarPath = 'https://i.pravatar.cc/100?img=' . ($item['PosterId'] % 70);
        $formattedDate = date("d M Y, g:i A", strtotime($item['CreatedAt']));
?>
                    <article class="listing-card">
                        
                        <!-- Property Image & Action Overlay -->
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="Property Image">
                            <span class="badge"><?php echo htmlspecialchars($item['PostType'] ?? 'For Rent'); ?></span>
                            
                            <div class="action-icons-top">
                                <a href="sucesspopup.php?msg=Post" class="icon-circle-btn" title="Edit">&#9998;</a>
                                <a href="reportpopup.php" class="icon-circle-btn" title="report">&#10150;</a>
                            </div>
                        </div>

                        <!-- Details Section -->
                        <div class="card-body">
                            
                            <div class="card-header">
                                <div class="price">৳ <?php echo number_format($item['MonthlyRent']); ?> / mo</div>
                                <div class="location">
                                    <span class="location-icon">&#10084;</span>
                                    <?php echo htmlspecialchars($item['Location']); ?>
                                </div>
                            </div>

                            <h2 class="card-title"><?php echo htmlspecialchars($item['Title']); ?></h2>

                            <!-- Amenities Tags List fetched from Database -->
                            <div class="tag-list">
                                <?php 
                                if ($facilitiesResult && mysqli_num_rows($facilitiesResult) > 0) {
                                    while ($fac = mysqli_fetch_assoc($facilitiesResult)) {
                                        echo '<span class="tag">' . htmlspecialchars($fac['Facility']) . '</span>';
                                    }
                                }
                                ?>
                            </div>

                            <!-- Footer Section -->
                            <div class="card-footer">
                                <div class="owner-info">
                                    <img src="<?php echo htmlspecialchars($avatarPath); ?>" alt="Owner Avatar" class="avatar">
                                    <div class="owner-details">
                                        <div class="owner-name">
                                            <?php echo htmlspecialchars($item['PosterName']); ?>
                                        </div>
                                        <span class="owner-role">Member</span>
                                    </div>
                                </div>

                                <div class="footer-right">
                                    <a href="listing_details.php?id=<?php echo $item['PostId']; ?>" class="btn-details">Details</a>
                                    <span class="post-date">Posted <?php echo $formattedDate; ?></span>
                                </div>
                            </div>

                        </div>

                    </article>
                <?php
                    }
                } else {
                ?>
                    <div class="create-post-card">
                        <p>No listings found in the database.</p>
                    </div>
                <?php
                }
                ?>

            </main>

        </div>
    </div>

    <!-- Footer Area -->
    <footer class="footer">
        <div class="container">
            
            <div class="footer-grid">
                <div>
                    <a href="homepage.php" class="brand-logo" style="margin-bottom: 10px;">
                        <span class="logo-icon">&#8962;</span>
                        Rental Point
                    </a>
                    <p class="footer-text">
                        The premier platform for verified apartments, sublets, and roommates across Bangladesh's major metropolitan areas.
                    </p>
                </div>

                <div>
                    <h3 class="footer-title">Office Address</h3>
                    <p class="footer-text">
                        Level 4, Road 11, Banani C/A, Dhaka<br>
                        1213, Bangladesh
                    </p>
                </div>

                <div>
                    <h3 class="footer-title">Connect With Us</h3>
                    <div class="social-links">
                        <a href="#" class="social-circle">f</a>
                        <a href="#" class="social-circle">i</a>
                        <a href="#" class="social-circle">t</a>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; <?php echo date('Y'); ?> Rental Point. All rights reserved.</p>
                <div class="footer-links">
                    <a href="terms.php">Terms of Service</a>
                    <a href="privacy.php">Privacy Policy</a>
                </div>
            </div>

        </div>
    </footer>

</body>
</html>
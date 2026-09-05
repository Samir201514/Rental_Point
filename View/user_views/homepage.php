<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Point - Home</title>
    <style>
        /* CSS Reset & General Styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #FAF9F6;
            color: #333333;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* Container Layouts */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .main-layout {
            display: flex;
            gap: 25px;
            margin-top: 25px;
        }

        /* Top Header Navigation */
        .header {
            background-color: #FFFFFF;
            border-bottom: 1px solid #E5E5E5;
            padding: 12px 0;
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 15px;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 18px;
            font-weight: bold;
            color: #111111;
        }

        .logo-icon {
            background-color: #72C39B;
            color: #FFFFFF;
            width: 30px;
            height: 30px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .search-box {
            flex-grow: 1;
            max-width: 450px;
            position: relative;
        }

        .search-box input {
            width: 100%;
            padding: 8px 15px 8px 35px;
            border: 1px solid #E5E5E5;
            border-radius: 20px;
            background-color: #F8F8F8;
            font-size: 13px;
        }

        .search-box input:focus {
            outline: none;
            border-color: #72C39B;
            background-color: #FFFFFF;
        }

        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #888888;
            font-size: 13px;
        }

        .user-profile-menu {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #444444;
            cursor: pointer;
        }

        .user-avatar-sm {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* Sidebar Navigation */
        .sidebar {
            width: 220px;
            flex-shrink: 0;
        }

        .sidebar-menu {
            background-color: #FFFFFF;
            border-radius: 12px;
            border: 1px solid #EAD8C3;
            padding: 15px 10px;
            list-style-type: none;
        }

        .sidebar-item {
            margin-bottom: 5px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 15px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            color: #555555;
            transition: 0.2s;
        }

        .sidebar-link:hover {
            background-color: #F5F5F5;
            color: #111111;
        }

        .sidebar-link.active {
            background-color: #E6F4ED;
            color: #2D8A56;
        }

        .sidebar-link.text-danger {
            color: #D9534F;
        }

        .sidebar-link.text-danger:hover {
            background-color: #FDF2F2;
        }

        /* Feed Area Content */
        .feed-content {
            flex-grow: 1;
        }

        /* Create Post Input Bar */
        .create-post-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            padding: 10px;
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.03);
        }

        .create-post-input {
            flex-grow: 1;
            background-color: #F8F8F8;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-size: 13px;
            color: #666666;
            outline: none;
        }

        .btn-create-post {
            background-color: #72C39B;
            color: #FFFFFF;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            white-space: nowrap;
        }

        .btn-create-post:hover {
            background-color: #5FB188;
        }

        /* Filter Tabs */
        .filter-section {
            margin-bottom: 20px;
            display: flex;
            gap: 8px;
        }

        .filter-btn {
            padding: 5px 16px;
            border-radius: 15px;
            border: 1px solid #E0E0E0;
            background-color: #FFFFFF;
            color: #555555;
            font-size: 12px;
            cursor: pointer;
        }

        .filter-btn.active {
            background-color: #72C39B;
            color: #FFFFFF;
            border-color: #72C39B;
        }

        /* Property Card Item */
        .listing-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            border: 1px solid #EAD8C3;
            margin-bottom: 25px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 260px;
            background-color: #EEEEEE;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .badge {
            position: absolute;
            top: 12px;
            left: 12px;
            background-color: #E6F4ED;
            color: #2D8A56;
            padding: 4px 10px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: bold;
        }

        .action-icons-top {
            position: absolute;
            top: 12px;
            right: 12px;
            display: flex;
            gap: 8px;
        }

        .icon-circle-btn {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: #555555;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .card-body {
            padding: 18px;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 6px;
        }

        .price {
            font-size: 18px;
            font-weight: bold;
            color: #111111;
        }

        .location {
            font-size: 12px;
            color: #666666;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .location-icon {
            color: #D9534F;
        }

        .card-title {
            font-size: 15px;
            font-weight: bold;
            color: #222222;
            margin-bottom: 12px;
        }

        .tag-list {
            display: flex;
            gap: 6px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }

        .tag {
            background-color: #F4F4F4;
            color: #666666;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
        }

        /* Card Bottom / User Profile Bar */
        .card-footer {
            border-top: 1px solid #F0F0F0;
            padding-top: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .owner-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
        }

        .owner-details {
            display: flex;
            flex-direction: column;
        }

        .owner-name {
            font-size: 13px;
            font-weight: bold;
            color: #333333;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .verified-badge {
            background-color: #E6F4ED;
            color: #2D8A56;
            font-size: 10px;
            padding: 1px 5px;
            border-radius: 3px;
            font-weight: normal;
        }

        .owner-role {
            font-size: 11px;
            color: #888888;
        }

        .footer-right {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-details {
            background-color: #F5F5F5;
            color: #333333;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-details:hover {
            background-color: #E0E0E0;
        }

        .post-date {
            font-size: 11px;
            color: #999999;
        }

        /* Footer Styling */
        .footer {
            background-color: #FAF9F6;
            border-top: 1px solid #E5E5E5;
            padding: 35px 0 20px 0;
            margin-top: 40px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 30px;
            margin-bottom: 25px;
        }

        .footer-title {
            font-size: 11px;
            font-weight: bold;
            color: #2D8A56;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .footer-text {
            font-size: 12px;
            color: #666666;
            line-height: 1.5;
        }

        .social-links {
            display: flex;
            gap: 10px;
        }

        .social-circle {
            width: 30px;
            height: 30px;
            border: 1px solid #CCCCCC;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #555555;
            font-size: 12px;
        }

        .footer-bottom {
            border-top: 1px solid #E5E5E5;
            padding-top: 15px;
            display: flex;
            justify-content: space-between;
            font-size: 11px;
            color: #888888;
        }

        .footer-links a {
            margin-left: 15px;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        /* Responsive Breakpoints */
        @media (max-width: 850px) {
            .main-layout {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <?php
    // User Session Mock Information
    $logged_in_user = array(
        "name"     => "AFSAN",
        "greeting" => "Good morning",
        "avatar"   => "https://i.pravatar.cc/100?img=11"
    );

    // Dynamic PHP Array storing feed listings data
    $listings = array(
        array(
            "id"          => 1,
            "badge"       => "For Rent",
            "image"       => "https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80",
            "price"       => "৳ 45,000 / mo",
            "location"    => "Gulshan 2, Dhaka",
            "title"       => "Charming 3-Bed Apartment with Beautiful Balcony View",
            "tags"        => array("3 Beds", "3 Baths", "1650 sqft", "Lift", "Parking"),
            "owner_name"  => "TURJOY POLOK",
            "owner_role"  => "Owner",
            "is_verified" => true,
            "posted_at"   => "Posted 12 Oct 2026, 4:30 PM",
            "avatar"      => "https://i.pravatar.cc/100?img=12"
        ),
        array(
            "id"          => 2,
            "badge"       => "Sublet",
            "image"       => "https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=1200&q=80",
            "price"       => "৳ 18,000 / mo",
            "location"    => "Banani, Dhaka",
            "title"       => "Premium Master Bedroom Available for Sublet",
            "tags"        => array("1 Bed", "1 Attached Bath", "1 Balcony", "Wi-Fi"),
            "owner_name"  => "ISMAM DIPTO",
            "owner_role"  => "Tenant",
            "is_verified" => true,
            "posted_at"   => "Posted 10 Oct 2026, 2:15 PM",
            "avatar"      => "https://i.pravatar.cc/100?img=33"
        ),
        array(
            "id"          => 3,
            "badge"       => "For Rent",
            "image"       => "https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1200&q=80",
            "price"       => "৳ 28,000 / mo",
            "location"    => "Dhanmondi, Dhaka",
            "title"       => "Spacious 2-Bed Flat Near Dhanmondi Lake",
            "tags"        => array("2 Beds", "2 Baths", "1100 sqft", "Gas Supply"),
            "owner_name"  => "SAMIR RAHMAN",
            "owner_role"  => "Owner",
            "is_verified" => false,
            "posted_at"   => "Posted 08 Oct 2026, 11:00 AM",
            "avatar"      => "https://i.pravatar.cc/100?img=60"
        )
    );
    ?>

    <!-- Top Header Navigation Bar -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                
                <!-- Brand Logo -->
                <a href="home.php" class="brand-logo">
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
                        <a href="home.php" class="sidebar-link active">
                            <span>&#8962;</span> Home
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="profile.php" class="sidebar-link">
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
                        <a href="logout.php" class="sidebar-link text-danger">
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
                    <button class="btn-create-post">+ Create Post</button>
                </div>

                <!-- Category Filter Area -->
                <div class="filter-section">
                    <button class="filter-btn active">All</button>
                    <button class="filter-btn">Rental</button>
                    <button class="filter-btn">Roommate</button>
                    <button class="filter-btn">Sublet</button>
                </div>

                <!-- Listing Cards Loop -->
                <?php
                foreach ($listings as $item) {
                ?>
                    <article class="listing-card">
                        
                        <!-- Property Image & Action Overlay -->
                        <div class="image-container">
                            <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Property Image">
                            <span class="badge"><?php echo htmlspecialchars($item['badge']); ?></span>
                            
                            <div class="action-icons-top">
                                <span class="icon-circle-btn" title="Edit">&#9998;</span>
                                <span class="icon-circle-btn" title="Share">&#10150;</span>
                            </div>
                        </div>

                        <!-- Details Section -->
                        <div class="card-body">
                            
                            <div class="card-header">
                                <div class="price"><?php echo htmlspecialchars($item['price']); ?></div>
                                <div class="location">
                                    <span class="location-icon">&#10084;</span>
                                    <?php echo htmlspecialchars($item['location']); ?>
                                </div>
                            </div>

                            <h2 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h2>

                            <!-- Amenities Tags List -->
                            <div class="tag-list">
                                <?php 
                                foreach ($item['tags'] as $tag) {
                                    echo '<span class="tag">' . htmlspecialchars($tag) . '</span>';
                                }
                                ?>
                            </div>

                            <!-- Footer Section -->
                            <div class="card-footer">
                                <div class="owner-info">
                                    <img src="<?php echo htmlspecialchars($item['avatar']); ?>" alt="Owner Avatar" class="avatar">
                                    <div class="owner-details">
                                        <div class="owner-name">
                                            <?php echo htmlspecialchars($item['owner_name']); ?>
                                            <?php if ($item['is_verified']) { ?>
                                                <span class="verified-badge">&#10003; Verified</span>
                                            <?php } ?>
                                        </div>
                                        <span class="owner-role"><?php echo htmlspecialchars($item['owner_role']); ?></span>
                                    </div>
                                </div>

                                <div class="footer-right">
                                    <a href="listing_details.php?id=<?php echo $item['id']; ?>" class="btn-details">Details</a>
                                    <span class="post-date"><?php echo htmlspecialchars($item['posted_at']); ?></span>
                                </div>
                            </div>

                        </div>

                    </article>
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
                    <a href="home.php" class="brand-logo" style="margin-bottom: 10px;">
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
                <p>&copy; 2026 Rental Point. All rights reserved.</p>
                <div class="footer-links">
                    <a href="terms.php">Terms of Service</a>
                    <a href="privacy.php">Privacy Policy</a>
                </div>
            </div>

        </div>
    </footer>

</body>
</html>
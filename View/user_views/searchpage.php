<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Point - Search Results</title>
    <style>
        /* CSS Reset & Body Styling */
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

        /* Container Layout */
        .container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Navigation Header */
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

        /* Back Button & Title Header Area */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-size: 13px;
            color: #666666;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        .back-link:hover {
            color: #111111;
        }

        .search-header-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .search-title-area h1 {
            font-size: 24px;
            font-weight: bold;
            color: #111111;
            margin-bottom: 4px;
        }

        .search-title-area p {
            font-size: 13px;
            color: #777777;
        }

        .sort-dropdown {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #666666;
        }

        .sort-dropdown select {
            padding: 6px 12px;
            border: 1px solid #E0E0E0;
            border-radius: 6px;
            background-color: #FFFFFF;
            font-size: 13px;
            color: #333333;
            outline: none;
            cursor: pointer;
        }

        /* Essential Filters Box */
        .filter-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            border: 1px solid #EAD8C3;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
        }

        .filter-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .filter-title {
            font-size: 14px;
            font-weight: bold;
            color: #222222;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .clear-btn {
            font-size: 12px;
            color: #72C39B;
            font-weight: bold;
            cursor: pointer;
        }

        .clear-btn:hover {
            text-decoration: underline;
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
            margin-bottom: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .form-group label {
            font-size: 10px;
            font-weight: bold;
            color: #777777;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group select {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #E5E5E5;
            border-radius: 6px;
            background-color: #F9F9F9;
            font-size: 13px;
            color: #333333;
            outline: none;
        }

        .btn-apply-filters {
            width: 100%;
            background-color: #72C39B;
            color: #FFFFFF;
            padding: 10px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            text-align: center;
        }

        .btn-apply-filters:hover {
            background-color: #5FB188;
        }

        /* 2-Column Grid Layout for Property Cards */
        .results-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .listing-card {
            background-color: #FFFFFF;
            border-radius: 12px;
            border: 1px solid #EAD8C3;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.02);
            display: flex;
            flex-direction: column;
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 220px;
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

        .action-icon-top {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 26px;
            height: 26px;
            border-radius: 50%;
            background-color: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            color: #555555;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            cursor: pointer;
        }

        .card-body {
            padding: 16px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
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
            font-size: 14px;
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

        /* Card Footer / Owner Details */
        .card-footer {
            border-top: 1px solid #F0F0F0;
            padding-top: 12px;
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .owner-info {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        .owner-details {
            display: flex;
            flex-direction: column;
        }

        .owner-name {
            font-size: 12px;
            font-weight: bold;
            color: #333333;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .verified-badge {
            background-color: #E6F4ED;
            color: #2D8A56;
            font-size: 9px;
            padding: 1px 4px;
            border-radius: 3px;
            font-weight: normal;
        }

        .owner-role {
            font-size: 10px;
            color: #888888;
        }

        .footer-right {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-details {
            background-color: #F5F5F5;
            color: #333333;
            padding: 5px 12px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
        }

        .btn-details:hover {
            background-color: #E0E0E0;
        }

        .post-date {
            font-size: 10px;
            color: #999999;
        }

        /* Footer Styling */
        .footer {
            background-color: #FAF9F6;
            border-top: 1px solid #E5E5E5;
            padding: 35px 0 20px 0;
            margin-top: 50px;
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
        @media (max-width: 768px) {
            .results-grid {
                grid-template-columns: 1fr;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .search-header-row {
                flex-direction: column;
                gap: 10px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <?php
    // Mock user login data
    $logged_in_user = array(
        "name"     => "AFSAN",
        "greeting" => "Good morning",
        "avatar"   => "https://i.pravatar.cc/100?img=11"
    );

    // Search query info
    $search_location = "Dhaka";
    $results_count = 4;

    // Array containing search result property listings
    $searchResults = array(
        array(
            "id"          => 1,
            "badge"       => "For Rent",
            "image"       => "https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80",
            "price"       => "৳ 45,000 / mo",
            "location"    => "Gulshan 2, Dhaka",
            "title"       => "Charming 3-Bed Apartment with Beautiful Balcony View",
            "tags"        => array("3 Beds", "3 Baths", "1650 sqft", "Lift", "Parking"),
            "owner_name"  => "Adnan Chowdhury",
            "owner_role"  => "Owner",
            "is_verified" => true,
            "posted_at"   => "Posted 28 Sep 2026, 6:30 PM",
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
            "owner_name"  => "Sajid Hasan",
            "owner_role"  => "Owner",
            "is_verified" => true,
            "posted_at"   => "Posted 25 Sep 2026, 10:15 AM",
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
            "owner_name"  => "Nayeem Rahman",
            "owner_role"  => "Owner",
            "is_verified" => true,
            "posted_at"   => "Posted 22 Sep 2026, 5:00 PM",
            "avatar"      => "https://i.pravatar.cc/100?img=60"
        ),
        array(
            "id"          => 4,
            "badge"       => "Sublet",
            "image"       => "https://images.unsplash.com/photo-1502672260266-1c1ef2d93688?auto=format&fit=crop&w=1200&q=80",
            "price"       => "৳ 15,000 / mo",
            "location"    => "Uttara Sector 11, Dhaka",
            "title"       => "Cozy Furnished Studio Sublet for Professionals",
            "tags"        => array("1 Bed", "1 Bath", "600 sqft", "Furnished", "AC"),
            "owner_name"  => "Fariha Alam",
            "owner_role"  => "Owner",
            "is_verified" => true,
            "posted_at"   => "Posted 20 Sep 2026, 8:30 AM",
            "avatar"      => "https://i.pravatar.cc/100?img=47"
        )
    );
    ?>

    <!-- Navigation Header Bar -->
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
                    <input type="text" value="Dhaka, Bangladesh..." placeholder="Search area...">
                </div>

                <!-- User Profile Menu -->
                <div class="user-profile-menu">
                    <span><?php echo htmlspecialchars($logged_in_user['greeting']) . ', ' . htmlspecialchars($logged_in_user['name']); ?></span>
                    <img src="<?php echo htmlspecialchars($logged_in_user['avatar']); ?>" alt="User Avatar" class="user-avatar-sm">
                    <span>&#9660;</span>
                </div>

            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="container">
        
        <!-- Back Navigation Button -->
        <a href="home.php" class="back-link">&#8592; Back</a>

        <!-- Search Summary Title & Sorting Options -->
        <div class="search-header-row">
            <div class="search-title-area">
                <h1>Search Results in <?php echo htmlspecialchars($search_location); ?></h1>
                <p>Showing <?php echo $results_count; ?> verified properties matching your filters</p>
            </div>

            <div class="sort-dropdown">
                <label for="sort_by">Sort by:</label>
                <select id="sort_by" name="sort_by">
                    <option value="newest" selected>Newest Listed</option>
                    <option value="price_low">Price: Low to High</option>
                    <option value="price_high">Price: High to Low</option>
                </select>
            </div>
        </div>

        <!-- Essential Filters Section -->
        <form action="search.php" method="GET" class="filter-card">
            <div class="filter-card-header">
                <div class="filter-title">
                    <span>&#9783;</span> Essential Filters
                </div>
                <a href="search.php" class="clear-btn">Clear All</a>
            </div>

            <div class="filter-grid">
                <div class="form-group">
                    <label for="post_type">Post Type</label>
                    <select id="post_type" name="post_type">
                        <option value="all" selected>All Categories</option>
                        <option value="rent">For Rent</option>
                        <option value="sublet">Sublet</option>
                        <option value="roommate">Roommate</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="area">Area</label>
                    <select id="area" name="area">
                        <option value="all" selected>Gulshan, Banani, Dhanmondi</option>
                        <option value="gulshan">Gulshan</option>
                        <option value="banani">Banani</option>
                        <option value="dhanmondi">Dhanmondi</option>
                        <option value="uttara">Uttara</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="min_rent">Min Rent</label>
                    <select id="min_rent" name="min_rent">
                        <option value="10000" selected>৳ 10,000</option>
                        <option value="15000">৳ 15,000</option>
                        <option value="20000">৳ 20,000</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="max_rent">Max Rent</label>
                    <select id="max_rent" name="max_rent">
                        <option value="50000" selected>৳ 50,000</option>
                        <option value="60000">৳ 60,000</option>
                        <option value="100000">৳ 100,000</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn-apply-filters">Apply Filters</button>
        </form>

        <!-- Search Results Grid Section -->
        <div class="results-grid">
            <?php
            foreach ($searchResults as $item) {
            ?>
                <article class="listing-card">
                    
                    <!-- Cover Image -->
                    <div class="image-container">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Property Image">
                        <span class="badge"><?php echo htmlspecialchars($item['badge']); ?></span>
                        <span class="action-icon-top" title="Share">&#10150;</span>
                    </div>

                    <!-- Property Details -->
                    <div class="card-body">
                        
                        <div class="card-header">
                            <div class="price"><?php echo htmlspecialchars($item['price']); ?></div>
                            <div class="location">
                                <span class="location-icon">&#10084;</span>
                                <?php echo htmlspecialchars($item['location']); ?>
                            </div>
                        </div>

                        <h2 class="card-title"><?php echo htmlspecialchars($item['title']); ?></h2>

                        <!-- Feature Tags -->
                        <div class="tag-list">
                            <?php 
                            foreach ($item['tags'] as $tag) {
                                echo '<span class="tag">' . htmlspecialchars($tag) . '</span>';
                            }
                            ?>
                        </div>

                        <!-- Card Footer -->
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
        </div>

    </main>

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
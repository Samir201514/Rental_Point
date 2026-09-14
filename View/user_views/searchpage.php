<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Point - Search Results</title>
    <link rel="stylesheet" href="./css/searchpage.css">
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
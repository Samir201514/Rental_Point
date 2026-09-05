<?php
/**
 * guest.php - Rental Point Guest Landing Page
 */

// Sample mock data for dynamic rendering (Replace with Database queries in production)
$listings = [
    [
        'id'          => 1,
        'badge'       => 'For Rent',
        'image'       => 'https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?auto=format&fit=crop&w=1200&q=80',
        'price'       => '৳ 45,000 / mo',
        'location'    => 'Gulshan 2, Dhaka',
        'title'       => 'Charming 3-Bed Apartment with Beautiful Balcony View',
        'tags'        => ['3 Beds', '3 Baths', '1650 sqft', 'Lift', 'Parking'],
        'owner_name'  => 'Adnan Chowdhury',
        'owner_type'  => 'Owner',
        'is_verified' => true,
        'posted_at'   => 'Posted 05 Oct 2026, 9:45 AM',
        'avatar'      => 'https://i.pravatar.cc/100?img=12'
    ],
    [
        'id'          => 2,
        'badge'       => 'Roommate',
        'image'       => 'https://images.unsplash.com/photo-1522771739844-6a9f6d5f14af?auto=format&fit=crop&w=1200&q=80',
        'price'       => '৳ 18,000 / mo',
        'location'    => 'Banani, Dhaka',
        'title'       => 'Premium Master Bedroom Available for Sublet',
        'tags'        => ['1 Bed', '1 Attached Bath', '1 Balcony', 'Wi-Fi'],
        'owner_name'  => 'Sajid Hasan',
        'owner_type'  => 'Tenant',
        'is_verified' => true,
        'posted_at'   => 'Posted 03 Oct 2026, 3:20 PM',
        'avatar'      => 'https://i.pravatar.cc/100?img=33'
    ],
    [
        'id'          => 3,
        'badge'       => 'For Rent',
        'image'       => 'https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?auto=format&fit=crop&w=1200&q=80',
        'price'       => '৳ 28,000 / mo',
        'location'    => 'Dhanmondi, Dhaka',
        'title'       => 'Spacious 2-Bed Flat Near Dhanmondi Lake',
        'tags'        => ['2 Beds', '2 Baths', '1100 sqft', 'Gas Supply'],
        'owner_name'  => 'Nayeem Rahman',
        'owner_type'  => 'Owner',
        'is_verified' => false,
        'posted_at'   => 'Posted 01 Oct 2026, 1:00 PM',
        'avatar'      => 'https://i.pravatar.cc/100?img=60'
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Point - Find Your Next Home</title>
    
    <!-- Tailwind CSS for clean layout -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    
    <style>
        body {
            background-color: #fcfbf7;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            color: #1a1a1a;
        }
        .bg-custom-green { background-color: #70c497; }
        .bg-custom-green:hover { background-color: #5fb185; }
        .bg-soft-green { background-color: #eaf6ef; }
        .text-custom-green { color: #2d8a56; }
        .border-custom-green { border-color: #70c497; }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between">

    <!-- Navbar -->
    <header class="w-full bg-white shadow-sm border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-4 py-4 flex flex-col md:flex-row items-center justify-between gap-4">
            
            <!-- Logo -->
            <a href="#" class="flex items-center gap-2 font-bold text-xl text-gray-800">
                <div class="w-8 h-8 rounded-lg bg-custom-green flex items-center justify-center text-white">
                    <i data-lucide="home" class="w-5 h-5"></i>
                </div>
                Rental Point
            </a>

            <!-- Search Bar -->
            <div class="relative w-full max-w-md">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none text-gray-400">
                    <i data-lucide="search" class="w-4 h-4"></i>
                </span>
                <input type="text" 
                       placeholder="Search by area, rent, or amenities..." 
                       class="w-full pl-10 pr-4 py-2 bg-gray-50 text-sm rounded-full border border-gray-200 focus:outline-none focus:border-custom-green focus:bg-white transition">
            </div>

            <!-- Auth Buttons -->
            <div class="flex items-center gap-3">
                <a href="/register.php" class="px-5 py-2 text-sm text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition font-medium">Register</a>
                <a href="/login.php" class="px-5 py-2 text-sm text-white bg-custom-green rounded-lg transition font-medium">Login</a>
            </div>

        </div>
    </header>

    <!-- Main Content Container -->
    <main class="max-w-6xl mx-auto px-4 py-8 flex-grow w-full">
        
        <!-- Category Filter Tabs -->
        <div class="flex items-center gap-2 mb-8">
            <button class="px-5 py-1.5 text-sm font-medium rounded-full bg-custom-green text-white">All</button>
            <button class="px-5 py-1.5 text-sm font-medium rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition">Rental</button>
            <button class="px-5 py-1.5 text-sm font-medium rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition">Roommate</button>
            <button class="px-5 py-1.5 text-sm font-medium rounded-full bg-white border border-gray-200 text-gray-600 hover:bg-gray-50 transition">Sublet</button>
        </div>

        <!-- Listing Cards List -->
        <div class="space-y-8">
            <?php foreach ($listings as $item): ?>
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition hover:shadow-md">
                    
                    <!-- Cover Image Container -->
                    <div class="relative h-64 md:h-80 w-full overflow-hidden">
                        <img src="<?= htmlspecialchars($item['image']) ?>" 
                             alt="<?= htmlspecialchars($item['title']) ?>" 
                             class="w-full h-full object-cover">
                        
                        <!-- Top Badge -->
                        <span class="absolute top-4 left-4 bg-soft-green text-custom-green px-3 py-1 rounded-full text-xs font-semibold">
                            <?= htmlspecialchars($item['badge']) ?>
                        </span>
                    </div>

                    <!-- Listing Details -->
                    <div class="p-6">
                        
                        <!-- Price & Location Header -->
                        <div class="flex justify-between items-start gap-4 mb-2">
                            <h2 class="text-2xl font-bold text-gray-900">
                                <?= htmlspecialchars($item['price']) ?>
                            </h2>
                            <div class="flex items-center text-xs text-gray-500 font-medium">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-red-500 mr-1"></i>
                                <?= htmlspecialchars($item['location']) ?>
                            </div>
                        </div>

                        <!-- Title -->
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            <?= htmlspecialchars($item['title']) ?>
                        </h3>

                        <!-- Tags / Amenities -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            <?php foreach ($item['tags'] as $tag): ?>
                                <span class="px-3 py-1 bg-gray-100 text-gray-600 text-xs rounded-md font-medium">
                                    <?= htmlspecialchars($tag) ?>
                                </span>
                            <?php endforeach; ?>
                        </div>

                        <!-- Owner Footer Info -->
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <!-- User Info -->
                            <div class="flex items-center gap-3">
                                <img src="<?= htmlspecialchars($item['avatar']) ?>" alt="Avatar" class="w-10 h-10 rounded-full object-cover">
                                <div>
                                    <div class="flex items-center gap-1.5">
                                        <span class="text-sm font-semibold text-gray-800"><?= htmlspecialchars($item['owner_name']) ?></span>
                                        <?php if ($item['is_verified']): ?>
                                            <span class="inline-flex items-center text-[10px] text-custom-green bg-soft-green px-1.5 py-0.5 rounded font-medium">
                                                <i data-lucide="check" class="w-3 h-3 mr-0.5"></i> Verified
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <p class="text-xs text-gray-400"><?= htmlspecialchars($item['owner_type']) ?></p>
                                </div>
                            </div>

                            <!-- Actions & Date -->
                            <div class="flex flex-col md:flex-row items-end md:items-center gap-3">
                                <a href="/listing.php?id=<?= $item['id'] ?>" class="px-4 py-2 text-xs font-medium text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition">
                                    Details
                                </a>
                                <span class="text-[11px] text-gray-400">
                                    <?= htmlspecialchars($item['posted_at']) ?>
                                </span>
                            </div>
                        </div>

                    </div>
                </article>
            <?php endforeach; ?>
        </div>
        
    </main>

    <!-- Footer -->
    <footer class="w-full border-t border-gray-200 mt-16 pt-12 pb-8 bg-white/40">
        <div class="max-w-6xl mx-auto px-4">
            
            <div class="flex flex-col md:flex-row justify-between gap-8 mb-12">
                <!-- Platform Overview -->
                <div class="max-w-sm">
                    <a href="#" class="flex items-center gap-2 font-bold text-lg text-gray-800 mb-3">
                        <div class="w-7 h-7 rounded-lg bg-custom-green flex items-center justify-center text-white">
                            <i data-lucide="home" class="w-4 h-4"></i>
                        </div>
                        Rental Point
                    </a>
                    <p class="text-xs text-gray-500 leading-relaxed">
                        The premier platform for verified apartments, sublets, and roommates across Bangladesh's major metropolitan areas.
                    </p>
                </div>

                <!-- Office Address -->
                <div>
                    <h4 class="text-xs font-bold text-custom-green tracking-wider uppercase mb-3">Office Address</h4>
                    <p class="text-xs text-gray-600 leading-relaxed">
                        Level 4, Road 11, Banani C/A, Dhaka<br>
                        1213, Bangladesh
                    </p>
                </div>

                <!-- Social Links -->
                <div>
                    <h4 class="text-xs font-bold text-custom-green tracking-wider uppercase mb-3">Connect With Us</h4>
                    <div class="flex items-center gap-3">
                        <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:text-custom-green hover:border-custom-green transition">
                            <i data-lucide="facebook" class="w-4 h-4"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:text-custom-green hover:border-custom-green transition">
                            <i data-lucide="instagram" class="w-4 h-4"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full border border-gray-200 flex items-center justify-center text-gray-500 hover:text-custom-green hover:border-custom-green transition">
                            <i data-lucide="twitter" class="w-4 h-4"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Bottom Copyright Line -->
            <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-400 gap-4">
                <p>&copy; 2026 Rental Point. All rights reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="#" class="hover:text-gray-600 transition">Terms of Service</a>
                    <a href="#" class="hover:text-gray-600 transition">Privacy Policy</a>
                </div>
            </div>

        </div>
    </footer>

    <!-- Initialize Lucide Icons -->
    <script>
        lucide.createIcons();
    </script>
</body>
</html>
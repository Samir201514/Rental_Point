<?php
// Include this after setting $active, e.g. $active = "users";
?>
<aside class="sidebar">
  <div class="logo"><span class="icon">&#8962;</span> Rental Point</div>
  <nav>
    <a href="adminDashboard.php" class="<?= $active === "dashboard" ? "active" : "" ?>">Dashboard</a>
    <a href="users.php"          class="<?= $active === "users" ? "active" : "" ?>">Users</a>
    <a href="posts.php"          class="<?= $active === "posts" ? "active" : "" ?>">Posts</a>
    <a href="verification.php"   class="<?= $active === "verification" ? "active" : "" ?>">Verification</a>
    <a href="reports.php"        class="<?= $active === "reports" ? "active" : "" ?>">Reports</a>
    <a href="help.php"           class="<?= $active === "help" ? "active" : "" ?>">Help Tickets</a>
  </nav>
  <a href="../../controllers/logoutControls.php" class="logout">Logout</a>
</aside>

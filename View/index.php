<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rental Point | Find your perfect rental home</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="container header-inner">
      <div class="logo">
        <div class="logo-icon">
           <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h14v-8h3L12 3zm-2 15H8v-4h2v4zm6 0h-2v-4h2v4z"/></svg>
        </div>
        Rental Point
      </div>
      
      <nav class="nav-links">
        <a href="#">About</a>
        <div class="nav-auth">
          <a href="user_views/createAccount.php" class="register">Register</a>
          <a href="login.php" class="btn btn-primary">Login</a>
        </div>
      </nav>
    </div>
  </header>

  <section class="hero container">
    <h1>Find your perfect <span class="text-primary">rental home</span> in<br>Bangladesh, without the hassle</h1>
    <p>Discover verified apartments, sublets, and roommates. Skip the chaotic Facebook groups and connect directly with trusted owners today.</p>
    
    <div class="hero-actions">
      <a href="login.php" class="btn btn-primary">Login to Account</a>
      <a href="user_views/createAccount.php" class="btn btn-outline">Register</a>
    </div>
  </section>

  <!-- Feature Section -->
  <section class="features-section">
    <div class="container">
      <div class="features-top">
        <div class="features-text">
          <h2>Why Rental Point?</h2>
          <p>Finding a place to live or a suitable roommate in cities like Dhaka, Chattogram, or Sylhet shouldn't mean scrolling through endless, unmoderated social media threads.</p>
        </div>
      </div>
      
      <div class="features-grid">
        <div class="feature-card">
          <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2L3 6v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V6l-9-4zm-2 16l-4-4 1.41-1.41L10 15.17l6.59-6.59L18 10l-8 8z"/></svg>
          </div>
          <h3>Verified Owners</h3>
          <p>Every listing goes through our vetting team to prevent fraud and spam.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
          </div>
          <h3>Easy Search</h3>
          <p>Filter by rent budget, division, district, area, and exact roommate needs.</p>
        </div>
        <div class="feature-card">
          <div class="feature-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM9 11H7V9h2v2zm4 0h-2V9h2v2zm4 0h-2V9h2v2z"/></svg>
          </div>
          <h3>Direct Contact</h3>
          <p>Zero intermediate brokers. Connect directly with landlords or current tenants.</p>
        </div>
      </div>
    </div>
  </section>

  <?php include "footer.php"; ?>
  
</body>
</html>
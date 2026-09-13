<?php
$supportEmail = $subject = $description = '';
$supportErrors = [];
$supportSuccess = '';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['support_submit'])) {
    $supportEmail = trim($_POST['email'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $description = trim($_POST['description'] ?? '');

    if (empty($supportEmail)) {
        $supportErrors['email'] = 'Email is required';
    } elseif (!filter_var($supportEmail, FILTER_VALIDATE_EMAIL)) {
        $supportErrors['email'] = 'Invalid email format';
    }

    if (empty($subject)) {
        $supportErrors['subject'] = 'Subject is required';
    }

    if (empty($description)) {
        $supportErrors['description'] = 'Description is required';
    }

    if (empty($supportErrors)) {
        $supportSuccess = 'Your message has been sent successfully!';
        $supportEmail = $subject = $description = '';
    }
}
?>
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
        <a href="#">Help</a>
        <a href="#">Contact</a>
        <div class="nav-auth">
          <a href="create-account.php" class="register">Register</a>
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
      <a href="create-account.php" class="btn btn-outline">Register</a>
      <a href="#" class="continue-guest">Continue as Guest</a>
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
        <div class="features-image">
          <img src="images/city.jpg" alt="City Skyline of Dhaka, Bangladesh">
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

  <section class="support-section">
    <div class="container">
      <div class="support-card">
        <h2>Send a Support Message</h2>
        <?php if ($supportSuccess): ?>
        <div class="alert-error" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb; margin-bottom: 1rem;">
          <?php echo htmlspecialchars($supportSuccess); ?>
        </div>
        <?php endif; ?>
        <form action="index.php" method="POST">
          <input type="hidden" name="support_submit" value="1">
          <div class="form-group <?php echo isset($supportErrors['email']) ? 'has-error' : ''; ?>">
            <label class="form-label">Email Address <span>*</span></label>
            <input type="email" name="email" class="form-control <?php echo isset($supportErrors['email']) ? 'is-invalid' : ''; ?>" placeholder="yourname@gmail.com" value="<?php echo htmlspecialchars($supportEmail); ?>">
            <?php if (isset($supportErrors['email'])): ?>
            <span class="error-text" style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.25rem; display: block;"><?php echo $supportErrors['email']; ?></span>
            <?php endif; ?>
          </div>
          <div class="form-group <?php echo isset($supportErrors['subject']) ? 'has-error' : ''; ?>">
            <label class="form-label">Subject <span>*</span></label>
            <input type="text" name="subject" class="form-control <?php echo isset($supportErrors['subject']) ? 'is-invalid' : ''; ?>" placeholder="How can we help you?" value="<?php echo htmlspecialchars($subject); ?>">
            <?php if (isset($supportErrors['subject'])): ?>
            <span class="error-text" style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.25rem; display: block;"><?php echo $supportErrors['subject']; ?></span>
            <?php endif; ?>
          </div>
          <div class="form-group <?php echo isset($supportErrors['description']) ? 'has-error' : ''; ?>">
            <label class="form-label">Description <span>*</span></label>
            <textarea name="description" class="form-control <?php echo isset($supportErrors['description']) ? 'is-invalid' : ''; ?>" placeholder="Provide detailed information regarding your inquiry..."><?php echo htmlspecialchars($description); ?></textarea>
            <?php if (isset($supportErrors['description'])): ?>
            <span class="error-text" style="color: #e53e3e; font-size: 0.875rem; margin-top: 0.25rem; display: block;"><?php echo $supportErrors['description']; ?></span>
            <?php endif; ?>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Send</button>
        </form>
      </div>
    </div>
  </section>
  <footer>
    <div class="container">
      <div class="footer-inner">
        <div class="footer-col" style="flex: 2;">
          <div class="logo" style="margin-bottom: 1rem;">
            <div class="logo-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h14v-8h3L12 3zm-2 15H8v-4h2v4zm6 0h-2v-4h2v4z"/></svg>
            </div>
            Rental Point
          </div>
          <p>The premier platform for verified apartments, sublets,<br>and roommates across Bangladesh's major<br>metropolitan areas.</p>
        </div>
        
        <div class="footer-col">
          <h4>Office Address</h4>
          <p>Level 4, Road 11, Banani C/A, Dhaka<br>1213, Bangladesh</p>
        </div>
        
        <div class="footer-col" style="flex: 0.5;">
          <h4>Connect With Us</h4>
          <div class="social-links">
            <a href="#"><svg viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg></a>
            <a href="#"><svg viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg></a>
            <a href="#"><svg viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg></a>
          </div>
        </div>
      </div>
      
      <div class="footer-bottom">
        <div>&copy; 2026 Rental Point. All rights reserved.</div>
        <div class="footer-links">
          <a href="#">Terms of Service</a>
          <a href="#">Privacy Policy</a>
        </div>
      </div>
    </div>
  </footer>
</body>
</html>

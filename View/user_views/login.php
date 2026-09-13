<?php
$email = '';
$errors = [];
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required';
    }

    if (empty($errors)) {
        $successMessage = 'Login successful!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Rental Point</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">
  
  <a href="index.php" class="back-link">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
    Back
  </a>

  <div class="auth-container">
    <div class="auth-card">
      <div class="auth-header">
        <div class="logo">
          <div class="logo-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h14v-8h3L12 3zm-2 15H8v-4h2v4zm6 0h-2v-4h2v4z"/></svg>
          </div>
          Rental Point
        </div>
        <h1>Welcome back</h1>
        <p>Enter your credentials to access verified listings</p>
      </div>
      
      <form action="../../Controller/homeController.php" method="POST">
        <?php if (!empty($errors) && empty($errors['email']) && empty($errors['password'])): ?>
        <div class="alert-error">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
          Invalid email or password
        </div>
        <?php endif; ?>

        <?php if ($successMessage): ?>
        <div class="alert-error" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
          <?php echo htmlspecialchars($successMessage); ?>
        </div>
        <?php endif; ?>

        <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : ''; ?>">
          <label class="form-label">Email Address <span>*</span></label>
          <input type="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" placeholder="e.g. adnan@gmail.com" value="<?php echo htmlspecialchars($email); ?>">
          <?php if (isset($errors['email'])): ?>
          <span class="error-text"><?php echo $errors['email']; ?></span>
          <?php endif; ?>
        </div>

        <div class="form-group <?php echo isset($errors['password']) ? 'has-error' : ''; ?>">
          <label class="form-label">Password <span>*</span></label>
          <div class="input-icon-wrapper">
            <input type="password" name="password" class="form-control <?php echo isset($errors['password']) ? 'is-invalid' : ''; ?>" placeholder="••••••••">
            <div class="input-icon">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
            </div>
          </div>
          <?php if (isset($errors['password'])): ?>
          <span class="error-text"><?php echo $errors['password']; ?></span>
          <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 2rem;">Login</button>
      </form>

      <div class="auth-footer">
        Don't have an account? <a href="create-account.php">Register</a>
      </div>
    </div>
  </div>
</body>
</html>

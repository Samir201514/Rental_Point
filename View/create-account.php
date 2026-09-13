<?php
$fullName = $email = $phone = $accountType = '';
$errors = [];
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = trim($_POST['full_name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';
    $accountType = $_POST['account_type'] ?? '';

    if (empty($fullName)) {
        $errors['full_name'] = 'Full Name is required';
    }
    
    if (empty($email)) {
        $errors['email'] = 'Email Address is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    if (empty($phone)) {
        $errors['phone'] = 'Phone Number is required';
    }
    
    if (empty($password)) {
        $errors['password'] = 'Password is required';
    } elseif (strlen($password) < 6) {
        $errors['password'] = 'Password must be at least 6 characters';
    }
    
    if (empty($confirmPassword)) {
        $errors['confirm_password'] = 'Confirm Password is required';
    } elseif ($password !== $confirmPassword) {
        $errors['confirm_password'] = 'Passwords do not match';
    }
    
    if (empty($accountType)) {
        $errors['account_type'] = 'Account Type is required';
    }
    
    if (!isset($_POST['terms'])) {
        $errors['terms'] = 'You must agree to the Terms & Conditions';
    }

    if (empty($errors)) {
        $successMessage = 'Account created successfully!';
        $fullName = $email = $phone = $accountType = '';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Create Account | Rental Point</title>
  <link rel="stylesheet" href="style.css">
</head>
<body class="auth-page">

  <a href="index.php" class="back-link">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M20 11H7.83l5.59-5.59L12 4l-8 8 8 8 1.41-1.41L7.83 13H20v-2z"/></svg>
    Back
  </a>

  <div class="auth-container" style="padding: 4rem 2rem;">
    <div class="auth-card register-card">
      <div class="auth-header">
        <div class="logo">
          <div class="logo-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 3L2 12h3v8h14v-8h3L12 3zm-2 15H8v-4h2v4zm6 0h-2v-4h2v4z"/></svg>
          </div>
          Rental Point
        </div>
        <h1>Create Account</h1>
        <p>Join Bangladesh's most reliable rental search network</p>
      </div>

      <form action="create-account.php" method="POST">
        <?php if ($successMessage): ?>
        <div class="alert-error" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb; margin-bottom: 2rem;">
          <?php echo htmlspecialchars($successMessage); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($errors['terms'])): ?>
        <div class="alert-error" style="margin-bottom: 2rem;">
          <?php echo $errors['terms']; ?>
        </div>
        <?php endif; ?>
        <div class="photo-upload-group">
          <div class="photo-label">Cover Photo (Optional)</div>
          <div class="cover-upload">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h3l2-2h6l2 2h3c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm8 3c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/></svg>
          </div>
          
          <div class="profile-upload-wrapper">
            <div class="profile-upload">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M4 4h3l2-2h6l2 2h3c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2zm8 3c-2.76 0-5 2.24-5 5s2.24 5 5 5 5-2.24 5-5-2.24-5-5-5zm0 8c-1.65 0-3-1.35-3-3s1.35-3 3-3 3 1.35 3 3-1.35 3-3 3z"/></svg>
            </div>
            <div class="photo-label">Profile Photo (Optional)</div>
          </div>
        </div>
        <div class="form-group <?php echo isset($errors['full_name']) ? 'has-error' : ''; ?>">
          <label class="form-label">Full Name <span>*</span></label>
          <input type="text" name="full_name" class="form-control <?php echo isset($errors['full_name']) ? 'is-invalid' : ''; ?>" placeholder="e.g. Adnan Chowdhury" value="<?php echo htmlspecialchars($fullName); ?>">
          <?php if (isset($errors['full_name'])): ?>
          <span class="error-text"><?php echo $errors['full_name']; ?></span>
          <?php endif; ?>
        </div>

        <div class="form-row">
          <div class="form-group <?php echo isset($errors['email']) ? 'has-error' : ''; ?>">
            <label class="form-label">Email Address <span>*</span></label>
            <input type="email" name="email" class="form-control <?php echo isset($errors['email']) ? 'is-invalid' : ''; ?>" placeholder="abc@gmail.com" value="<?php echo htmlspecialchars($email); ?>">
            <?php if (isset($errors['email'])): ?>
            <span class="error-text"><?php echo $errors['email']; ?></span>
            <?php endif; ?>
          </div>
          <div class="form-group <?php echo isset($errors['phone']) ? 'has-error' : ''; ?>">
            <label class="form-label">Phone Number <span>*</span></label>
            <input type="tel" name="phone" class="form-control <?php echo isset($errors['phone']) ? 'is-invalid' : ''; ?>" placeholder="+880 1XXXXXXXXX" value="<?php echo htmlspecialchars($phone); ?>">
            <?php if (isset($errors['phone'])): ?>
            <span class="error-text"><?php echo $errors['phone']; ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-row">
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
          <div class="form-group <?php echo isset($errors['confirm_password']) ? 'has-error' : ''; ?>">
            <label class="form-label">Confirm Password <span>*</span></label>
            <div class="input-icon-wrapper">
              <input type="password" name="confirm_password" class="form-control <?php echo isset($errors['confirm_password']) ? 'is-invalid' : ''; ?>" placeholder="••••••••">
              <div class="input-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z"/></svg>
              </div>
            </div>
            <?php if (isset($errors['confirm_password'])): ?>
            <span class="error-text"><?php echo $errors['confirm_password']; ?></span>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Bio (Optional)</label>
          <textarea name="bio" class="form-control" placeholder="Tell us a bit about yourself..."></textarea>
        </div>

        <div class="form-group">
          <label class="form-label">Gender</label>
          <select name="gender" class="form-control">
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
          </select>
        </div>
        <div class="form-group <?php echo isset($errors['account_type']) ? 'has-error' : ''; ?>">
          <label class="form-label" style="margin-bottom: 1rem;">Account Type</label>
          <div class="account-type">
            <label class="type-card <?php echo ($accountType == 'tenant' || empty($accountType)) ? 'active' : ''; ?>">
              <input type="radio" name="account_type" value="tenant" <?php echo ($accountType == 'tenant' || empty($accountType)) ? 'checked' : ''; ?> onchange="this.closest('.account-type').querySelectorAll('.type-card').forEach(c=>c.classList.remove('active')); this.closest('.type-card').classList.add('active');">
              <div class="type-card-text">
                <span class="type-card-title">Find a Property / Room</span>
                <span class="type-card-desc">Tenant or Roommate</span>
              </div>
            </label>
            <label class="type-card <?php echo ($accountType == 'landlord') ? 'active' : ''; ?>">
              <input type="radio" name="account_type" value="landlord" <?php echo ($accountType == 'landlord') ? 'checked' : ''; ?> onchange="this.closest('.account-type').querySelectorAll('.type-card').forEach(c=>c.classList.remove('active')); this.closest('.type-card').classList.add('active');">
              <div class="type-card-text">
                <span class="type-card-title">Rent Out My Property</span>
                <span class="type-card-desc">Owner or Landlord</span>
              </div>
            </label>
          </div>
          <?php if (isset($errors['account_type'])): ?>
          <span class="error-text"><?php echo $errors['account_type']; ?></span>
          <?php endif; ?>
        </div>

        <!-- Location Preferences -->
        <div class="form-group">
          <label class="form-label" style="margin-bottom: 0.75rem;">Preferred Location</label>
          <div class="form-row" style="gap: 1rem;">
            <div style="flex: 1;">
              <div class="photo-label" style="margin-bottom: 0.25rem;">Division</div>
              <select name="division" class="form-control">
                <option value="dhaka">Dhaka</option>
                <option value="chattogram">Chattogram</option>
              </select>
            </div>
            <div style="flex: 1;">
              <div class="photo-label" style="margin-bottom: 0.25rem;">District</div>
              <select name="district" class="form-control">
                <option value="dhaka">Dhaka</option>
              </select>
            </div>
            <div style="flex: 1;">
              <div class="photo-label" style="margin-bottom: 0.25rem;">Area</div>
              <select name="area" class="form-control">
                <option value="" disabled selected>Select Area</option>
                <option value="banani">Banani</option>
                <option value="gulshan">Gulshan</option>
              </select>
            </div>
          </div>
        </div>

        <div style="margin: 1.5rem 0 2rem;">
          <label class="checkbox-group">
            <input type="checkbox" name="terms" value="1">
            <span>I agree to the Terms & Conditions</span>
          </label>
          <label class="checkbox-group">
            <input type="checkbox" name="privacy" value="1">
            <span>I agree to the Privacy Policy</span>
          </label>
        </div>

        <h3 class="section-title">Rental Preferences (Tenant)</h3>
        
        <div class="form-group">
          <label class="form-label">Looking For</label>
          <select name="looking_for" class="form-control">
            <option value="" disabled selected>Select option</option>
            <option value="apartment">Full Apartment</option>
            <option value="room">Single Room</option>
            <option value="seat">Shared Seat</option>
          </select>
        </div>

        <div class="form-group">
          <label class="form-label">Budget Range</label>
          <div class="form-row">
            <input type="number" name="budget_min" class="form-control" placeholder="Min" style="flex: 1;">
            <input type="number" name="budget_max" class="form-control" placeholder="Max" style="flex: 1;">
          </div>
        </div>

        <div class="form-group">
          <label class="form-label">Preferred Area</label>
          <input type="text" name="preferred_area" class="form-control" placeholder="e.g. Dhanmondi, Gulshan">
        </div>

        <div class="form-group">
          <label class="form-label">Move-in Date</label>
          <input type="date" name="move_in_date" class="form-control">
        </div>

        <div class="form-group">
          <label class="form-label">Occupation</label>
          <input type="text" name="occupation" class="form-control" placeholder="e.g. Student, Working Professional">
        </div>

        <div class="form-group">
          <label class="form-label">Lifestyle Notes</label>
          <textarea name="lifestyle_notes" class="form-control" style="min-height: 80px;" placeholder="e.g. Non-smoker, pet-friendly, quiet hours..."></textarea>
        </div>

        <button type="submit" class="btn btn-primary btn-block" style="margin-top: 2rem;">Create Account</button>
      </form>

      <div class="auth-footer">
        Already have an account? <a href="login.php">Login</a>
      </div>
    </div>
  </div>

</body>
</html>

<?php
session_start();

$errors = $_SESSION["errors"] ?? [];
$old = $_SESSION["old"] ?? [];
unset($_SESSION["errors"], $_SESSION["old"]); 

$fullName = $old["full_name"] ?? '';
$email = $old["email"] ?? '';
$phone = $old["phone"] ?? '';
$gender = $old["gender"] ?? '';
$accountType = $old["account_type"] ?? '';
$location = $old["location"] ?? '';
$lookingFor = $old["looking_for"] ?? '';
$minBudget = $old["min_budget"] ?? '';
$maxBudget = $old["max_budget"] ?? '';
$prefLocation = $old["pref_location"] ?? '';
$moveInDate = $old["move_in_date"] ?? '';
$occupation = $old["occupation"] ?? '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | Rental Point</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body class="auth-page">
    <a href="../index.php" class="back-link"> Back </a>

    <div class="auth-container" style="padding: 4rem 2rem;">
        <div class="auth-card register-card">
            <div class="auth-header">
                <div class="logo"> Rental Point </div>
                <h1>Create Account</h1>
                <p> Join Bangladesh's most reliable rental search network </p>
            </div>

            <form action="../../Controller/createAccountController.php" method="POST" enctype="multipart/form-data">
                <?php if (!empty($errors["general"])) { ?>
                    <div class="alert-error">
                        <?php echo htmlspecialchars($errors["general"]); ?>
                    </div>
                <?php } ?>

                <?php if (!empty($successMessage)) { ?>
                    <div class="alert-error" style="background-color: #d4edda; color: #155724; border-color: #c3e6cb;">
                        <?php echo htmlspecialchars($successMessage); ?>
                    </div>
                <?php } ?>

                <div class="form-group">
                    <label class="form-label"> Profile Photo </label>

                    <input type="file" name="profile_photo" class="form-control" accept=".jpg,.jpeg,.png">

                    <?php if (isset($errors["profile_photo"])) { ?>
                        <span class="error-text">
                            <?php echo $errors["profile_photo"]; ?>
                        </span>
                    <?php } ?>
                </div>


                <div class="form-group <?php echo isset($errors["full_name"]) ? "has-error" : ""; ?>">

                    <label class="form-label">
                        Full Name <span>*</span>
                    </label>

                    <input type="text" name="full_name" class="form-control <?php echo isset($errors["full_name"]) ? "is-invalid" : ""; ?>" placeholder="e.g. RAHIM" value="<?php echo htmlspecialchars($fullName); ?>">

                    <?php if (isset($errors["full_name"])) { ?>
                        <span class="error-text">
                            <?php echo $errors["full_name"]; ?>
                        </span>
                    <?php } ?>
                </div>

                <div class="form-row">
                    <div class="form-group <?php echo isset($errors["email"]) ? "has-error" : ""; ?>">
                        <label class="form-label">
                            Email Address <span>*</span>
                        </label>

                        <input type="email" name="email" class="form-control <?php echo isset($errors["email"]) ? "is-invalid" : ""; ?>" placeholder="abc@gmail.com" value="<?php echo htmlspecialchars($email); ?>"> 
                        <?php if (isset($errors["email"])) { ?>
                            <span class="error-text">
                                <?php echo $errors["email"]; ?>
                            </span>
                        <?php } ?>
                    </div>


                    <div class="form-group <?php echo isset($errors["phone"]) ? "has-error" : ""; ?>">
                        <label class="form-label">
                            Phone Number <span>*</span>
                        </label>
                        <input type="tel" name="phone" class="form-control <?php echo isset($errors["phone"]) ? "is-invalid" : ""; ?>" placeholder="015XXXXXXXX" value="<?php echo htmlspecialchars($phone); ?>">

                        <?php if (isset($errors["phone"])) { ?>
                            <span class="error-text">
                                <?php echo $errors["phone"]; ?>
                            </span>
                        <?php } ?>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group <?php echo isset($errors["password"]) ? "has-error" : ""; ?>">
                        <label class="form-label">
                            Password <span>*</span>
                        </label>

                        <input type="password" name="password" class="form-control <?php echo isset($errors["password"]) ? "is-invalid" : ""; ?>" placeholder="Enter password">

                        <?php if (isset($errors["password"])) { ?>
                            <span class="error-text">
                                <?php echo $errors["password"]; ?>
                            </span>
                        <?php } ?>
                    </div>


                    <div class="form-group <?php echo isset($errors["confirm_password"]) ? "has-error" : ""; ?>">
                        <label class="form-label">
                            Confirm Password <span>*</span>
                        </label>
                        <input type="password" name="confirm_password"
                            class="form-control <?php echo isset($errors["confirm_password"]) ? "is-invalid" : ""; ?>"
                            placeholder="Confirm password">

                        <?php if (isset($errors["confirm_password"])) { ?>
                            <span class="error-text">
                                <?php echo $errors["confirm_password"]; ?>
                            </span>
                        <?php } ?>
                    </div>
                </div>


                <div class="form-group <?php echo isset($errors["gender"]) ? "has-error" : ""; ?>">
                    <label class="form-label">
                        Gender <span>*</span>
                    </label>
                    <div>
                        <label>
                            <input type="radio" name="gender"  value="Male" <?php echo ($gender == "Male") ? "checked" : ""; ?>> Male
                        </label>

                        <label style="margin-left: 20px;">
                            <input type="radio"  name="gender" value="Female" <?php echo ($gender == "Female") ? "checked" : ""; ?>>
                            Female
                        </label>
                    </div>

                    <?php if (isset($errors["gender"])) { ?>
                        <span class="error-text">
                            <?php echo $errors["gender"]; ?>
                        </span>
                    <?php } ?>
                </div>


                <div class="form-group <?php echo isset($errors["account_type"]) ? "has-error" : ""; ?>">
                    <label class="form-label">
                        Account Type <span>*</span>
                    </label>
                    <div class="account-type">
                        <label class="type-card">
                            <input type="radio" name="account_type" value="tenant" <?php echo ($accountType == "tenant") ? "checked" : ""; ?>>

                            <div class="type-card-text">
                                <span class="type-card-title">
                                    Find a Property / Room
                                </span>
                                <span class="type-card-desc">
                                    Tenant or Roommate
                                </span>
                            </div>
                        </label>


                        <label class="type-card">
                            <input type="radio" name="account_type" value="owner" <?php echo ($accountType == "owner") ? "checked" : ""; ?>>

                            <div class="type-card-text">
                                <span class="type-card-title">
                                    Rent Out My Property
                                </span>
                                <span class="type-card-desc">
                                    Owner or Landlord
                                </span>
                            </div>
                        </label>
                    </div>

                    <?php if (isset($errors["account_type"])) { ?>
                        <span class="error-text">
                            <?php echo $errors["account_type"]; ?>
                        </span>
                    <?php } ?>
                </div>


                <div class="form-group <?php echo isset($errors["location"]) ? "has-error" : ""; ?>">
                    <label class="form-label">
                        Current Location <span>*</span>
                    </label>
                    <input type="text" name="location" class="form-control <?php echo isset($errors["location"]) ? "is-invalid" : ""; ?>" placeholder="e.g. Mirpur, Dhaka" value="<?php echo htmlspecialchars($location); ?>">

                    <?php if (isset($errors["location"])) { ?>
                        <span class="error-text">
                            <?php echo $errors["location"]; ?>
                        </span>
                    <?php } ?>
                </div>


                <div id="rentalPreferences">
                    <h3 class="section-title">
                        Rental Preferences
                    </h3>

                    <div class="form-group">
                        <label class="form-label">
                            Looking For
                        </label>

                        <select name="looking_for" class="form-control">
                            <option value=""> Select option </option>

                            <option value="Full Apartment" <?php echo ($lookingFor == "Full Apartment") ? "selected" : ""; ?> > Full Apartment </option>

                            <option value="Single Room" <?php echo ($lookingFor == "Single Room") ? "selected" : ""; ?>> Single Room
                            </option>

                            <option value="Shared Seat" <?php echo ($lookingFor == "Shared Seat") ? "selected" : ""; ?> > Shared Seat </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label"> Budget Range </label>
                        <div class="form-row">
                            <input type="number" name="min_budget" class="form-control" placeholder="Minimum" value="<?php echo htmlspecialchars($minBudget); ?>">

                            <input type="number" name="max_budget" class="form-control" placeholder="Maximum" value="<?php echo htmlspecialchars($maxBudget); ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label"> Preferred Location </label>

                        <input type="text" name="pref_location" class="form-control" placeholder="e.g. Mirpur, Dhanmondi, Gulshan" value="<?php echo htmlspecialchars($prefLocation); ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label"> Move-in Date </label>

                        <input type="date" name="move_in_date" class="form-control" value="<?php echo htmlspecialchars($moveInDate); ?>">
                    </div>

                    <div class="form-group">
                        <label class="form-label"> Occupation </label>

                        <input type="text" name="occupation" class="form-control" placeholder="e.g. Student, Software Engineer"  value="<?php echo htmlspecialchars($occupation); ?>">
                    </div>
                </div>

                <div style="margin: 1.5rem 0 2rem;">
                    <label class="checkbox-group">
                        <input type="checkbox" name="terms" value="1">
                        <span> I agree to the Terms & Conditions </span>
                    </label>

                    <?php if (isset($errors["terms"])) { ?>
                        <span class="error-text">
                            <?php echo $errors["terms"]; ?>
                        </span>
                    <?php } ?>

                    <label class="checkbox-group">
                        <input type="checkbox" name="privacy" value="1" >
                        <span> I agree to the Privacy Policy </span>
                    </label>

                    <?php if (isset($errors["privacy"])) { ?>
                        <span class="error-text">
                            <?php echo $errors["privacy"]; ?>
                        </span>
                    <?php } ?>
                </div>

                <button type="submit" class="btn btn-primary btn-block" style="margin-top: 2rem;"> Create Account </button>
            </form>

            <div class="auth-footer">
                Already have an account?
                <a href="../login.php"> Login </a>
            </div>
        </div>
    </div>

    <script>
        const tenantRadio = document.querySelector('input[name="account_type"][value="tenant"]');

        const ownerRadio = document.querySelector('input[name="account_type"][value="owner"]');

        const rentalPreferences = document.getElementById("rentalPreferences");

        function showRentalPreferences() {
            if (tenantRadio.checked) {
                rentalPreferences.style.display = "block";
            } 
            else {
                rentalPreferences.style.display = "none";
            }
        }

        tenantRadio.addEventListener("change", showRentalPreferences);
        ownerRadio.addEventListener("change", showRentalPreferences);
        showRentalPreferences();
    </script>
</body>
</html>
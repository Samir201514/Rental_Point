<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - Rental Point</title>
    <link rel="stylesheet" href="./css/errorpopup.css">
</head>
<body>

    <?php
    // Dynamic error message handling via URL parameters or default fallback
    $error_message = isset($_GET['msg']) ? $_GET['msg'] : "Invalid email or password.";
    $redirect_url = isset($_GET['redirect']) ? $_GET['redirect'] : "login.php";
    ?>

    <!-- Error Modal Card Popup -->
    <div class="modal-card">
        
        <!-- Close Indicator -->
        <span class="close-dot" onclick="window.location.href='<?php echo htmlspecialchars($redirect_url); ?>';"></span>

        <!-- Warning Triangle Circle Icon -->
        <div class="error-icon-circle">
            <span class="warning-mark">&#9888;</span>
        </div>

        <!-- Headline & Message -->
        <h2 class="modal-title">Error</h2>
        <p class="modal-message"><?php echo htmlspecialchars($error_message); ?></p>

        <!-- OK Action Button -->
        <button type="button" class="btn-ok" onclick="window.location.href='<?php echo htmlspecialchars($redirect_url); ?>';">
            OK
        </button>

    </div>

</body>
</html>
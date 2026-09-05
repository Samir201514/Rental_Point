<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success - Rental Point</title>
    <style>
        /* CSS Reset & Dark Overlay Background Styling */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #6C727F;
            color: #333333;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* Success Popup Card Container */
        .modal-card {
            background-color: #FFFFFF;
            width: 100%;
            max-width: 380px;
            border-radius: 16px;
            padding: 30px 24px 24px 24px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            position: relative;
            text-align: center;
        }

        /* Close Dot Indicator */
        .close-dot {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 10px;
            height: 10px;
            background-color: #4A5568;
            border-radius: 50%;
            cursor: pointer;
        }

        /* Circular Check Icon */
        .success-icon-circle {
            width: 50px;
            height: 50px;
            background-color: #E6F4ED;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px auto;
        }

        .check-mark {
            color: #10B981;
            font-size: 22px;
            font-weight: bold;
        }

        /* Message Text Styling */
        .modal-title {
            font-size: 18px;
            font-weight: bold;
            color: #111111;
            margin-bottom: 6px;
        }

        .modal-message {
            font-size: 13px;
            color: #666666;
            margin-bottom: 24px;
        }

        /* OK Button Styling */
        .btn-ok {
            width: 100%;
            background-color: #10B981;
            color: #FFFFFF;
            border: none;
            border-radius: 8px;
            padding: 10px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-ok:hover {
            background-color: #059669;
        }
    </style>
</head>
<body>

    <?php
    // Dynamic message handling via URL parameters or default fallback
    $message = isset($_GET['msg']) ? $_GET['msg'] : "Post saved successfully.";
    $redirect_url = isset($_GET['redirect']) ? $_GET['redirect'] : "home.php";
    ?>

    <!-- Success Modal Card Popup -->
    <div class="modal-card">
        
        <!-- Close Indicator -->
        <span class="close-dot" onclick="window.location.href='<?php echo htmlspecialchars($redirect_url); ?>';"></span>

        <!-- Checkmark Circle Icon -->
        <div class="success-icon-circle">
            <span class="check-mark">&#10003;</span>
        </div>

        <!-- Headline & Message -->
        <h2 class="modal-title">Success</h2>
        <p class="modal-message"><?php echo htmlspecialchars($message); ?></p>

        <!-- OK Action Button -->
        <button type="button" class="btn-ok" onclick="window.location.href='<?php echo htmlspecialchars($redirect_url); ?>';">
            OK
        </button>

    </div>

</body>
</html>
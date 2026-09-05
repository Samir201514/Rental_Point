<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report this Post - Rental Point</title>
    <style>
        /* CSS Reset & Body Background */
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

        /* Modal Container Popup Box */
        .modal-card {
            background-color: #FFFFFF;
            width: 100%;
            max-width: 440px;
            border-radius: 16px;
            padding: 28px 24px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            position: relative;
        }

        /* Header Area */
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-bottom: 12px;
            border-bottom: 1px solid #F0F0F0;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 20px;
            font-weight: bold;
            color: #111111;
        }

        .close-btn {
            background: none;
            border: none;
            font-size: 18px;
            color: #888888;
            cursor: pointer;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .close-btn:hover {
            color: #333333;
            background-color: #F0F0F0;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            color: #555555;
            margin-bottom: 8px;
        }

        /* Select Input Styling */
        .select-box {
            width: 100%;
            padding: 10px 14px;
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            font-size: 14px;
            color: #333333;
            background-color: #FFFFFF;
            outline: none;
            cursor: pointer;
        }

        .select-box:focus {
            border-color: #72C39B;
        }

        /* Custom Visual List Mock for Options Display */
        .options-preview-box {
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            margin-top: 6px;
            overflow: hidden;
            background-color: #FFFFFF;
        }

        .option-item {
            padding: 10px 14px;
            font-size: 13px;
            color: #333333;
            border-bottom: 1px solid #F0F0F0;
            cursor: pointer;
        }

        .option-item:last-child {
            border-bottom: none;
        }

        .option-item:hover {
            background-color: #F8F8F8;
        }

        /* Textarea Input Styling */
        .textarea-box {
            width: 100%;
            height: 100px;
            padding: 12px 14px;
            border: 1px solid #E0E0E0;
            border-radius: 8px;
            font-size: 13px;
            font-family: Arial, Helvetica, sans-serif;
            color: #333333;
            resize: none;
            outline: none;
        }

        .textarea-box:focus {
            border-color: #72C39B;
        }

        .textarea-box::placeholder {
            color: #999999;
        }

        /* Modal Footer Action Buttons */
        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 24px;
        }

        .btn {
            padding: 9px 20px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            cursor: pointer;
            border: none;
            display: inline-block;
            text-align: center;
        }

        .btn-cancel {
            background-color: #FFFFFF;
            color: #444444;
            border: 1px solid #E0E0E0;
        }

        .btn-cancel:hover {
            background-color: #F5F5F5;
        }

        .btn-submit {
            background-color: #72C39B;
            color: #FFFFFF;
        }

        .btn-submit:hover {
            background-color: #5FB188;
        }
    </style>
</head>
<body>

    <?php
    // Array storing predefined report reasons
    $report_reasons = array(
        "Fake Listing",
        "Inappropriate Content",
        "Spam",
        "Scam/Fraud",
        "Other"
    );

    // Dynamic ID handling (mocked)
    $post_id = isset($_GET['id']) ? intval($_GET['id']) : 1;
    ?>

    <!-- Report Popup Modal Card -->
    <div class="modal-card">
        
        <!-- Header Title & Close Button -->
        <div class="modal-header">
            <h2 class="modal-title">Report this Post</h2>
            <button type="button" class="close-btn" onclick="window.history.back();">&#10005;</button>
        </div>

        <!-- Form Submission Section -->
        <form action="report_submit.php" method="POST">
            
            <input type="hidden" name="post_id" value="<?php echo $post_id; ?>">

            <!-- Reason Dropdown Selection -->
            <div class="form-group">
                <label for="reason" class="form-label">Reason for Report</label>
                <select id="reason" name="reason" class="select-box">
                    <?php
                    foreach ($report_reasons as $reason) {
                        echo '<option value="' . htmlspecialchars($reason) . '">' . htmlspecialchars($reason) . '</option>';
                    }
                    ?>
                </select>

                <!-- Options Preview Box -->
                <div class="options-preview-box">
                    <?php
                    foreach ($report_reasons as $reason) {
                        echo '<div class="option-item">' . htmlspecialchars($reason) . '</div>';
                    }
                    ?>
                </div>
            </div>

            <!-- Additional Details Text Area -->
            <div class="form-group">
                <label for="details" class="form-label">Additional Details</label>
                <textarea id="details" name="details" class="textarea-box" placeholder="Provide any specific details that help us investigate this listing faster..."></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="modal-footer">
                <button type="button" class="btn btn-cancel" onclick="window.history.back();">Cancel</button>
                <button type="submit" class="btn btn-submit">Submit Report</button>
            </div>

        </form>

    </div>

</body>
</html>
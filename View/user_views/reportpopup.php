<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report this Post - Rental Point</title>
    <link rel="stylesheet" href="./css/reportpopup.css">
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
                <a href="sucesspopup.php?msg=Report" type="submit" class="btn btn-submit">Submit Report</a>
            </div>

        </form>

    </div>

</body>
</html>
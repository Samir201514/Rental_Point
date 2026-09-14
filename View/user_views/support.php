<?php

$subjectErr = isset($_GET["subjectErr"]) ? $_GET["subjectErr"] : "";
$descriptionErr = isset($_GET["descriptionErr"]) ? $_GET["descriptionErr"] : "";

$success = isset($_GET["success"]) ? $_GET["success"] : "";
$error = isset($_GET["error"]) ? $_GET["error"] : "";

?>

<!DOCTYPE html>
<html>

<head>

    <title> Support</title>
    <link rel="stylesheet" href="css/support.css">

</head>

<body>

<h1>Rental Point</h1>

<div class="container">

    <h2>Help & Support</h2>

    <p>
        If you are facing any problem, please submit a support ticket.
        Our support team will review your problem.
    </p>


    <?php

    if(!empty($success))
    {
        echo "<p class='success'>$success</p>";
    }

    if(!empty($error))
    {
        echo "<p class='error'>$error</p>";
    }

    ?>


    <form method="post" action="../controllers/supportController.php">

        <fieldset>

            <legend>Submit a Support Ticket</legend>

            <label>Subject:</label>

            <input type="text" name="subject">

            <span class="error">
                <?php echo $subjectErr; ?>
            </span>

            <br>


            <label>Description:</label>

            <textarea name="description"></textarea>

            <span class="error">
                <?php echo $descriptionErr; ?>
            </span>

            <br>

        </fieldset>


        <div class="buttons">

            <input type="reset" value="Cancel">

            <input type="submit" value="Submit Ticket">

        </div>

    </form>

</div>


<footer>

    <h3>Rental Point</h3>

    <p>
        Rental Point is a rental property management platform
        for finding and managing rental properties.
    </p>

    <p>
        Office: Dhaka, Bangladesh
    </p>

    <p>
        &copy; 2026 Rental Point. All Rights Reserved.
    </p>

</footer>

</body>

</html>
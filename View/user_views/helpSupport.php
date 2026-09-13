<?php

$subjectErr = isset($_GET["subjectErr"]) ? $_GET["subjectErr"] : "";
$descriptionErr = isset($_GET["descriptionErr"]) ? $_GET["descriptionErr"] : "";

$success = isset($_GET["success"]) ? $_GET["success"] : "";
$error = isset($_GET["error"]) ? $_GET["error"] : "";

?>

<!DOCTYPE html>
<html>

<head>

    <title>Help & Support</title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #2e7d32;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
        }

        h2 {
            color: #333;
        }

        fieldset {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        legend {
            font-weight: bold;
            color: #2e7d32;
        }

        label {
            display: inline-block;
            width: 120px;
            margin-bottom: 15px;
        }

        input[type="text"] {
            width: 300px;
            padding: 8px;
        }

        textarea {
            width: 400px;
            height: 120px;
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 10px 25px;
            cursor: pointer;
        }

        input[type="reset"] {
            background-color: gray;
            color: white;
            border: none;
            padding: 10px 25px;
            cursor: pointer;
        }

        .buttons {
            text-align: center;
            margin-top: 20px;
        }

        .error {
            color: red;
            font-size: 14px;
        }

        .success {
            color: green;
            text-align: center;
            font-weight: bold;
        }

        footer {
            text-align: center;
            margin-top: 30px;
        }

    </style>

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
<?php
$postTitleErr = isset($_GET["postTitleErr"]) ? $_GET["postTitleErr"] : "";
$monthlyRentErr = isset($_GET["monthlyRentErr"]) ? $_GET["monthlyRentErr"] : "";
$success = isset($_GET["success"]) ? $_GET["success"] : "";
$error = isset($_GET["error"]) ? $_GET["error"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>

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

        form {
            background-color: white;
            width: 85%;
            margin: auto;
            padding: 25px;
            border-radius: 8px;
        }

        fieldset {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        legend {
            font-weight: bold;
            color: #2e7d32;
        }

        label {
            display: inline-block;
            width: 140px;
            margin-bottom: 10px;
        }

        input, select, textarea {
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="number"] {
            width: 250px;
        }

        textarea {
            width: 400px;
            height: 120px;
        }

        input[type="radio"],
        input[type="checkbox"],
        input[type="file"] {
            width: auto;
        }

        .error {
            color: red;
        }

        .success {
            color: green;
            text-align: center;
            font-weight: bold;
        }

        .buttons {
            text-align: center;
        }

        input[type="submit"] {
            background-color: #2e7d32;
            color: white;
            border: none;
            padding: 10px 25px;
        }

        input[type="reset"] {
            background-color: gray;
            color: white;
            border: none;
            padding: 10px 25px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<h1>Edit Post</h1>

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

<form method="post" action="../controllers/editPostController.php" enctype="multipart/form-data">

    <input type="hidden" name="propertyId" value="1">

    <fieldset>
        <legend>Post Type</legend>

        <input type="radio" name="postType" value="Property for Rent" checked>
        Property for Rent

        <input type="radio" name="postType" value="Roommate Wanted">
        Roommate Wanted

        <input type="radio" name="postType" value="Sublet">
        Sublet
    </fieldset>


    <fieldset>
        <legend>Basic Information</legend>

        <label>Post Title:</label>
        <input type="text" name="postTitle"
               value="Charming 3-Bed Apartment">

        <span class="error"><?php echo $postTitleErr; ?></span>
        <br>

        <label>Property Type:</label>

        <select name="propertyType">
            <option value="Apartment">Apartment / Flat</option>
            <option value="House">House</option>
            <option value="Room">Room</option>
        </select>
        <br>

        <label>Furnishing Status:</label>

        <select name="furnishingStatus">
            <option value="Semi Furnished">Semi-Furnished</option>
            <option value="Fully Furnished">Fully Furnished</option>
            <option value="Unfurnished">Unfurnished</option>
        </select>
        <br>
    </fieldset>


    <fieldset>
        <legend>Location</legend>

        <label>Division:</label>

        <select name="division">
            <option value="Dhaka">Dhaka</option>
            <option value="Rajshahi">Rajshahi</option>
            <option value="Chittagong">Chittagong</option>
            <option value="Sylhet">Sylhet</option>
        </select>
        <br>

        <label>District:</label>
        <input type="text" name="district" value="Dhaka">
        <br>

        <label>Area:</label>
        <input type="text" name="area" value="Gulshan 2">
        <br>

        <label>Road:</label>
        <input type="text" name="road" value="Road 52, House 12A">
        <br>

        <label>Nearby Landmark:</label>
        <input type="text" name="landmark"
               value="Near Gulshan Lake Park">
        <br>
    </fieldset>


    <fieldset>
        <legend>Property Details</legend>

        <label>Bedrooms:</label>
        <select name="bedrooms">
            <option value="3">3</option>
            <option value="2">2</option>
        </select>
        <br>

        <label>Bathrooms:</label>
        <select name="bathrooms">
            <option value="3">3</option>
            <option value="2">2</option>
        </select>
        <br>

        <label>Property Size:</label>
        <input type="number" name="propertySize" value="1650">
        <br>

        <label>Floor Number:</label>
        <input type="text" name="floorNumber" value="5th Floor">
        <br>

        <label>Total Floors:</label>
        <input type="number" name="totalFloors" value="9">
        <br>
    </fieldset>


    <fieldset>
        <legend>Pricing</legend>

        <label>Monthly Rent:</label>
        <input type="number" name="monthlyRent" value="45000">

        <span class="error"><?php echo $monthlyRentErr; ?></span>
        <br>

        <label>Service Charge:</label>
        <input type="number" name="serviceCharge" value="5500">
        <br>

        <label>Security Deposit:</label>
        <input type="number" name="securityDeposit" value="90000">
        <br>

        <label>Rent Negotiable:</label>
        <input type="checkbox" name="rentNegotiable"
               value="Yes" checked>
        <br>
    </fieldset>


    <fieldset>
        <legend>Property Media</legend>

        <label>Property Picture:</label>
        <input type="file" name="propertyPicture">
        <br>
    </fieldset>


    <fieldset>
        <legend>Detailed Description</legend>

        <label>Description:</label>

        <textarea name="description">Beautiful and spacious 3-bedroom apartment located in Gulshan 2. The apartment has modern facilities and is suitable for family living.</textarea>

        <br>
    </fieldset>


    <div class="buttons">
        <input type="reset" value="Cancel">
        <input type="submit" value="Update Post">
    </div>

</form>


<footer>
    <p>Rental Point</p>
    <p>&copy; 2026 Rental Point. All Rights Reserved.</p>
</footer>

</body>
</html>
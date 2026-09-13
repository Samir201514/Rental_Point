<?php
$postTitleErr = isset($_GET["postTitleErr"]) ? $_GET["postTitleErr"] : "";
$monthlyRentErr = isset($_GET["monthlyRentErr"]) ? $_GET["monthlyRentErr"] : "";
$success = isset($_GET["success"]) ? $_GET["success"] : "";
$error = isset($_GET["error"]) ? $_GET["error"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create New Listing</title>

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
            width: 80%;
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
            width: 180px;
            margin-bottom: 10px;
        }

        input, select, textarea {
            padding: 8px;
            margin-bottom: 10px;
            width: 250px;
        }

        textarea {
            width: 400px;
            height: 100px;
        }

        input[type="checkbox"],
        input[type="radio"] {
            width: auto;
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

        .buttons {
            text-align: center;
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
    </style>
</head>

<body>

<h1>Create New Listing</h1>

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

<form method="post" action="../controllers/createListingController.php" enctype="multipart/form-data">

    <fieldset>
        <legend>Basic Information</legend>

        <label>Post Title:</label>
        <input type="text" name="postTitle">
        <span class="error"><?php echo $postTitleErr; ?></span>
        <br>

        <label>Property Type:</label>
        <select name="propertyType">
            <option value="Apartment">Apartment</option>
            <option value="House">House</option>
            <option value="Room">Room</option>
        </select>
        <br>

        <label>Furnishing Status:</label>
        <select name="furnishingStatus">
            <option value="Fully Furnished">Fully Furnished</option>
            <option value="Semi Furnished">Semi Furnished</option>
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
        <input type="text" name="district">
        <br>

        <label>Area:</label>
        <input type="text" name="area">
        <br>

        <label>Road Name/Number:</label>
        <input type="text" name="road">
        <br>

        <label>Nearby Landmark:</label>
        <input type="text" name="landmark">
        <br>
    </fieldset>


    <fieldset>
        <legend>Property Details</legend>

        <label>Bedrooms:</label>
        <select name="bedrooms">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <br>

        <label>Bathrooms:</label>
        <select name="bathrooms">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <br>

        <label>Property Size:</label>
        <input type="number" name="propertySize">
        <br>

        <label>Floor Number:</label>
        <input type="text" name="floorNumber">
        <br>

        <label>Total Floors:</label>
        <input type="number" name="totalFloors">
        <br>
    </fieldset>


    <fieldset>
        <legend>Pricing</legend>

        <label>Monthly Rent:</label>
        <input type="number" name="monthlyRent">
        <span class="error"><?php echo $monthlyRentErr; ?></span>
        <br>

        <label>Service Charge:</label>
        <input type="number" name="serviceCharge">
        <br>

        <label>Security Deposit:</label>
        <input type="number" name="securityDeposit">
        <br>

        <label>Rent is negotiable:</label>
        <input type="checkbox" name="rentNegotiable" value="Yes">
        <br>
    </fieldset>


    <fieldset>
        <legend>Amenities & Features</legend>

        <label>Lift/Elevator:</label>
        <input type="checkbox" name="lift" value="Yes">
        <br>

        <label>Car Parking:</label>
        <input type="checkbox" name="parking" value="Yes">
        <br>

        <label>Generator Backup:</label>
        <input type="checkbox" name="generator" value="Yes">
        <br>

        <label>Gas Supply:</label>
        <input type="checkbox" name="gas" value="Yes">
        <br>

        <label>Water Supply:</label>
        <input type="checkbox" name="water" value="Yes">
        <br>

        <label>Wi-Fi Internet:</label>
        <input type="checkbox" name="wifi" value="Yes">
        <br>

        <label>Security Guard:</label>
        <input type="checkbox" name="security" value="Yes">
        <br>

        <label>Attached Balcony:</label>
        <input type="checkbox" name="balcony" value="Yes">
        <br>
    </fieldset>


    <fieldset>
        <legend>Tenant Preferences</legend>

        <label>Allowed Tenants:</label>

        <input type="radio" name="allowedTenants" value="Family" checked>
        Family

        <input type="radio" name="allowedTenants" value="Bachelor">
        Bachelor

        <input type="radio" name="allowedTenants" value="Student">
        Student
        <br><br>

        <label>Gender Preference:</label>

        <input type="radio" name="genderPreference" value="Any" checked>
        Any

        <input type="radio" name="genderPreference" value="Male">
        Male

        <input type="radio" name="genderPreference" value="Female">
        Female
        <br>
    </fieldset>


    <fieldset>
        <legend>Availability</legend>

        <label>Available From:</label>
        <input type="date" name="availableFrom">
        <br>

        <label>Minimum Stay Period:</label>

        <select name="minimumStay">
            <option value="3">3 Months</option>
            <option value="6">6 Months</option>
            <option value="12">12 Months</option>
        </select>
        <br>
    </fieldset>


    <fieldset>
        <legend>Property Media</legend>

        <label>Upload Property Picture:</label>
        <input type="file" name="propertyPicture">
        <br>
    </fieldset>


    <fieldset>
        <legend>Detailed Description</legend>

        <label>Description:</label>
        <textarea name="description"></textarea>
        <br>
    </fieldset>


    <div class="buttons">
        <input type="submit" value="Publish Post">
        <input type="reset" value="Reset">
    </div>

</form>

</body>
</html>
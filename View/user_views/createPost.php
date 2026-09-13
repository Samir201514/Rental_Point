<?php
$postTitleErr = isset($_GET["postTitleErr"]) ? $_GET["postTitleErr"] : "";
$monthlyRentErr = isset($_GET["monthlyRentErr"]) ? $_GET["monthlyRentErr"] : "";
$success = isset($_GET["success"]) ? $_GET["success"] : "";
$error = isset($_GET["error"]) ? $_GET["error"] : "";
?>

<!DOCTYPE html>
<html>
<head>
    <title> Create New Post </title>
    <link rel="stylesheet" href="css/createPost.css">
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

<form method="POST" action="../../Controller/createListingController.php" enctype="multipart/form-data">

    <fieldset>
        <legend>Basic Information</legend>

        <label>Post Title:</label>
        <input type="text" name="postTitle">
        <span class="error"><?php echo $postTitleErr; ?></span>
        <br>

        <label>Property Type:</label>
        <select name="propertyType">
            <option value=""> Choose </option>
            <option value="Rental"> Rental </option>
            <option value="Sublet"> Sublet </option>
            <option value="Roommate"> Roommate </option>
        </select>
        <br>
    </fieldset>


    <fieldset>
        <legend>Location</legend>
        <label> Location: </label>
        <input type="text" name="location">    
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
    </fieldset>


    <fieldset>
        <legend>Property Media</legend>

        <label>Upload Property Picture:</label>
        <input type="file" name="propertyPicture">
        <br>
    </fieldset>


    <fieldset>
        <legend>Detailed Description</legend>
        <textarea name="description"></textarea>
    </fieldset>


    <div class="buttons">
        <input type="submit" value="Publish Post">
        <input type="reset" value="Reset">
    </div>
</form>

</body>
</html>
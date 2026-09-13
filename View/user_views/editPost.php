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
    <link rel="stylesheet" href="css/editPost.css">
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
    </fieldset>


    <fieldset>
        <legend>Property Media</legend>

        <label>Property Picture:</label>
        <input type="file" name="propertyPicture">
        <br>
    </fieldset>


    <fieldset>
        <legend>Detailed Description</legend>

        <textarea name="description">
            Beautiful and spacious 3-bedroom apartment located in Gulshan 2. The apartment has modern facilities and is suitable for family living.
        </textarea>
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
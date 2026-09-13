<?php

$propertyId = isset($_GET["id"]) ? $_GET["id"] : "1";

?>

<!DOCTYPE html>
<html>
<head>
    <title> Property Details </title>
    <link rel="stylesheet" href="css/postDetails.css">
</head>

<body>

<h1>Rental Point</h1>

<div class="container">

    <h2>Spacious 2-Bedroom Apartment in Dhanmondi</h2>

    <p class="location">
        Road 8/A, Dhanmondi, Dhaka
    </p>


    <fieldset>
        <legend>Property Details</legend>

        <p><strong>Bedrooms:</strong> 2</p>
        <p><strong>Bathrooms:</strong> 1</p>
    </fieldset>


    <fieldset>

        <legend>Price Details</legend>

        <p><strong>Monthly Rent:</strong> 12,000 BDT</p>
        <p><strong>Service Charge:</strong> 2,000 BDT</p>

    </fieldset>


    <fieldset>

        <legend>Amenities</legend>

        <p>
            <input type="checkbox" checked disabled>
            Lift
        </p>

        <p>
            <input type="checkbox" checked disabled>
            Parking
        </p>

        <p>
            <input type="checkbox" checked disabled>
            Generator
        </p>

        <p>
            <input type="checkbox" checked disabled>
            Gas
        </p>

        <p>
            <input type="checkbox" checked disabled>
            Wi-Fi
        </p>

        <p>
            <input type="checkbox" checked disabled>
            Balcony
        </p>

        <p>
            <input type="checkbox" disabled>
            Gym
        </p>

        <p>
            <input type="checkbox" disabled>
            CCTV
        </p>

    </fieldset>


    <fieldset>

        <legend>Tenant Preferences</legend>

        <p><strong>Tenant:</strong> Family Preferred</p>
        <p><strong>Gender:</strong> Any</p>
        <p><strong>Pets:</strong> No</p>
        <p><strong>Smoking:</strong> No</p>

    </fieldset>


    <fieldset>

        <legend>Availability</legend>

        <p><strong>Available From:</strong> March 1, 2026</p>

    </fieldset>


    <fieldset>

        <legend>Description</legend>

        <p>
            Spacious 2-bedroom apartment located in Dhanmondi.
            The apartment is suitable for a family and has modern
            facilities including lift, parking, generator, gas,
            Wi-Fi and balcony.
        </p>

    </fieldset>


    <div style="text-align:center;">

        <button type="button">
            Contact Owner
        </button>

        <button type="button">
            Book Viewing
        </button>

        <button type="button">
            Save Post
        </button>

    </div>

</div>


<footer>

    <p>Rental Point</p>

    <p>&copy; 2026 Rental Point. All Rights Reserved.</p>

</footer>

</body>
</html>
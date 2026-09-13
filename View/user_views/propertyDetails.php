<?php

$propertyId = isset($_GET["id"]) ? $_GET["id"] : "1";

?>

<!DOCTYPE html>
<html>
<head>

    <title>Property Details</title>

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

        .location {
            color: #666;
            margin-bottom: 20px;
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

        p {
            margin: 8px 0;
        }

        input[type="checkbox"] {
            margin-right: 5px;
        }

        button {
            padding: 10px 20px;
            margin: 5px;
            border: none;
            cursor: pointer;
            background-color: #2e7d32;
            color: white;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }

    </style>

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
        <p><strong>Size:</strong> 850 sqft</p>
        <p><strong>Floor:</strong> 3rd</p>
        <p><strong>Total Floors:</strong> 6</p>
        <p><strong>Type:</strong> Apartment</p>
        <p><strong>Furnishing:</strong> Semi-Furnished</p>
        <p><strong>Facing:</strong> South Facing</p>

    </fieldset>


    <fieldset>

        <legend>Price Details</legend>

        <p><strong>Monthly Rent:</strong> 12,000 BDT</p>
        <p><strong>Service Charge:</strong> 2,000 BDT</p>
        <p><strong>Security Deposit:</strong> 24,000 BDT</p>
        <p><strong>Advance Payment:</strong> 12,000 BDT</p>
        <p><strong>Total Initial:</strong> 50,000 BDT</p>

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
        <p><strong>Minimum Stay:</strong> 12 Months</p>
        <p><strong>Viewing Time:</strong> 10 AM - 6 PM</p>

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
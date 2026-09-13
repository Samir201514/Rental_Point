<?php
    require "../Model/dbConnect.php";

    

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["Save"])){
        $name = trim($_POST['name']);
        $name = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS);

        $email = trim($_POST['email']);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $phone = trim($_POST['phone']);
        $phone = filter_var($phone, FILTER_SANITIZE_SPECIAL_CHARS);

        $currentLocation = trim($_POST['currentLocation']);
        $currentLocation = filter_var($currentLocation, FILTER_SANITIZE_SPECIAL_CHARS);

        $lookingFor = trim($_POST['lookingFor']) ?? "";
        $lookingFor = filter_var($lookingFor, FILTER_SANITIZE_SPECIAL_CHARS);

        $minBudget = trim($_POST['minBudget']);
        $maxBudget = trim($_POST['maxBudget']);
       

        $location = trim($_POST['location']);
        $location = filter_var($location, FILTER_SANITIZE_SPECIAL_CHARS);

        $moveInDate = trim($_POST['moveInDate']) ?? "";

        $occupation = trim($_POST['occupation']);
        $occupation = filter_var($occupation, FILTER_SANITIZE_SPECIAL_CHARS);

        if ($name == "") {
            echo "Name is required";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email";
        }

        if (!preg_match("/^01[3-9][0-9]{8}$/", $phone)) {
            echo "Invalid phone number";
        }

        if ($currentLocation == "") {
            echo "Current location is required";
        }

        if ($lookingFor == "") {
            echo "Please select an option";
        }

        if (!is_numeric($minBudget) || !is_numeric($maxBudget)) {
            echo "Budget must be a number";
        }

        if ($minBudget > $maxBudget) {
            echo "Invalid budget range";
        }
    }
?>
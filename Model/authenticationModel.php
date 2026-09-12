<?php
    function loginUser($conn, $email, $password)
    {
        $sql = "SELECT UserId, Name, Password, UserTypeId FROM User WHERE Email = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $email);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $user = mysqli_fetch_assoc($result);

        if ($user && password_verify($password, $user["Password"])) {
            return $user;
        }

        return false;
    }

    function checkDuplicateEmail($conn, $email)
    {
        $sql = "SELECT UserId FROM User WHERE Email = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return (mysqli_num_rows($result) > 0);
    }

    function addUser($conn, $ProfilePhoto, $name, $password, $gender, $userTypeId, $email, $phone, $location) 
    {
        $sql = "INSERT INTO User (ProfilePhoto, Name, Password, Gender, UserTypeId, Email, Phone, Location) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "ssssisss", $ProfilePhoto, $name, $password, $gender, $userTypeId, $email, $phone, $location);

        mysqli_stmt_execute($stmt);

        $userId = mysqli_insert_id($conn);

        return $userId;
    }

    function addUserPreference($conn, $userId, $lookingFor, $minBudget, $maxBudget, $location, $moveInDate, $occupation)
    {
        $sql = "INSERT INTO userpreference
            (UserId, LookingFor, MinBudget, MaxBudget, Location, MoveInDate, Occupation)
            VALUES (?, ?, ?, ?, ?, ?, ?);";
        
        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "isddsss", $userId, $lookingFor, $minBudget, $maxBudget, $location, $moveInDate, $occupation);

        mysqli_stmt_execute($stmt);
    }
?>
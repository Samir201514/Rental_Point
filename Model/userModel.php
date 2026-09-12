<?php

    function getUser($conn, $userId)
    {
        $sql = "SELECT * FROM User WHERE UserId = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $user = mysqli_fetch_assoc($result);

        return $user;
    }

    function getUserPreference($conn, $userId)
    {
        $sql = "SELECT * FROM UserPreference WHERE UserId = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $preference = mysqli_fetch_assoc($result);

        return $preference;
    }

    function updateUser($conn, $profilePhoto, $name, $gender, $phone, $location, $userId)
    {
        $sql = "UPDATE User SET ProfilePhoto = ?, Name = ?, Gender = ?, Phone = ?, Location = ? WHERE UserId = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "sssssi", $profilePhoto, $name, $gender, $phone, $location, $userId);

        mysqli_stmt_execute($stmt);
    }

    function updateUserPreference($conn, $lookingFor, $minBudget, $maxBudget, $location, $moveInDate, $occupation, $userId)
    {
        $sql = "UPDATE userpreference SET LookingFor = ?, MinBudget = ?, MaxBudget = ?, Location = ?, MoveInDate = ?, Occupation = ? WHERE UserId = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "sddsssi", $lookingFor, $minBudget, $maxBudget, $location, $moveInDate, $occupation, $userId);

        mysqli_stmt_execute($stmt);
    }


    function getPassword($conn, $userId)
    {
        $sql = "SELECT Password FROM User WHERE UserId = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $user = mysqli_fetch_assoc($result);

        return $user["Password"];
    }

    function changePassword($conn, $userId, $newHash)
    {
        $sql = "UPDATE User SET Password = ? WHERE UserId = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "si", $newHash, $userId);

        mysqli_stmt_execute($stmt);
    }

    function deleteAccount($conn, $userId)
    {
        $sql = "DELETE FROM User WHERE UserId = ?;";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);
    }
?>
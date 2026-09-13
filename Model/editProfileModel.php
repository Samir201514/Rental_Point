<?php

function updateUser($conn, $profilePhoto, $name, $gender, $phone, $location, $userId)
{
    $sql = "UPDATE `User` SET ProfilePhoto = ?, Name = ?, Gender = ?, Phone = ?, Location = ? WHERE UserId = ?;";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Update user error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sssssi", $profilePhoto, $name, $gender, $phone, $location, $userId);

    if (!mysqli_stmt_execute($stmt)) {
        die("Update user execute error: " . mysqli_stmt_error($stmt));
    }
}

function updateUserPreference($conn, $lookingFor, $minBudget, $maxBudget, $location, $moveInDate, $occupation, $userId)
{
    $sql = "UPDATE `userpreference` SET LookingFor = ?, MinBudget = ?, MaxBudget = ?, Location = ?, MoveInDate = ?, Occupation = ? WHERE UserId = ?;";

    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Update user preference error: " . mysqli_error($conn));
    }

    mysqli_stmt_bind_param($stmt, "sddsssi", $lookingFor, $minBudget, $maxBudget, $location, $moveInDate, $occupation, $userId);

    if (!mysqli_stmt_execute($stmt)) {
        die("Update user preference execute error: " . mysqli_stmt_error($stmt));
    }
}
?>
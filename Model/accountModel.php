<?php

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
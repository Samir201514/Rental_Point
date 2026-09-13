<?php

    function createSupport($conn, $userId, $subject, $description)
    {
        $sql = "INSERT INTO support (UserId, Subject, Description) VALUES (?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iss", $userId, $subject, $description);

        mysqli_stmt_execute($stmt);
    }
    
    function getMySupport($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT *
            FROM support
            WHERE UserId = ?
            ORDER BY SubmittedAt DESC"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }
?>
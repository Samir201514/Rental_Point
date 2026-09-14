<?php

    function submitVerificationDoc($conn, $userId, $verifyDocPath)
    {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO verificationdoc
            (UserId, VerifyDocPath)
            VALUES (?, ?)"
        );

        mysqli_stmt_bind_param($stmt, "is", $userId, $verifyDocPath);

        mysqli_stmt_execute($stmt);
    }

    function getMyVerification($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT *
            FROM verificationdoc
            WHERE UserId = ?
            ORDER BY SubmittedAt DESC"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }

    function increaseViews($conn, $postId)
    {
        $stmt = mysqli_prepare($conn,
            "UPDATE post
            SET ViewsCount = ViewsCount + 1
            WHERE PostId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $postId);

        mysqli_stmt_execute($stmt);
    }

    function getOwnerStats($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                COUNT(*) AS TotalPosts,
                COALESCE(SUM(ViewsCount), 0) AS TotalViews,
                COALESCE(SUM(ContactsCount), 0) AS TotalContacts
            FROM post
            WHERE UserId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $stats = mysqli_fetch_assoc($result);

        return $stats;
    }

    function getPerPostStats($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                PostId,
                Title,
                ViewsCount,
                ContactsCount
            FROM post
            WHERE UserId = ?
            ORDER BY ViewsCount DESC"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        
        return $result;
    }

    function getPostContact($conn, $postId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                u.Name,
                u.Email,
                u.Phone
            FROM post p
            JOIN User u
                ON p.UserId = u.UserId
            WHERE p.PostId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $postId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $contact = mysqli_fetch_assoc($result);

        return $contact;
    }

    function increaseContacts($conn, $postId)
    {
        $stmt = mysqli_prepare($conn,
            "UPDATE post
            SET ContactsCount = ContactsCount + 1
            WHERE PostId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $postId);
        
        mysqli_stmt_execute($stmt);
    }
?>
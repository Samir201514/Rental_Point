<?php

    function createSupport($conn, $userId, $subject, $description)
    {
        $sql = "INSERT INTO support (UserId, Subject, Description) VALUES (?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iss", $userId, $subject, $description);

        mysqli_stmt_execute($stmt);
    }

    function createReport($conn, $userId, $postId, $reportType, $description) 
    {
        $sql = "INSERT INTO report (ReportedBy, PostId, ReportType, Description) VALUES (?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iiss", $userId, $postId, $reportType, $description);

        mysqli_stmt_execute($stmt);
    }

    function createBooking($conn, $postId, $userId, $dateTime, $note) 
    {
        $sql = "INSERT INTO booking (PostId, UserId, PreferredDateTime, Note) VALUES (?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iiss", $postId, $userId, $dateTime, $note);

        mysqli_stmt_execute($stmt);
    }

    function getMyPost($conn, $postId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT UserId
            FROM post
            WHERE PostId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $postId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $post = mysqli_fetch_assoc($result);

        return $post;
    }

    function getMyBookingSent($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                b.BookingId,
                b.PostId,
                b.PreferredDateTime,
                b.Note,
                b.Status,
                b.CreatedAt,
                p.Title,
                p.MonthlyRent,
                u.Name AS OwnerName
            FROM booking b
            JOIN post p
                ON b.PostId = p.PostId
            JOIN `user` u
                ON p.UserId = u.UserId
            WHERE b.UserId = ?
            ORDER BY b.CreatedAt DESC"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }

    function getMyBookingReceived($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                b.BookingId,
                b.PostId,
                b.UserId,
                b.PreferredDateTime,
                b.Note,
                b.Status,
                b.CreatedAt,
                p.Title,
                u.Name AS TenantName,
                u.Email,
                u.Phone
            FROM booking b
            JOIN post p
                ON b.PostId = p.PostId
            JOIN User u
                ON b.UserId = u.UserId
            WHERE p.UserId = ?
            ORDER BY b.CreatedAt DESC"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }

    function updateBookingStatus($conn, $bookingId, $status) 
    {
        $stmt = mysqli_prepare($conn,
            "UPDATE booking
            SET Status = ?
            WHERE BookingId = ?"
        );

        mysqli_stmt_bind_param($stmt, "si", $status, $bookingId);

        mysqli_stmt_execute($stmt);
    }

    function getMySupportTickets($conn, $userId)
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

    function getMyReports($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                r.*,
                p.Title AS PostTitle
            FROM report r
            JOIN post p
                ON r.PostId = p.PostId
            WHERE r.ReportedBy = ?
            ORDER BY r.ReportedAt DESC"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
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
?>
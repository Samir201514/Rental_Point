<?php
    function createBooking($conn, $postId, $userId, $dateTime, $note)
    {
        $sql = "INSERT INTO booking (PostId, UserId, PreferredDateTime, Note) VALUES (?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iiss", $postId, $userId, $dateTime, $note);

        mysqli_stmt_execute($stmt);
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
?>
<?php

    function createReport($conn, $userId, $postId, $reportType, $description) 
    {
        $sql = "INSERT INTO report (ReportedBy, PostId, ReportType, Description) VALUES (?, ?, ?, ?);";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "iiss", $userId, $postId, $reportType, $description);

        mysqli_stmt_execute($stmt);
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
?>
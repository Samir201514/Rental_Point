<?php

    function getAllUsers($conn)
    {
        return mysqli_query($conn,
            "SELECT 
                u.UserId,
                u.Name,
                u.Email,
                u.Gender,
                ut.TypeName,
                u.RegisteredAt
            FROM User u
            JOIN usertype ut
                ON u.UserTypeId = ut.UserTypeId
            ORDER BY u.UserId ASC;");
    }

    function removeUser($conn, $userId)
    {
        $stmt = mysqli_prepare($conn, "DELETE FROM User WHERE UserId = ?;");

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);
    }

    function getAllPosts($conn)
    {
        return mysqli_query($conn,
            "SELECT
                p.PostId,
                p.Title,
                p.MonthlyRent,
                pt.TypeName AS PostType,
                u.Name AS PosterName,
                p.CreatedAt
            FROM post p
            JOIN posttype pt
                ON p.PostTypeId = pt.PostTypeId
            JOIN User u
                ON p.UserId = u.UserId
            ORDER BY p.CreatedAt DESC;"
        );
    }

    function removePost($conn, $postId)
    {
        $stmt = mysqli_prepare($conn, "DELETE FROM post WHERE PostId = ?;");

        mysqli_stmt_bind_param($stmt, "i", $postId);

        mysqli_stmt_execute($stmt);
    }

    function getAllReports($conn)
    {
        return mysqli_query($conn,
            "SELECT
                r.*,
                p.Title AS PostTitle,
                u.Name AS ReporterName
            FROM report r
            JOIN post p
                ON r.PostId = p.PostId
            JOIN `user` u
                ON r.ReportedBy = u.UserId
            ORDER BY
                FIELD(r.Status, 'Pending', 'Resolved'),
                r.ReportedAt DESC;");
    }

    function respondReport($conn, $id, $response, $status) 
    {
        $stmt = mysqli_prepare($conn, 
            "UPDATE report 
            SET Response = ?, Status = ?
            WHERE ReportId = ?;");

        mysqli_stmt_bind_param($stmt,"ssi", $response,$status, $id);

        mysqli_stmt_execute($stmt);
    }

    function getAllSupport($conn)
    {
        return mysqli_query($conn,
            "SELECT
                s.*,
                u.Name AS SenderName
            FROM support s
            JOIN User u
                ON s.UserId = u.UserId
            ORDER BY
                FIELD(
                    s.Status,
                    'Pending',
                    'Resolved'),
                s.SubmittedAt DESC;");
    }
    
    function respondSupport($conn, $id, $response, $status) 
    {
        $stmt = mysqli_prepare($conn,
            "UPDATE support
            SET Response = ?, Status = ?
            WHERE SupportId = ?;");

        mysqli_stmt_bind_param($stmt, "ssi", $response, $status, $id);

        mysqli_stmt_execute($stmt);
    }

    function getVerificationDocs($conn)
    {
        return mysqli_query($conn,
            "SELECT
                v.*,
                u.Name AS OwnerName
            FROM verificationdoc v
            JOIN User u
                ON v.UserId = u.UserId
            ORDER BY
                FIELD(
                    v.Status,
                    'Pending',
                    'Approved',
                    'Rejected'),
                v.SubmittedAt DESC;");
    }

    function respondVerification($conn, $id, $response, $status) 
    {
        $stmt = mysqli_prepare($conn,
            "UPDATE verificationdoc
            SET Response = ?, Status = ?
            WHERE VerifyId = ?;");

        mysqli_stmt_bind_param($stmt, "ssi", $response, $status, $id);

        mysqli_stmt_execute($stmt);
    }

    function getVerificationOwner($conn, $verifyId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT UserId
            FROM verificationdoc
            WHERE VerifyId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $verifyId);
        
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $owner = mysqli_fetch_assoc($result);

        return $owner;
    }

    function setUserVerified($conn, $userId, $isVerified) 
    {
        $stmt = mysqli_prepare($conn, "UPDATE User SET IsVerified = ? WHERE UserId = ?;");

        mysqli_stmt_bind_param($stmt, "ii", $isVerified, $userId);

        mysqli_stmt_execute($stmt);
    }
?>
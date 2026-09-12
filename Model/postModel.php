<?php

    function getAllPosts($conn)
    {
        return mysqli_query($conn, 
                "SELECT
                    p.PostId,
                    p.Title,
                    p.MonthlyRent,
                    p.Location,
                    p.ImagePath,
                    p.CreatedAt,
                    pt.TypeName AS PostType,
                    u.Name AS PosterName,
                    u.UserId AS PosterId
                FROM post p
                JOIN posttype pt
                    ON p.PostTypeId = pt.PostTypeId
                JOIN User u
                    ON p.UserId = u.UserId
                ORDER BY p.CreatedAt DESC;");
    }

    function getPostById($conn, $postId)
    {
        $sql = "SELECT
                    p.*,
                    pt.TypeName AS PostType,
                    u.Name AS PosterName,
                    u.Email,
                    u.Phone
                FROM Post p
                JOIN posttype pt
                    ON p.PostTypeId = pt.PostTypeId
                JOIN User u
                    ON p.UserId = u.UserId
                WHERE p.PostId = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "i", $postId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $post = mysqli_fetch_assoc($result);

        return $post;
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

    function createPost($conn, $userId, $postTypeId, $title, $description, $bedrooms, $bathrooms, $monthlyRent, $serviceCharge, $tenantPreference, $genderPref, $availableFrom, $location)
    {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO Post
            (UserId, PostTypeId, Title, Description, Bedrooms, Bathrooms, MonthlyRent, ServiceCharge, TenantPreference, GenderPref, AvailableFrom, Location)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");

        mysqli_stmt_bind_param( $stmt, "iissiiddssss", $userId, $postTypeId, $title, $description, $bedrooms, $bathrooms, $monthlyRent, $serviceCharge, $tenantPreference, $genderPref, $availableFrom, $location);

        mysqli_stmt_execute($stmt);

        $postId = mysqli_insert_id($conn);

        return $postId;
    }

    function getPostForEdit($conn, $postId, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT *
            FROM post
            WHERE PostId = ?
            AND UserId = ?"
        );

        mysqli_stmt_bind_param($stmt, "ii", $postId, $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $post = mysqli_fetch_assoc($result);

        return $post;
    }

    function updatePost($conn, $postId, $userId, $title, $description, $bedrooms, $bathrooms, $monthlyRent, $serviceCharge, $tenantPreference, $genderPref, $availableFrom, $location)
    {
        $stmt = mysqli_prepare($conn,
            "UPDATE post SET
            Title = ?, Description = ?, Bedrooms = ?, Bathrooms = ?, MonthlyRent = ?, ServiceCharge = ?, TenantPreference = ?, GenderPref = ?, AvailableFrom = ?, Location = ?
            WHERE PostId = ? AND UserId = ?"
        );

        mysqli_stmt_bind_param($stmt, "ssiiddsssii", $title, $description, $bedrooms, $bathrooms, $monthlyRent, $serviceCharge, $tenantPreference, $genderPref, $availableFrom, $location, $postId, $userId);

        mysqli_stmt_execute($stmt);
    }

    function addFacility($conn, $postId, $facility)
    {
        $stmt = mysqli_prepare($conn,
            "INSERT INTO postfacility
            (PostId, Facility)
            VALUES (?, ?)"
        );

        mysqli_stmt_bind_param($stmt,"is", $postId, $facility);

        mysqli_stmt_execute($stmt);
    }

    function getFacilities($conn, $postId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT Facility
            FROM postfacility
            WHERE PostId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $postId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }

    function deleteFacilities($conn, $postId)
    {
        $stmt = mysqli_prepare($conn,
            "DELETE FROM postfacility
            WHERE PostId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $postId);

        mysqli_stmt_execute($stmt);
    }

    function getMyPosts($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                PostId,
                Title,
                MonthlyRent,
                ViewsCount,
                ContactsCount,
                CreatedAt
            FROM post
            WHERE UserId = ?
            ORDER BY CreatedAt DESC"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }

    function deletePost($conn, $postId, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "DELETE FROM post
            WHERE PostId = ?
            AND UserId = ?"
        );

        mysqli_stmt_bind_param($stmt, "ii", $postId, $userId);

        mysqli_stmt_execute($stmt);
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

    function getSavedPosts($conn, $userId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT
                sp.SavedId,
                p.PostId,
                p.Title,
                p.MonthlyRent,
                p.ImagePath
            FROM savedpost sp
            JOIN post p
                ON sp.PostId = p.PostId
            WHERE sp.UserId = ?"
        );

        mysqli_stmt_bind_param($stmt, "i", $userId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return $result;
    }

    function toggleSavedPost($conn, $userId, $postId)
    {
        $stmt = mysqli_prepare($conn,
            "SELECT SavedId
            FROM savedpost
            WHERE UserId = ?
            AND PostId = ?"
        );

        mysqli_stmt_bind_param($stmt, "ii", $userId, $postId);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        $existing = mysqli_fetch_assoc($result);

        if ($existing)
        {
            $stmt = mysqli_prepare($conn,
                "DELETE FROM savedpost
                WHERE SavedId = ?;");

            mysqli_stmt_bind_param($stmt, "i", $existing["SavedId"]);
        } 
        else
        {
            $stmt = mysqli_prepare($conn,
                "INSERT INTO savedpost
                (UserId, PostId)
                VALUES (?, ?);");

            mysqli_stmt_bind_param($stmt, "ii", $userId, $postId);
        }

        mysqli_stmt_execute($stmt);
    }
?>
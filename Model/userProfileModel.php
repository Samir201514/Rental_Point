<?php

function getUserById($conn, $userId)
{
    $sql = "SELECT * FROM `User` WHERE UserId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get user error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function getUserPreference($conn, $userId)
{
    $sql = "SELECT * FROM `userpreference` WHERE UserId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get user preference error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function getUserPostStats($conn, $userId)
{
    $sql = "SELECT
                SUM(ViewsCount) AS TotalViews,
                SUM(ContactsCount) AS TotalContacts,
                (SELECT COUNT(*) FROM `savedpost` sp JOIN `post` p2 ON sp.PostId = p2.PostId WHERE p2.UserId = ?) AS TotalSaves
            FROM `post`
            WHERE UserId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get user post stats error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "ii", $userId, $userId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function getPerPostAnalytics($conn, $userId)
{
    $sql = "SELECT p.PostId, p.Title, p.ViewsCount, p.ContactsCount,
                (SELECT COUNT(*) FROM `savedpost` WHERE PostId = p.PostId) AS SavesCount
            FROM `post` p
            WHERE p.UserId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get per-post analytics error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getBookingsReceived($conn, $userId)
{
    $sql = "SELECT b.BookingId, b.PreferredDateTime, b.Note, b.Status, p.Title, u.Name AS RequesterName
            FROM `booking` b
            JOIN `post` p ON b.PostId = p.PostId
            JOIN `User` u ON b.UserId = u.UserId
            WHERE p.UserId = ?
            ORDER BY b.CreatedAt DESC";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get bookings received error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getMyReports($conn, $userId)
{
    $sql = "SELECT r.ReportId, r.ReportType, r.Description, r.Status, r.Response, r.ReportedAt, p.Title
            FROM `report` r
            JOIN `post` p ON r.PostId = p.PostId
            WHERE r.ReportedBy = ?
            ORDER BY r.ReportedAt DESC";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get my reports error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getMySupportTickets($conn, $userId)
{
    $sql = "SELECT SupportId, Subject, Description, Status, Response, SubmittedAt
            FROM `support`
            WHERE UserId = ?
            ORDER BY SubmittedAt DESC";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get my support tickets error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getMyPosts($conn, $userId)
{
    $sql = "SELECT p.PostId, p.Title, p.MonthlyRent, p.Location, p.ImagePath, p.CreatedAt,
                pt.TypeName AS PostType, u.Name AS PosterName, u.IsVerified, ut.TypeName AS UserRole
            FROM `post` p
            JOIN `posttype` pt ON p.PostTypeId = pt.PostTypeId
            JOIN `User` u ON p.UserId = u.UserId
            JOIN `usertype` ut ON u.UserTypeId = ut.UserTypeId
            WHERE p.UserId = ?
            ORDER BY p.CreatedAt DESC";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get my posts error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

function getSavedPostsForUser($conn, $userId)
{
    $sql = "SELECT p.PostId, p.Title, p.MonthlyRent, p.Location, p.ImagePath, p.CreatedAt,
                pt.TypeName AS PostType, u.Name AS PosterName, u.IsVerified, ut.TypeName AS UserRole
            FROM `savedpost` sp
            JOIN `post` p ON sp.PostId = p.PostId
            JOIN `posttype` pt ON p.PostTypeId = pt.PostTypeId
            JOIN `User` u ON p.UserId = u.UserId
            JOIN `usertype` ut ON u.UserTypeId = ut.UserTypeId
            WHERE sp.UserId = ?";
    $stmt = mysqli_prepare($conn, $sql);
    if (!$stmt) {
        die("Get saved posts error: " . mysqli_error($conn));
    }
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
    return mysqli_stmt_get_result($stmt);
}

?>
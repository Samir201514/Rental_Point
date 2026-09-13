<?php
function deleteAccount($conn, $userId)
{
    $stmt = mysqli_prepare($conn, "DELETE FROM User WHERE UserId = ?;");
    mysqli_stmt_bind_param($stmt, "i", $userId);
    mysqli_stmt_execute($stmt);
}
?>
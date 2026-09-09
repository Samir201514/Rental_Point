<?php
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "RentalPoint";

    $conn = mysqli_connect($serverName, $userName, $password, $dbName);

    if(!$conn){
        die("Error : " . mysqli_connect_error());
    }
    // else{
    //     echo "Connection Successful <br>";
    // }
?>
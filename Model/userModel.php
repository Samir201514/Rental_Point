<?php
    require_once("dbConnect.php");

    function authUser($conn, $userId, $pass)
    {
        // $sql = "SELECT * FROM";

        $data=mysqli_query($conn, $query);
        $users;
        if(mysqli_num_rows($data)>0)
        {
            while($rows=mysqli_fetch_assoc($data))
            {
                $users=$rows;
            }
        }

        return $users;
    }

    function addUser($conn, ){
        
    }
?>
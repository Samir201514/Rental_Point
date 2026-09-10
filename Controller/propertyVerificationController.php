<?php
    require "../Model/dbConnect.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $fileErrorMsg = "";

        if($_FILES["VerifyDocPath"]["error"] == 4)
        {
            $hasError=true;
            $fileErrorMsg= "Pro Pic should be provided";  
        }
        elseif($_FILES["VerifyDocPath"]["type"] != "application/pdf")
        {
            $fileErrorMsg = "Only pdf file are allowed";
            $hasError=true;
        }
        elseif($_FILES["VerifyDocPath"]["size"] > (10*1024*1024))
        {
            $fileErrorMsg = "file is too large. max size allowed is 10mb";
            $hasError=true;
        }
        else
        {
            $tampLocation = $_FILES["VerifyDocPath"]["tmp_name"];
            $dir = __DIR__."/../Storage/Owner/PropertyDocument/";

            if(!is_dir($dir))
            {
                mkdir($dir, 0775, true);
            }

            $destinaion = $dir."Doc_1.pdf";

            $success = move_uploaded_file($tampLocation, $destinaion);

            if($success)
            {
                echo "Done";
            }
            else
            {
                $file_error="file cannot be moved due to some error";
                $hasError=true;
            }
        }
    }
?>
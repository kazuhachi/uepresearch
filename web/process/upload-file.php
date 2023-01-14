<?php
    

    if (isset($_FILES["file"])){

        $target_dir = "../documents/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if (($imageFileType == "txt")
        ||  ($imageFileType == "doc")
        ||  ($imageFileType == "docx")){

            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo true;
            } else {
                echo false;
            }
            
        }
    }else{
        return false;
    }
        

    // Check if image file is a actual image or fake image
    // if(isset($_POST["submit"])) {
    //     $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    // if($check !== false) {
    //     echo "File is an image - " . $check["mime"] . ".";
    //     $uploadOk = 1;
    // } else {
    //     echo "File is not an image.";
    //     $uploadOk = 0;
    // }
    // }

    // if ($uploadOk == 0) {
    // echo "Sorry, your file was not uploaded.";
    // // if everything is ok, try to upload file
    // } else {
    // if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    //     echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    // } else {
    //     echo "Sorry, there was an error uploading your file.";
    // }
    // }
    
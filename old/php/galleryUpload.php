<?php

    session_start();
    
    function dieError($message)
    {
        die(json_encode(array(
            "status" => "error",
            "errorMessage" => $message
        )));
    }
    
    
    if(!isset($_SESSION["userId"]))
    {
        dieError("Could not authenticate");
    }

    if(!isset($_FILES['userfiles']))
    {
        dieError("No files sent, or the total size of all files exceeded 32MB");
    }
    
    if(!isset($_POST["id"]))
    {
        dieError("No gallery specified");
    }
    
    $dirtyId = $_POST["id"];
    
    require("dbconfig.php");

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        ob_end_clean();
        dieError("Could not connect to the database");
    }
    
    $stmt = $conn->prepare("SELECT id FROM Galleries WHERE id = ?");
    $stmt->bind_param("s", $dirtyId);
    $stmt->execute();
    $stmt->bind_result($cleanId);
    $stmt->store_result();
    
    if($stmt->num_rows == 0)
    {
        dieError("Could not find the required gallery");
    }
    else
    {
        $stmt->fetch();
    }    

    // Count # of uploaded files in array
    $total = count($_FILES['userfiles']['name']);

    if($total == 0)
    {
        dieError("No files sent");
    }

    $dir = "../gallery_images/" . $cleanId . "/";

    if( is_dir($dir) === false )
    {
        mkdir($dir);
    }

    $successImages = array();
    $errorImages = array();
    
    require("myresize.php");
    
    // Loop through each file
    for($i=0; $i<$total; $i++) {
      //Get the temp file path
      $tmpFilePath = $_FILES['userfiles']['tmp_name'][$i];

      //Make sure we have a filepath
      if ($tmpFilePath != ""){
        //Setup our new file path
        $filePath = $_FILES['userfiles']['name'][$i];
        $ext = strtolower (pathinfo($filePath, PATHINFO_EXTENSION));        

        $fileName = pathinfo($_FILES['userfiles']['name'][$i], PATHINFO_FILENAME);
        $fileName = preg_replace('/\s+/', '', $fileName);
        // Handle error case where directory doesn't exist and this would print an error!
        
        if(!preg_match('/jpg|jpeg|png|gif|bmp/i',$ext))
        {
            array_push($errorImages, array( "file" => $_FILES['userfiles']['name'][$i], "error" => "Unsupported image file"));
            continue;
        }
        
        $stmt = $conn->prepare("INSERT INTO GalleryImages (gallery_id, imagename, extension, userid) VALUES (?,?,?,?)");
        $stmt->bind_param("ssss", $cleanId, $fileName, $ext, $_SESSION["userId"]);
        $success = $stmt->execute();
        
        if(!$success)
        {
            array_push($errorImages, array( "file" => $fileName, "error" => "Could not add image to database"));
            continue;
        }
        
        $imageId = $conn->insert_id;
        
        $fullName = $imageId . "_" . $fileName . "_full." . $ext;
        $fullPath = $dir . $fullName;
        
        //Upload the file into the temp dir
        if(move_uploaded_file($tmpFilePath, $fullPath)) {
            resizeImage($fullPath, $dir . $imageId . "_" . $fileName . "_lrg.jpg", 90, 500, 1900);
            resizeImage($fullPath, $dir . $imageId . "_" . $fileName . "_thb.jpg", 75, 200, 355);
            
            array_push($successImages, $fileName);            
        }
        else
        {
            array_push($errorImages, array( "file" => $fileName, "error" => "Could not upload image"));
        }
      }
    }
    
    echo json_encode(array(
            "status" => count($errorImages) == 0 ? "success" : "warning",
            "successes" => $successImages,
            "errors" => $errorImages
        ));
?>
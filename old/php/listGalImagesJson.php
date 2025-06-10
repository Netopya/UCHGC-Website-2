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
        dieError("Illegal operation");
    }
    
    if(!isset($_POST['id']))
    {
        dieError("No gallery specified");
    }

    $galId = $_POST['id'];
    
    require("dbconfig.php");

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Check connection
    if ($conn->connect_error) {
        dieError("Could not connect to database");
    }
    
    $stmt = $conn->prepare("SELECT id, thumbnail_img FROM Galleries WHERE id = ?");
    $stmt->bind_param("s", $galId);
    $stmt->execute();
    $stmt->bind_result($cleanId, $thumbnailId);
    $stmt->store_result();
    $stmt->fetch();
    
    if($stmt->num_rows == 0)
    {
        dieError("Could not find the required gallery");
    }
    
    $stmt = $conn->prepare("SELECT id, imagename, extension FROM GalleryImages WHERE gallery_id = ?");
    $stmt->bind_param("s", $cleanId);
    $stmt->execute();
    $stmt->bind_result($id, $imagename, $extension);
    
    $images = array();
    $dir = "gallery_images/" . $cleanId . "/";
    
    
    while ($stmt->fetch()) {
        array_push($images, array(
            "id" => $id,
            "full" => $dir . $id . "_" . $imagename . "_full." . $extension,
            "lrg" => $dir . $id . "_" . $imagename . "_lrg.jpg",
            "thb" => $dir . $id . "_" . $imagename . "_thb.jpg"
        ));
    }
    
    echo json_encode(array("status" => "success", "thumbnail" => $thumbnailId, "images" => $images));

    
    
?>
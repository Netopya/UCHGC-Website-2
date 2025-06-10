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
    
    if(!isset($_POST['id']) || !isset($_POST['imgid']))
    {
        dieError("No gallery or image specified");
    }

    $galId = $_POST['id'];
    $imgId = $_POST['imgid'];
    
    require("dbconfig.php");
    
    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        dieError("Could not connect to database");
    }
    
    $stmt = $conn->prepare("UPDATE Galleries SET thumbnail_img=? WHERE id=?");
    $stmt->bind_param("ss", $imgId, $galId);
    $success = $stmt->execute();
    
    if($success)
    {
        echo json_encode(array(
            "status" => "success"
        ));
    }
    else
    {
        dieError("Could not update thumbnail");
    }
?>
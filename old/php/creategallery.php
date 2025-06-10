<?php
    session_start();
    
    if(!isset($_SESSION["userId"]))
    {
        die("Illegal operation");
    }
    
    require("dbconfig.php");

    $enname = isset($_POST['enname']) ? $_POST['enname'] : "";
    $frname = isset($_POST['frname']) ? $_POST['frname'] : "";
    $ukname = isset($_POST['ukname']) ? $_POST['ukname'] : "";
    $id = isset($_POST['id']) ? $_POST['id'] : "";

    $errorMessage = "";
    $lastId;
    
    if(empty($enname) && empty($frname) && empty($ukname))
    {
        $errorMessage .= " At least one title should be provided. ";
    }

    // Create connection
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        $errorMessage .= " Could not connect to the database. ";
    }
        
    if(empty($errorMessage))
    {
        if(empty($id))
        {
            $stmt = $conn->prepare("INSERT INTO Galleries (name_en, name_fr, name_uk, userid) VALUES (?,?,?,?)");
            $stmt->bind_param("ssss", $enname, $frname, $ukname, $_SESSION["userId"]);
        }
        else
        {
            $stmt = $conn->prepare("UPDATE Galleries SET name_en=?, name_fr=?, name_uk=? WHERE id=?");
            $stmt->bind_param("ssss", $enname, $frname, $ukname, $id);
        }
        $success = $stmt->execute();
        
        if($success)
        {
            $lastId = $stmt->insert_id;
        }
        else
        {
            $errorMessage .= empty($id) ? " Could not add the gallery. " : " Could not update the gallery ";
        }
    }
    
    if(empty($errorMessage))
    {
        echo json_encode(array(
            "status" => "success",
            "id" => $lastId
        ));
    }
    else
    {
        echo json_encode(array(
            "status" => "error",
            "errorMessage" => $errorMessage
        ));
    }
?>
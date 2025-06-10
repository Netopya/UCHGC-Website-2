<?php
    
    function getUserInfo($id)
    {
        require("php/dbconfig.php");
    
        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Check for an existing print key pair
        $stmt = $conn->prepare("SELECT username, firstname, lastname FROM Users WHERE id=?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($username, $firstname, $lastname);
        $stmt->fetch();
        
        return array("username" => $username, "firstname" => $firstname, "lastname" => $lastname);
    }

?>
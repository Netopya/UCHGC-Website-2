<?php
    function galleryExists($id)
    {
        require("dbconfig.php");

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        
        $stmt = $conn->prepare("SELECT id FROM Galleries WHERE id = ?");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $stmt->bind_result($cleanId);
        $stmt->store_result();
        
        if($stmt->num_rows == 0)
        {
            return false;
        }
        
        return $cleanId;
    }

    function listImages($galId)
    {
        require("dbconfig.php");

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            return false;
        }
        
        $stmt = $conn->prepare("SELECT id, imagename, extension FROM GalleryImages WHERE gallery_id = ?");
        $stmt->bind_param("s", $galId);
        $stmt->execute();
        $stmt->bind_result($id, $imagename, $extension);
        
        $images = array();
        $dir = "gallery_images/" . $galId . "/";
        
        
        while ($stmt->fetch()) {
            array_push($images, array(
                "id" => $id,
                "full" => $dir . $id . "_" . $imagename . "_full." . $extension,
                "lrg" => $dir . $id . "_" . $imagename . "_lrg.jpg",
                "thb" => $dir . $id . "_" . $imagename . "_thb.jpg"
            ));
        }
        
        return $images;
    }

?>
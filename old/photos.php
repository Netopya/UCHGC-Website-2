<?php

include("opening_php.php");

    $pagebutton_id = 3;

    $photo_id = 0;
    if (isset($_GET['id']))
    {
        $photo_id = $_GET['id'];
    }

?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $photo_title[$refined_laguage]; ?></title>
        <?php include("php/head.php"); ?>
    </head>

    <body>
        <?php include("php/navbar1.php"); ?>
                
        <div id="container_main">
            <div id="smalltopnavback"></div>
            <div id="webcontent_background">
                <div class="container marketing">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div class="page-header">
                                <h1><?php echo $photo_button[$refined_laguage];  ?></h1>
                            </div>
                        </div>
                    </div>
					

                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <h1><?php echo $n_video[$refined_laguage]; ?></h1>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="853" height="480" src="https://www.youtube.com/embed/3smm-u9IbuI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <h1><?php echo $p_video[$refined_laguage]; ?></h1>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="853" height="480" src="https://www.youtube.com/embed/-0aqxAcOk74" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <h1><?php echo $visit_vid_title[$refined_laguage] ;?></h1>
                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe width="853" height="480" src="//www.youtube.com/embed/6Kf5QfrJkH4" frameborder="0" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <h1><?php echo $photos_button[$refined_laguage];  ?></h1>
                            <?php
                                    require("php/dbconfig.php");
        
                                    // Create connection
                                    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
                                    
                                    // Check connection
                                    if ($conn->connect_error) {
                                        echo("Database connection failed: " . $conn->connect_error);
                                    }
                                    
                                    $stmt = $conn->prepare("SELECT Galleries.id, name_en, name_fr, name_uk, imagename, GalleryImages.id FROM Galleries LEFT JOIN GalleryImages ON Galleries.thumbnail_img=GalleryImages.id ORDER BY Galleries.id DESC");
                                    $stmt->execute();
                                    $stmt->bind_result($id, $name_en, $name_fr, $name_uk, $imagename, $imageid);
                                    
                                    $i = 0;
                                    
                                    echo '<div class="row">';
                                    
                                    while ($stmt->fetch()) {
                                        if($i != 0 && $i % 3 == 0)
                                        {
                                            echo '</div><div class="row">';
                                        }
                                        
                                        $titles = array($name_en, $name_fr, $name_uk);
                                        
                                        ?>
                                            <div class="col-sm-4 col-xs-12">
                                                <a href="<?php echo "galleryView.php?id=" . $id; ?>" class="thumbnail">
                                                    <img src="<?php echo "gallery_images/" . $id . "/" . $imageid . "_" . $imagename . "_thb.jpg";?>">
                                                    <div class="caption">
                                                        <h3><?php echo $titles[$refined_laguage]; ?></h3>
                                                    </div>
                                                </a>
                                            </div>
                                        
                                        <?php
                                        $i++;
                                    }
                                    
                                    echo '</div>'
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer">
            
            </div>
        </div>
    </body>
</html>

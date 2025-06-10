<?php

    include("opening_php.php");

    $pagebutton_id = 3;

    
    
?><!DOCTYPE html>
<html>
    <head>
        <title>Gallery View</title>  <!-- Change to localized title -->
        <?php include("php/head.php"); ?>
        <script>
            $(function() {
                $('.carousel').carousel().on('slide.bs.carousel', function (e)
                {
                    var nextH = $(e.relatedTarget).height();
                    $(this).find('.active.item').parent().animate({ height: nextH }, 500);
                });
            });
        </script>
        <style>
            .carousel-indicators {
                position:relative;
                bottom:0px;
            }

            .carousel-indicators li {
                border:1px solid #fff;
                
            }

            .carousel-indicators .active {
                background-color: #fff;
            }

        </style>
    </head>
    <body>
        <?php include("php/navbar1.php"); ?>
        
        <div id="container_main">
            <div id="smalltopnavback"></div>
            <div id="webcontent_background">
                <div class="container marketing">
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <?php
                            if(!isset($_GET["id"]))
                            {
                                ?><p>Could not find gallery</p><?php
                            }
                            else
                            {
                                $galId = $_GET["id"];
                                
                                require("php/dbconfig.php");

                                // Create connection
                                $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

                                // Check connection
                                if ($conn->connect_error) {
                                    dieError("Could not connect to database");
                                }
                                
                                $stmt = $conn->prepare("SELECT id, name_en, name_fr, name_uk FROM Galleries WHERE id = ?");
                                $stmt->bind_param("s", $galId);
                                $stmt->execute();
                                $stmt->bind_result($cleanid, $name_en, $name_fr, $name_uk);
                                $stmt->store_result();
                                $stmt->fetch();
                                
                                if($stmt->num_rows == 0)
                                {
                                    ?><p>Could not find gallery</p><?php
                                }
                                else
                                {
                                    
                                    $titles = array($name_en, $name_fr, $name_uk);
                                    ?>
                                    <br>
                                    <a class="btn btn-default" href="photos.php" role="button"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to gallery list</a>
                                    <div class="page-header">
                                        <h1><?php echo $titles[$refined_laguage]; ?></h1>
                                    </div>
                                   
                                    <?php
                                    
                                    $stmt = $conn->prepare("SELECT id, imagename, extension FROM GalleryImages WHERE gallery_id = ? ORDER BY id");
                                    $stmt->bind_param("s", $cleanid);
                                    $stmt->execute();
                                    $stmt->bind_result($imageid, $imagename, $extension);
                                    $stmt->store_result();
                                    $numImages = $stmt->num_rows;
                                    
                                    
                                    
                                    ?>
                                    <div id="carousel-example-generic" class="carousel slide galleryCarousel" data-ride="carousel">


                                      <!-- Wrapper for slides -->
                                      <div class="carousel-inner" role="listbox">
                                        <?php
                                        $count = 0;
                                        $dir = "gallery_images/" . $cleanid . "/";
                                        while ($stmt->fetch())
                                        {
                                            ?>
                                            
                                            <div class="item <?php echo $count==0 ? "active" : ""?>">
                                              <a href="<?php echo $dir . $imageid . "_" . $imagename . "_full." . $extension; ?>">
                                                <img class="img-responsive" src="<?php echo $dir . $imageid . "_" . $imagename . "_lrg.jpg"; ?>" alt="...">
                                              </a>
                                            </div>
                                            
                                            <?php
                                            $count++;
                                        }
                                        ?>
                                      </div>
                                        
                                      <!-- Indicators -->
                                      <ol class="carousel-indicators">
                                        <?php
                                        for($i = 0; $i < $numImages; $i++)
                                        {
                                            if($i == 0)
                                            {
                                                ?> <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li> <?php
                                            }
                                            else
                                            {
                                                ?> <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>"></li> <?php
                                            }
                                        }
                                        ?>
                                      </ol>
                                      
                                      <!-- Controls -->
                                      <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </div>
                                    <?php
                                }
                            }
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

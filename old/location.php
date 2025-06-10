<?php

include("opening_php.php");

    $pagebutton_id = 5;

?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $location_title[$refined_laguage]; ?></title>
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
                                <h1><?php echo $location_button[$refined_laguage]; ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-lg-offset-1 col-md-6">
                            <address>
                                <strong>Ukrainian Catholic Holy Ghost Church</strong><br>
                                1795 Rue Grand Trunk<br>
                                Montréal, QC, H3K 1M1
                            </address>
                        </div>
                        <div class="col-lg-5 col-md-6">
                            <address>
                                <strong><?php echo $map_mailing_title[$refined_laguage]; ?></strong><br>
                                1770 Rue Centre<br>
                                Montréal, QC, H3K 1H7
                            </address>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-10 col-lg-offset-1">
                            <div id="map_container">
                            <iframe width="100%" height="500" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src=<?php echo $map_source; ?>></iframe>
                            <br />
                            <small><a href=<?php echo $map_alink; ?> ><?php echo $map_alinktext[$refined_laguage]; ?></a></small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="footer">
            
            </div>
        </div>
    </body>
</html>

<?php

include("opening_php.php");

    $pagebutton_id = 7;

?><!DOCTYPE html>

<html>
    <head>
        <title><?php echo $links_title[$refined_laguage]; ?></title>
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
                                <h1><?php echo $link_button[$refined_laguage];  ?></h1>
                            </div>
                            <p>
                                <?php echo $link1[$refined_laguage]; ?><br/> <a href="http://www.ugcc.ua">http://www.ugcc.ua</a></br></br>
                                <?php echo $link2[$refined_laguage]; ?><br/> <a href="http://www.ucet.ca/">http://www.ucet.ca/</a></br></br>
                                <?php echo $link3[$refined_laguage]; ?><br/> <a href="http://www.ukrainiantime.com">http://www.ukrainiantime.com</a><br /><br />
                                <?php echo $link4[$refined_laguage]; ?><br/> <a href="https://www.facebook.com/UkrainianCatholicHolyGhostChurch">https://www.facebook.com/UkrainianCatholicHolyGhostChurch</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="footer">
            
            </div>
        </div>
    </body>
</html>

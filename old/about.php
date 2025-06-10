<?php

    include("opening_php.php");

    $pagebutton_id = 2;

?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $about_title[$refined_laguage]; ?></title>
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
                                <h1><?php echo $about_text_title[$refined_laguage];  ?></h1>
                            </div>
                            <p><?php echo $about_text[$refined_laguage]; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="footer">
            
            </div>
        </div>
    </body>
</html>

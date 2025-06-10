<?php

include("opening_php.php");

    $pagebutton_id = 6;

?><!DOCTYPE html>

<html>
    <head>
        <title><?php echo $contact_title[$refined_laguage]; ?></title>
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
                                <h1><?php echo $contact_button[$refined_laguage];  ?></h1>
                            </div>
                            <div class="contact_person">
                                <img class="img-thumbnail" src="contact/thb_V_Vitt.jpg"/>
                                <address>
                                    <h3><?php echo $priestname[$refined_laguage]; ?></h3>
                                    <?php echo $priestresidence[$refined_laguage]; ?>: 7345 Churchill Verdun Qc <br>
                                    <?php echo $telephone[$refined_laguage]; ?>: 514-769-3804<br>
                                    <?php echo $email[$refined_laguage]; ?>: <a href="mailto:v.vitt@hotmail.com">v.vitt@hotmail.com</a><br>
                                    <?php echo $administration[$refined_laguage]; ?>: 514-935-9732<br>
                                </address>
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

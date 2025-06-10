<?php

    include("opening_php.php");

    $pagebutton_id = 0;

    // remove all session variables
    session_unset(); 

    // destroy the session 
    session_destroy();
?><!DOCTYPE html>
<html>
    <head>
        <title>Logout</title>
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
                                <h1>Logout</h1>
                            </div>
                            <p>You have been logged out</p><br>
                            <a class="btn btn-default" href="index.php" role="button">Return to home</a><br><br>
                            <a class="btn btn-default" href="login.php" role="button">Log back in</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="footer">
            
            </div>
        </div>
    </body>
</html>

<?php

    include("opening_php.php");

    $pagebutton_id = 0;

?><!DOCTYPE html>
<html>
    <head>
        <title>Gallery Editor</title>
        <?php include("php/head.php"); ?>
        <script>
            function submitNewGallery()
            {
                $.ajax({
                    type: "POST",
                    url: "php/creategallery.php",
                    data: {
                        "enname" : $("#en_name").val(),
                        "frname" : $("#fr_name").val(),
                        "ukname" : $("#uk_name").val()
                    }
                }).done(function(data){
                    var reponse = JSON.parse(data);
                    if(reponse["status"] === "success")
                    {
                        window.location.href = "galleryEditor.php?id=" + reponse["id"];
                    }
                    else
                    {
                        $("#alertErrorMessage").parent().show();
                        $("#alertErrorMessage").html(reponse["errorMessage"]);
                    }
                }).fail(function(){
                    $("#alertErrorMessage").parent().show();
                    $("#alertErrorMessage").html("Could not connect to server");
                });
            }
        
        </script>
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
                                <h1>Gallery Editor</h1>
                            </div>
                            <?php
                                if(!isset($_SESSION["userId"]))
                                {
                                    ?> <div class="alert alert-danger" role="alert"><strong>An error has occurred</strong> You must be logged in for this operation</div> <?php
                                }
                                else
                                {
                                    require("php/dbconfig.php");
        
                                    // Create connection
                                    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
                                    
                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    
                                    $stmt = $conn->prepare("SELECT id, name_en, name_fr, name_uk FROM Galleries");
                                    $stmt->execute();
                                    $stmt->bind_result($id, $name_en, $name_fr, $name_uk);
                                    
                                    ?>
                                        <table class="table">
                                            <caption>Galleries</caption>
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>English Title</th>
                                                    <th>French Title</th>
                                                    <th>Ukrainian Title</th>
                                                    <th>Edit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($stmt->fetch()) { ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $id; ?></th>
                                                        <td><?php echo $name_en; ?></td>
                                                        <td><?php echo $name_fr; ?></td>
                                                        <td><?php echo $name_uk; ?></td>
                                                        <td><a class="btn btn-default" href="galleryEditor.php?id=<?php echo $id; ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a></td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        
                                        <a class="btn btn-success" href="#" role="button" data-toggle="modal" data-target="#createmodal">Create new gallery <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></a>
                                        
                                        <div id="createmodal" class="modal fade" tabindex="-1" role="dialog">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Create a new gallery <small>Provide a title in at least one language</small></h4>
                                              </div>
                                              <div class="modal-body">
                                                <div class="alert alert-danger" style="display:none;" role="alert">
                                                    <strong>An error has occurred: </strong><span id="alertErrorMessage"></span>
                                                </div>
                                                <form class="form-horizontal">
                                                  <div class="form-group">
                                                    <label for="en_name" class="col-sm-3 control-label">English Title</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="en_name" placeholder="Title">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="fr_name" class="col-sm-3 control-label">French Title</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="fr_name" placeholder="Title">
                                                    </div>
                                                  </div>
                                                  <div class="form-group">
                                                    <label for="uk_name" class="col-sm-3 control-label">Ukrainian Title</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control" id="uk_name" placeholder="Title">
                                                    </div>
                                                  </div>
                                                </form>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" onclick="submitNewGallery()">Create</button>
                                              </div>
                                            </div><!-- /.modal-content -->
                                          </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    <?php
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

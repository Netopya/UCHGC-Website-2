<?php
    
    include("opening_php.php");

    $id = $_GET["id"];
    
    
    $pagebutton_id = 0;

?><!DOCTYPE html>
<html>
    <head>
        <title>Gallery Editor</title>
        <?php include("php/head.php"); ?>
        <script>
        
            function editGallery()
            {
                $.ajax({
                    type: "POST",
                    url: "php/creategallery.php",
                    data: {
                        "enname" : $("#en_name").val(),
                        "frname" : $("#fr_name").val(),
                        "ukname" : $("#uk_name").val(),
                        "id" : <?php echo $id; ?>
                    },
                    beforeSend: function() {
                        $("#titleSuccessAlert").hide();
                        $("#titleErrorMessage").parent().hide();
                        $(".disable-on-load").prop('disabled', true);
                        $("#titleLoadingImg").show();
                    }
                }).done(function(data){
                    var reponse = JSON.parse(data);
                    if(reponse["status"] === "success")
                    {
                        $("#titleSuccessAlert").show();
                    }
                    else
                    {
                        $("#titleErrorMessage").parent().show();
                        $("#titleErrorMessage").html(reponse["errorMessage"]);
                    }
                }).fail(function(){
                    $("#titleErrorMessage").parent().show();
                    $("#titleErrorMessage").html("Could not connect to server");
                }).always(function() {
                    $(".disable-on-load").prop('disabled', false);
                    $("#titleLoadingImg").hide();
                });
            }
            
            function listPendingImages()
            {
                var fileList = $("#fileinput")[0].files;
                
                $("#uploadImageList").empty();
                
                if(fileList.length === 0)
                    $("#uploadImageListTitle").hide();
                else
                    $("#uploadImageListTitle").show();
                
                for(var i = 0; i < fileList.length; i++)
                {
                    $("#uploadImageList").append("<li>" + fileList[i].name + "</li>");
                }
            }
            
            function uploadImages()
            {
                var data = new FormData();
                jQuery.each(jQuery('#fileinput')[0].files, function(i, file) {
                    data.append('userfiles[]', file);
                });
                
                data.append('id', <?php echo $id; ?>);
                
                $.ajax({
                    type: "POST",
                    url: "php/galleryUpload.php",
                    data: data,
                    //cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        var alert = $("#photoAlert");
                        alert.hide();
                        alert.removeClass();
                        alert.addClass("alert");
                        $("#successImages").empty();
                        $("#errorImages").empty();
                        $("#photoAlertSuccessMessageContainer").hide();
                        $("#photoAlertErrorMessageContainer").hide();
                    }
                }).done(function(data){
                    var reponse = JSON.parse(data);
                    
                    $("#photoAlert").show();
                    
                    if(reponse["status"] === "error")
                    {
                        $("#photoAlert").addClass("alert-danger");
                        $("#errorImages").append("<li>" + reponse["errorMessage"] + "</li>");
                        $("#photoAlertErrorMessageContainer").show();
                    }
                    else
                    {                        
                        if(reponse["status"] === "success")
                        {
                            $("#photoAlert").addClass("alert-success");
                            $("#photoAlertSuccessMessageContainer").show();
                            
                            for(var i = 0; i < reponse["successes"].length; i++)
                            {
                                $("#successImages").append("<li>" + reponse["successes"][i] + "</li>");
                            }
                        }
                        else if (reponse["successes"].length === 0)
                        {
                            $("#photoAlert").addClass("alert-danger");
                            $("#photoAlertErrorMessageContainer").show();
                            
                            for(var i = 0; i < reponse["errors"].length; i++)
                            {
                                $("#errorImages").append("<li>" + reponse["errors"][i]["error"] + ": " + reponse["errors"][i]["file"] + "</li>");
                            }
                        }
                        else
                        {
                            $("#photoAlert").addClass("alert-warning");
                            $("#photoAlertSuccessMessageContainer").show();
                            $("#photoAlertErrorMessageContainer").show();
                            
                            for(var i = 0; i < reponse["successes"].length; i++)
                            {
                                $("#successImages").append("<li>" + reponse["successes"][i] + "</li>");
                            }
                            
                            for(var i = 0; i < reponse["errors"].length; i++)
                            {
                                $("#errorImages").append("<li>" + reponse["errors"][i]["error"] + ": " + reponse["errors"][i]["file"] + "</li>");
                            }
                        }
                    }
                    
                    $("#imageUploadForm")[0].reset();
                    listPendingImages();
                    
                    listGalleryImages();
                });
                
            }
            
            function listGalleryImages()
            {
                $.ajax({
                    type: "POST",
                    url: "php/listGalImagesJson.php",
                    data: {
                        "id" : <?php echo $id; ?>
                    }
                }).done(function(data){
                    var response = JSON.parse(data);
                    
                    if(response["status"] === "success")
                    {
                        $("#imageListDisplay").empty();
                        
                        if(response["images"].length === 0)
                            $("#noImagesMessage").show();
                        else
                            $("#noImagesMessage").hide();
                        
                        var thumbnail_img = response["thumbnail"];
                        var thumbnail_button;

                        for(var i = 0; i < response["images"].length; i++)
                        {
                            if(i % 3 == 0)
                                $("#imageListDisplay").append("<div class=\"row\"></div>");
                                
                            $("#imageListDisplay > div:nth-child(" + (Math.floor(i / 3) + 1) + ")").append("<div class=\"col-xs-12 col-sm-4\"><div class=\"thumbnail\"><img class=\"img-responsive\" src=\"" + response["images"][i]["thb"] + "\"/><div class=\"caption\"><button type=\"button\" class=\"btn btn-danger\" aria-label=\"Delete\" title=\"Delete image\" data-placement=\"bottom\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span></button><button onclick=\"toggleThumbnail(" + response["images"][i]["id"] + ", this, true)\" type=\"button\" class=\"btn btn-default thumbnail-button\" aria-label=\"Make Preview\" title=\"Set preview image\" data-placement=\"bottom\"><span class=\"glyphicon glyphicon-eye-close\" aria-hidden=\"true\"></span></button></div></div></div>");
                            
                            if(thumbnail_img === response["images"][i]["id"])
                            {
                                thumbnail_button = $("#imageListDisplay > div:nth-child(" + (Math.floor(i / 3) + 1) + ") > div:last-child .thumbnail-button");
                            }
                        }

                        $("#imageListDisplay .btn").tooltip();
                        
                        if(thumbnail_button !== undefined)
                        {
                            toggleThumbnail(thumbnail_img, thumbnail_button, false);
                        }
                    }
                });
            }
            
            function toggleThumbnail(id, button, submit) {

                var oldButton = $(".thumbnail-button.btn-primary");
                oldButton.removeClass("btn-primary").addClass("btn-default");
                oldButton.prop("title", "Set preview image").tooltip('fixTitle');
                oldButton.children(".glyphicon").removeClass("glyphicon-eye-open").addClass("glyphicon-eye-close");
                $(button).removeClass("btn-default").addClass("btn-primary");
                $(button).prop("title","Selected thumbnail image").tooltip('fixTitle')
                $(button).children(".glyphicon").removeClass("glyphicon-eye-close").addClass("glyphicon-eye-open");
                
                if(submit)
                {
                    $.ajax({
                        type: "POST",
                        url: "php/setPreview.php",
                        data: {
                            "id" : <?php echo $id; ?>,
                            "imgid" : id
                        }
                    });
                    
                    $(button).tooltip('show');
                }
            }
            
            $(function() {
                listGalleryImages();
            });
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
                                <h1>Gallery Editor for ID: <?php echo $id; ?></h1>
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
                                    
                                    $stmt = $conn->prepare("SELECT name_en, name_fr, name_uk FROM Galleries WHERE id = ?");
                                    $stmt->bind_param("s", $id);
                                    $stmt->execute();
                                    $stmt->bind_result($name_en, $name_fr, $name_uk);
                                    $stmt->store_result();
                                    
                                    if($stmt->num_rows == 0)
                                    {
                                        ?>
                                            <div class="alert alert-danger" role="alert"><strong>An error has occurred</strong> Could not find a gallery with that id.</div>
                                        <?php
                                    }
                                    else
                                    {
                                        $stmt->fetch();
                                        ?>
                                            <a class="btn btn-default" href="galleryEd.php" role="button"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> Back to gallery list</a>
                                            <br><br>
                                            <h2>Gallery Titles</h2>
                                            <div class="alert alert-danger" role="alert" style="display:none;"><strong>An error has occurred: </strong><span id="titleErrorMessage"></span></div>
                                            <div id="titleSuccessAlert" class="alert alert-success" role="alert" style="display:none;"><button type="button" class="close" aria-label="Close" onclick="$(this).parent().hide()"><span aria-hidden="true">&times;</span></button><strong>Update successful</strong></div>
                                            <form class="form-horizontal" onsubmit="editGallery(); return false;">
                                              <div class="form-group">
                                                <label for="en_name" class="col-sm-3 control-label">English Title</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control disable-on-load" id="en_name" placeholder="Title" value="<?php echo $name_en; ?>">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="fr_name" class="col-sm-3 control-label">French Title</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control disable-on-load" id="fr_name" placeholder="Title" value="<?php echo $name_fr; ?>">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <label for="uk_name" class="col-sm-3 control-label">Ukrainian Title</label>
                                                <div class="col-sm-9">
                                                  <input type="text" class="form-control disable-on-load" id="uk_name" placeholder="Title" value="<?php echo $name_uk; ?>">
                                                </div>
                                              </div>
                                              <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                  <button type="submit" class="btn btn-primary disable-on-load">Update</button>
                                                  <img id="titleLoadingImg" src="images/loading.gif" style="display:none;"/>
                                                </div>
                                              </div>
                                            </form>
                                            <h2>Gallery Images</h2>
                                            <div id="photoAlert" class="alert" role="alert" style="display:none;">
                                                <button type="button" class="close" aria-label="Close" onclick="$(this).parent().hide()"><span aria-hidden="true">&times;</span></button>
                                                <div id="photoAlertSuccessMessageContainer">
                                                    <strong>The following images were successfully uploaded:</strong>
                                                    <ul id="successImages"></ul>
                                                </div>
                                                <div id="photoAlertErrorMessageContainer">
                                                    <strong>The following errors have occurred: </strong>
                                                    <ul id="errorImages"></ul>
                                                </div>
                                            </div>
                                            <form id="imageUploadForm" class="form-horizontal" enctype="multipart/form-data" onsubmit="uploadImages(); return false;">
                                                <div class="form-group">
                                                    <label for="fileinput" class="col-sm-3 control-label">Add Images:</label>
                                                    <div class="col-sm-9">
                                                        <label class="btn btn-default btn-file">
                                                            <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp Select Images <input type="file" name="userfiles" id="fileinput" style="display: none;" multiple onchange="listPendingImages();">
                                                        </label>
                                                        <div id="uploadImageListTitle" style="display:none;"><br>Selected Images:
                                                        </div>
                                                        <ul id="uploadImageList">
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-9">
                                                        <input type="submit" class="btn btn-primary" value="Upload images" />
                                                    </div>
                                                </div>
                                            </form>
                                            <h3>Images</h2>
                                            <div>
                                                <div id="noImagesMessage">No images</div>
                                                <div id="imageListDisplay">
                                                </div>
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

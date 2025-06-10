<?php

    include("opening_php.php");

    $pagebutton_id = 0;

    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    
    $loginAttempt = isset($_POST['username']) || isset($_POST['password']);
    
    $hasError = false;
    $errorMessage = "";
    
    if($loginAttempt && (!isset($_POST['username']) || !isset($_POST['password'])))
    {
        $hasError = true;
        $errorMessage .= " Invalid Username or Password ";
    }
    
    if($loginAttempt && !$hasError)
    {
        require("php/lib/password.php");
        require("php/dbconfig.php");
        
        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Check for an existing print key pair
        $stmt = $conn->prepare("SELECT id, passwordhash FROM Users WHERE username=?");
        $stmt->bind_param("s", $username);    
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hash);
        
        if($stmt->num_rows != 0)
        {
        
            $stmt->fetch();
            
            if(password_verify($password, $hash))
            {
                $_SESSION["userId"] = $id;
            }
            else
            {
                $hasError = true;
                $errorMessage .= " Invalid Username or Password ";
            }
        }
        else
        {
            $hasError = true;
            $errorMessage .= " Invalid Username or Password ";
        }
    }
?><!DOCTYPE html>
<html>
    <head>
        <title>Login Page</title>
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
                                <h1>Login</h1>
                            </div>
                            <?php
                                if($hasError) {
                                    ?>
                                        <div class="alert alert-danger" role="alert"><strong>An error has occurred</strong> <?php echo $errorMessage; ?></div>
                                    <?php
                                }
                            ?>
                            
                            <?php
                                if(!isset($_SESSION["userId"])) {
                                    ?>
                                        <form class="form-horizontal" method="post">
                                          <div class="form-group">
                                            <label for="inputUsername" class="col-sm-2 control-label">Username</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                            <div class="col-sm-10">
                                              <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Password">
                                            </div>
                                          </div>
                                          <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                              <button type="submit" class="btn btn-default">Sign in</button>
                                            </div>
                                          </div>
                                        </form>
                                    <?php
                                } else {
                                    require_once("php/userinfo.php");
                                    $user = getUserInfo($_SESSION["userId"]);
                                    ?>
                                        <p>Welcome <?php echo $user["firstname"] . " " . $user["lastname"] . " (" . $user["username"] . ")"; ?></p>
                                        <a class="btn btn-default" href="logout.php" role="button">Logout</a>
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
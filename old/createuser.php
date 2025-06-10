<?php

    include("opening_php.php");

    $pagebutton_id = 0;

    $username = isset($_POST['username']) ? $_POST['username'] : "";
    $password = isset($_POST['password']) ? $_POST['password'] : "";
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : "";
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : "";
    $email = isset($_POST['email']) ? $_POST['email'] : "";
    
    $createAttempt = isset($_POST['username']) || isset($_POST['password']) || isset($_POST['firstname']) || isset($_POST['lastname']) || isset($_POST['email']);
    $usernameError = empty($username);
    $passwordError = empty($password);
    
    $hasError = $createAttempt && ($usernameError || $passwordError);
    $message = "";
    
    if($usernameError && $createAttempt)
    {
        $message .= " Invalid username ";
    }
    
    if($passwordError && $createAttempt)
    {
        $message .= " Invalid password ";
    }
    
    if(!isset($_SESSION["userId"]))
    {
        $hasError = true;
        $message .= " You must be logged in for this operation ";
    }
    
    if($createAttempt && !$hasError)
    {
        require("php/lib/password.php");
        require("php/dbconfig.php");
        
        $hash = password_hash($password, PASSWORD_DEFAULT);
        
        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // Check for an existing print key pair
        $stmt = $conn->prepare("SELECT * FROM Users WHERE username=?");
        $stmt->bind_param("s", $username);    
        $stmt->execute();
        $stmt->store_result();
        
        if($stmt->num_rows != 0)
        {
            $message = " A user with that username already exists! ";
            $hasError = true;
        }
        else
        {
            $stmt = $conn->prepare("INSERT INTO Users (username, firstname, lastname, passwordhash, email) VALUES (?,?,?,?,?)");
            $stmt->bind_param("sssss", $username, $firstname, $lastname, $hash, $email);
            $success = $stmt->execute();
            
            if($success)
            {
                $message .= " User successfully added! ";
            }
            else
            {
                $message .= " Could not add the user! ";
                $hasError = true;
            }
        }
    }
    
    if(!$createAttempt && isset($_SESSION["userId"]))
    {
        $message .= "Ready to create user";
    }
    
?><!DOCTYPE html>
<html>
    <head>
        <title>Create a user</title>
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
                                <h1>Create a new user</h1>
                            </div>
                            <div class="alert <?php echo $hasError ? "alert-danger" : "alert-success"; ?>" role="alert">
                                <?php
                                    if($hasError)
                                    {
                                        echo "<strong>An error has occurred</strong> ";
                                    }
                                    
                                    echo $message;
                                ?>
                            </div>
                            <?php 
                                if(isset($_SESSION["userId"]))
                                {
                                    ?>
                                        <form method="post">
                                          <div class="form-group <?php echo $hasError && $usernameError ? "has-error" : ""; ?>">
                                            <label class="control-label" for="inputUsername">Username</label>
                                            <input type="text" class="form-control" id="inputUsername" name="username" placeholder="Username">
                                          </div>
                                          <div class="form-group <?php echo $hasError && $passwordError ? "has-error" : ""; ?>">
                                            <label class="control-label" for="inputPassword">Password</label>
                                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label" for="inputFirstname">First Name (Optional)</label>
                                            <input type="text" class="form-control" id="inputFirstname" name="firstname" placeholder="First Name">
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label" for="inputLastname">Last Name (Optional)</label>
                                            <input type="text" class="form-control" id="inputLastname" name="lastname" placeholder="Last Name">
                                          </div>
                                          <div class="form-group">
                                            <label class="control-label" for="inputEmail">Email (Optional)</label>
                                            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                                          </div>
                                          <button type="submit" class="btn btn-default">Submit</button>
                                        </form>
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
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-default">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">UCHGC</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li <?php if($pagebutton_id == 1) { echo 'class="active"';}  ?>><a href="index.php"><?php echo $home_button[$refined_laguage]; ?></a></li>
                <li <?php if($pagebutton_id == 2) { echo 'class="active"';}  ?>><a href="about.php"><?php echo $about_button[$refined_laguage]; ?></a></li>
                <li <?php if($pagebutton_id == 3) { echo 'class="active"';}  ?>><a href="photos.php"><?php echo $photo_button[$refined_laguage]; ?></a></li>
                <!-- 4 is bulletin -->
                <li <?php if($pagebutton_id == 5) { echo 'class="active"';}  ?>><a href="location.php"><?php echo $location_button[$refined_laguage]; ?></a></li>
                <li <?php if($pagebutton_id == 6) { echo 'class="active"';}  ?>><a href="contact.php"><?php echo $contact_button[$refined_laguage]; ?></a></li>
                <li <?php if($pagebutton_id == 7) { echo 'class="active"';}  ?>><a href="links.php"><?php echo $link_button[$refined_laguage]; ?></a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <a href="https://www.facebook.com/UkrainianCatholicHolyGhostChurch">
                    <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
                    <?php echo $fb_button[$refined_laguage]; ?>
                  </a>
                </li>
                <?php
                    if(isset($_SESSION["userId"]))
                    {
                        require_once("php/userinfo.php");
                        
                        $user = getUserInfo($_SESSION["userId"]);
                        
                        ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome <?php echo $user["username"]; ?><span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="galleryEd.php">Gallery Editor</a></li>
                                    <li><a href="logout.php">Logout</a></li>
                                </ul>
                            </li>
                        <?php
                    }                
                ?>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $language_label[$refined_laguage];?>
                    <span class="hidden-sm"> <span class="flag flag-gb"></span> <span class="flag flag-fr"></span> <span class="flag flag-ua"></span></span> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li onclick="language_changed(1)"><a href="#"><span class="flag flag-gb"></span> English</a></li>
                    <li onclick="language_changed(2)"><a href="#"><span class="flag flag-fr"></span> Français</a></li>
                    <li onclick="language_changed(3)"><a href="#"><span class="flag flag-ua"></span> Українська</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div>
</div>
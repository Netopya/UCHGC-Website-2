<?php

    $pagebutton_id = 1;

    include("opening_php.php");
    
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo $home_title[$refined_laguage]; ?></title>
        
        <?php include("php/head.php"); ?>
    </head>

<body>
    <?php include("php/navbar1.php"); ?>
    <div id="container_main">

        <!-- carousel begin -->
        <div id="main-carousel" class="carousel slide" data-ride="carousel" data-interval="10000">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#main-carousel" data-slide-to="1"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active">
              <img src="images/carousel/st_esprit_int1.jpg" alt="...">
              <div class="carousel-caption">
                <!--<h1></h1>
                <p></br></p>-->
              </div>
            </div>
            <div class="item">
              <img src="images/carousel/st_esprit.jpg" alt="...">
              <div class="carousel-caption">
                <!--<h1></h1>
                <p></br></p>-->
              </div>
            </div>
          </div>

          <!-- Controls -->
          <a class="left carousel-control" href="#main-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#main-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <!-- END CAROUSEL -->

        <div id="webcontent_background">
            <div class="container marketing">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="page-header">
                            <h1><?php echo $indexh[$refined_laguage]; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="jumbotron" id="schedual_container">
                            <p><?php echo $schedual_text_new[$refined_laguage]; ?></p>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="donate_container">
                            <p><?php echo $donation_button[$refined_laguage]; ?></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $gr2013_title[$refined_laguage]; ?></h1>
                        <p><?php echo $gr2013_content[$refined_laguage]; ?></p>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $psy2013_title[$refined_laguage]; ?></h1>
                        <p><?php echo $psy2013_content[$refined_laguage]; ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3">
                        <img class="img-responsive" src="images/easter_thub.jpg" />
                    </div>
                </div> -->

                <!-- <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <img class="img-responsive" style="margin:0 auto;" src="images/Welcome UCHGC Dec 2022-1.png" />
                    </div>
                </div> -->

                
                <!--<div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $xmas2013_title[$refined_laguage]; ?></h1>
                        <a href="images/xmas.jpg">
                        <img style="float: right" src="images/thumbnails/xmas_thb.jpg"/></a>
                        <p><?php echo $xmas2013_content[$refined_laguage]; ?></p>
                        <div class="clear_float"></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $kutia_title[$refined_laguage]; ?></h1>
                        <a href="images/kutia.jpg"><img style="float: right" src="images/thumbnails/thb_kutia.jpg" height="133" width="200"/></a>
                        <p><?php echo $kutia_text[$refined_laguage]; ?></p>
                        <div class="clear_float"></div>
                    </div>
                </div>-->

                <!-- <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <?php echo $lent2023[$refined_laguage]; ?>
                    </div>
                </div> -->

<?php /*
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $e_t[$refined_laguage]; ?></h1>
                        <div class="row">
                            <div class="col-md-4 col-sm-6">
                                <center><b><?php echo $e_2d[$refined_laguage]; ?></b></center></br><?php echo $e_2t[$refined_laguage]; ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <center><b><?php echo $e_3d[$refined_laguage]; ?></b></center></br><?php echo $e_3t[$refined_laguage]; ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <center><b><?php echo $e_4d[$refined_laguage]; ?></b></center></br><?php echo $e_4t[$refined_laguage]; ?>
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <center><b><?php echo $e_5d[$refined_laguage]; ?></b></center></br><?php echo $e_5t[$refined_laguage]; ?>
                            </div>
                            <!-- <div class="col-md-4 col-sm-6">
                                <center><b><?php echo $e_6d[$refined_laguage]; ?></b></center></br><?php echo $e_6t[$refined_laguage]; ?>
                            </div> -->
                            <div class="col-md-4 col-sm-6">
                                <center><a href="images/C2011TorEasterAround-the-World-012.jpg"><img src="images/thumbnails/thb_C2011TorEasterAround-the-World-012.jpg"/></a></center>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $eb_h[$refined_laguage]; ?></h1>
                        <p><?php echo $eb_t[$refined_laguage]; ?></p>
                    </div>
                </div>
                
*/ ?>
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <?php getContent('uk_help'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <?php getContent('roof'); ?>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <img class="img-responsive" src="images/thub_20220315_115315.jpg" style="margin-bottom: 30px;"/>
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <img class="img-responsive" src="images/thub_20220315_115419.jpg" />
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <?php getContent('community_aid'); ?>
                    </div>
                </div>

                <!-- <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $corona2_title[$refined_laguage]; ?></h1>
                        <?php echo $corona2_content[$refined_laguage]; ?>
                    </div>
                </div> -->



                <!-- <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $vine_video[$refined_laguage]; ?></h1>
                        <div style="text-align: center;">
                            <iframe width="560" height="315" style="max-width:100%;" src="https://www.youtube.com/embed/xS0Bbd0AhRk" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $corona_title[$refined_laguage]; ?></h1>
                        <?php echo $corona_content[$refined_laguage]; ?>
						<p style="text-align:center;">
							<a class="btn btn-default" href="attachments/анкета.pdf" role="button"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> <?php echo $screen_form[$refined_laguage]; ?></a>
						</p>
                    </div>
                </div> -->


				
				<!--<div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <p style="font-size: 20px;text-align: center;"><?php echo $eastergreeting_content[$refined_laguage]; ?></p>
                    </div>
                </div>-->
				
				<!-- <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $gr2020[$refined_laguage]; ?></h1>
                        <div>
							<p>Дорогі у Христі брати і сестри!  Наближається свято П»ятидесятниці  ( Зелені Свята) .  Зазвичай кожного року ми  тиждень перед цими святами служили персональні Панахидки на гробах наших померлих, а на саме свято  мали  загальні молитви перед головним пам»ятником і над могилами наших померлих священиків.</p>
							<p>Але цього року сталася в світі велика біда, - пандемія коронавірусу забрала життя сотень тисяч людей у цілому світі і продовжує свою нищівну справу. Всі, незважаючи на вік, знаходяться в зоні великих ризиків.</p>
							<p>Тому ми, священики Монтреальського деканату, порадившись поміж собою, прийшли до порозуміння, що ми не маємо права підставляти під загрозу ваше здоров»я і , можливо, навіть життя та скликати вас на традиційні багатолюдні святкування. Тому ми вирішили, що всі молитовні відправи, котрі ми зазвичай мали на цвинтарі, перенести до наших храмів, в котрих Дух Святий в особивий спосіб перебуває.</p>
							<p>Кожен з нас у свято П»ятидесятниці по святковій Службі Божій відправить загальну Панахиду за померлих парафіян. Хто б з наших вірних побажав, щоб за його  померлих молилися поіменно, може, склавши  невеличку пожертву, подати записку з іменами вашому о.Пароху.</p>
							<p>В такий простий і достойний спосіб ми зможемо виконати свій християнський молитовний обов»язок щодо наших померлих родичів та членів наших родин.</p>
							<p>Нехай Всемилостивий Господь упокоїть душі їх у своїм Небеснім Царстві, а нас збереже від усякої хвороби і всякої журби та нещастя.</p>
							<p style="text-align:right;">Ваші душпастирі: о.Ігор Ощіпко, о.Ярослав Півторак, о. Назар Юрів, о.Володимир Вітт.</p>
						</div>
                    </div>
                </div> -->
				
				<div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $prayer2_title[$refined_laguage]; ?></h1>
                        <p style="text-align: center;margin-bottom: 40px;">
							<a class="btn btn-default" href="attachments/МОЛИТОВНИЙ ЧИН ДОМАШНЬОЇ ЦЕРКВИ НА ВОЗНЕСІННЯ.pdf" role="button"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>  МОЛИТОВНИЙ ЧИН ДОМАШНЬОЇ ЦЕРКВИ НА ВОЗНЕСІННЯ.pdf</a>
						</p>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $prayer3_title[$refined_laguage]; ?></h1>
                        <p style="text-align: center;margin-bottom: 40px;">
							<a class="btn btn-default" href="attachments/2020 Order of Prayer A MOLEBEN TO CHRIST THE SAVIOUR.pdf" role="button"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>  2020 Order of Prayer A MOLEBEN TO CHRIST THE SAVIOUR.pdf</a>
						</p>
                    </div>
                </div>
				
				<div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $prayer4_title[$refined_laguage]; ?></h1>
                        <p style="text-align: center;margin-bottom: 40px;">
							<a class="btn btn-default" href="attachments/2020 Order of Prayer of the Domestic Church - THE THIRD HOUR ON PENTECOST SUNDAY.pdf" role="button"><span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span>  2020 Order of Prayer of the Domestic Church - THE THIRD HOUR ON PENTECOST SUNDAY.pdf</a>
						</p>
                    </div>
                </div>
				
				<div class="row">
					<div class="col-lg-10 col-lg-offset-1">
						<img class="img-responsive" src="images/Котик001.jpg"/>
					</div>
				</div>

                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h1><?php echo $prayer1_title[$refined_laguage]; ?></h1>
                        <?php echo $prayer1_content[$refined_laguage]; ?>
                    </div>
                </div>

            </div>
        </div>
        <div id="footer">

        </div>
    </div>
</body>
</html>

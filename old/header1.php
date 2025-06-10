
<div id="languagebar_container">
                <label><?php echo $language_label[$refined_laguage];?>:
                    <select id="language_selector_selectbox" name="language_selector" onchange="javascript:language_changed()">
                        <option value="1" <?php if($language==1){echo "selected";} ?>>English</option>
                        <option value="2" <?php if($language==2){echo "selected";} ?>>Français</option>
                        <option value="3" <?php if($language==3){echo "selected";} ?>>Український</option>
                    </select>
                </label>
            </div>
            <div id="top_banner_img"></div>
            <div id="button_bar_container">
    
                <ul>
                    <a href="index.php"><li class="button_inbar" <?php if($pagebutton_id == 1) { echo 'id="page_button"';}  ?>><?php echo $home_button[$refined_laguage]; ?></li></a>
                    <li class="spacer_inbar" ></li>
                    <a href="about.php"><li class="button_inbar" <?php if($pagebutton_id == 2) { echo 'id="page_button"';}  ?>><?php echo $about_button[$refined_laguage]; ?></li></a>
                    <li class="spacer_inbar"></li>
                    <a href="photos.php"><li class="button_inbar" <?php if($pagebutton_id == 3) { echo 'id="page_button"';}  ?>><?php echo $photo_button[$refined_laguage]; ?></li></a>
                    <li class="spacer_inbar"></li>
                    <!--<li class="button_inbar" <?php if($pagebutton_id == 4) { echo 'id="page_button"';}  ?>><a href="bulletin.html"><?php echo $bulletin_button[$refined_laguage]; ?></a></li>
                    <li class="spacer_inbar"></li>-->
                    <a href="location.php"><li class="button_inbar" <?php if($pagebutton_id == 5) { echo 'id="page_button"';}  ?>><?php echo $location_button[$refined_laguage]; ?></li></a>
                    <li class="spacer_inbar"></li>
                    <a href="contact.php"><li class="button_inbar" <?php if($pagebutton_id == 6) { echo 'id="page_button"';}  ?>><?php echo $contact_button[$refined_laguage]; ?></li></a>
                    <li class="spacer_inbar"></li>
                    <a href="links.php"><li class="button_inbar" <?php if($pagebutton_id == 7) { echo 'id="page_button"';}  ?>><?php echo $link_button[$refined_laguage]; ?></li></a>
                    <li class="spacer_inbar"></li>
                </ul>
            </div>
            
           <!-- http://quebec-ukraine.com/gr/e/e3_st_esprit_fr.html -->
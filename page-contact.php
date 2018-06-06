<?php
/**
 *
 * @package Team_HD_Training
 * @Author Craig D'Arcy - Max Rep Media
 */

get_header();

if (function_exists('get_field')) {
    if (have_rows('contact_page_signup')) {
        while (have_rows('contact_page_signup')) {
            the_row();
            if(get_sub_field('contact_signup_title')){ $contact_signup_title = get_sub_field('contact_signup_title'); }
            if(get_sub_field('contact_signup_pitch')){ $contact_signup_pitch = get_sub_field('contact_signup_pitch'); }
        }
    }
    
    if (get_field('instagram')){ $instagram = get_field('instagram'); }
    if (get_field('facebook')){ $facebook = get_field('facebook'); }
    if (get_field('youtube')){ $youtube = get_field('youtube'); }
}

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div id="contact_background">
                <div class="contact_overlay"></div>
            </div>
            <div class="contact_wrapper">
                    <div class="contact_info">
                        <h2 class="section_title">E-MAIL US</h2>
                                    <div class="contact_email">
                                        <?php if (get_field('general_contact_email')) { 
                                                $email = get_field('general_contact_email'); ?><a href="mailto:<?php echo $email; ?>"><span><i class="far fa-envelope"></i></span>&nbsp; <?php echo $email; ?></a>
                                        <?php } ?>
                                    </div>
                        <?php if($instagram || $facebook || $youtube) { ?>
                            <div class="contact_social">
                                <h2 class="section_title">FOLLOW US</h2>
                                <ul>
                                            <?php if ($instagram) { ?>
                                            <li><a href="<?php echo $instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                                            <?php } 
                                            if ($youtube) { ?>
                                            <li><a href="<?php echo $youtube; ?>"><i class="fab fa-youtube-square"></i></a></li>
                                            <?php }
                                            if ($facebook) { ?>
                                            <li><a href="<?php echo $facebook; ?>"><i class="fab fa-facebook-square"></i></a></li>
                                            <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </div>
                <div id="signupnow_section">
                    <h1 class="section_title">
                        <?php if($contact_signup_title){ echo $contact_signup_title; } ?>
                    </h1>
                    <p class="page_signup_text" id="contact_signup_pitch">
                        <?php if($contact_signup_pitch){ echo $contact_signup_pitch; } ?>
                    </p>
                    <div class="contact_packages_wrapper">
                            <?php
                        if (function_exists('get_field')) {
                            if(have_rows('contest_prep', 15)) {
                                ?>
                        <div class="contact_package">
                            <h1 class="package_heading section_title contact_package_heading">CONTEST PREP</h1>
                            <?php
                                while (have_rows('contest_prep', 15)) {
                                    the_row();
                                    if(get_sub_field('prep_includes')) { $prep_includes = get_sub_field('prep_includes'); }
                                    if(have_rows('prep_package')) { ?>
                                <ul class="package_list">
                                    <?php
                                        while(have_rows('prep_package')) {
                                            the_row();
                                            if(get_sub_field('prep_package_name')) { $prep_package_name = get_sub_field('prep_package_name'); }
                                            if(get_sub_field('prep_package_price')) { $prep_package_price = get_sub_field('prep_package_price'); }                      
                            ?>
                                        <li class="package_list_item">
                                            <span class="package_name"><?php echo strtoupper($prep_package_name); ?></span> <span class="package_price"><?php echo $prep_package_price; ?></span>
                                        </li>
                                        <?php                        
                                        } ?>
                                </ul>
                                <?php
                                    }
                                } ?>
                                    <div class="package_includes">
                                        <h2 class="package_name package_includes_heading">WHAT'S INCLUDED:</h2>
                                        <p class="package_description closed">
                                            <?php echo $prep_includes; ?>
                                        </p>
                                    </div>

                        </div> 
                        <?php
                            }
                          if(have_rows('offseason', 15)) { ?>
                            <div class="contact_package">
                                <h1 class="package_heading section_title contact_package_heading">OFF-SEASON</h1>
                                <?php
                                while (have_rows('offseason', 15)) {
                                    the_row();
                                    if(get_sub_field('offseason_includes')) { $offseason_includes = get_sub_field('offseason_includes'); }
                                    if(have_rows('offseason_package')) { ?>
                                <ul class="package_list">
                                    <?php
                                        while(have_rows('offseason_package')) {
                                            the_row();
                                            if(get_sub_field('offseason_package_name')) { $offseason_package_name = get_sub_field('offseason_package_name'); }
                                            if(get_sub_field('offseason_package_price')) { $offseason_package_price = get_sub_field('offseason_package_price'); }
                                            if(get_sub_field('offseason_package_description')) { $offseason_package_description = get_sub_field('offseason_package_description'); }
                                            ?>
                                        <li class="package_list_item">
                                            <span class="package_price"> <?php echo $offseason_package_price; ?></span>
                                        </li>
                                        <?php   } ?>
                                </ul>
                                <?php
                                    }
                                }
                            } ?>
                                    <div class="package_includes">
                                        <h2 class="package_name package_includes_heading">WHAT'S INCLUDED:</h2>
                                        <p class="package_description closed">
                                            <?php echo $offseason_includes; ?>
                                        </p>
                                    </div>  
                        </div>
                        <?php
                        }
                    ?>
                            
                            <?php
                        if (function_exists('get_field')) {
                            if(have_rows('lifestyle', 15)) { ?>
                        <div class="contact_package">
                            <h1 class="package_heading section_title contact_package_heading">LIFESTYLE</h1>
                            <?php
                                while (have_rows('lifestyle', 15)) {
                                    the_row();
                                    if(get_sub_field('lifestyle_includes')) { $lifestyle_includes = get_sub_field('lifestyle_includes'); }
                                    if(have_rows('lifestyle_package')) { ?>
                                <ul class="package_list">
                                    <?php
                                        while(have_rows('lifestyle_package')) {
                                            the_row();
                                            if(get_sub_field('lifestyle_package_name')) { $lifestyle_package_name = get_sub_field('lifestyle_package_name'); }
                                            if(get_sub_field('lifestyle_package_price')) { $lifestyle_package_price = get_sub_field('lifestyle_package_price'); } 
                                            if(get_sub_field('lifestyle_package_description')) { $lifestyle_package_description = get_sub_field('lifestyle_package_description'); } ?>
                                        <li class="package_list_item">
                                            <span class="package_name"><?php echo strtoupper($lifestyle_package_name); ?></span> <span class="package_price"><?php echo $lifestyle_package_price; ?></span>
                                        </li>
                                        <?php  } ?>
                                </ul>
                                <?php
                                    }
                                } ?>
                        
                                     <div class="package_includes">
                                        <h2 class="package_name package_includes_heading">WHAT'S INCLUDED:</h2>
                                        <p class="package_description closed">
                                            <?php echo $lifestyle_includes; ?>
                                        </p>
                                    </div>                           
                        </div>
                             <?php   
                            }
                        }
                    ?>
                    

                    </div>

                </div>
                <div id="form_section">
                    <div class="contact_signup_form">
                    <div class="page_signup_wrap">
                        <div class="page_signup_form signup_form_1">
                            <?php 
                                echo do_shortcode('[contact-form-7 id="105" title="multistep-signup1" ]');
                             ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

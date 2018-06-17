<?php
/**
 *
 * @package Team_HD_Training
 * @Author Craig D'Arcy - Max Rep Media
 */

get_header();
//load CPTs
if (function_exists('get_field')) {
    if (have_rows('page_header')) {
        while (have_rows('page_header')) {
            the_row();
            if(get_sub_field('title')) { $hero_title = get_sub_field('title'); }          
            if(get_sub_field('caption')) { $hero_caption = get_sub_field('caption'); }
            if(get_sub_field('hero_image')) { 
                $hero_image = get_sub_field('hero_image'); 
                $hero_image_url = $hero_image['url'];
            }     
        }
    }
    if(get_field('about_the_team')) { $about_the_team = get_field('about_the_team'); }
    if (have_rows('page_signup', 12)) {
        while (have_rows('page_signup', 12)) {
            the_row();
            $page_signup_title = get_sub_field('page_signup_title');
            $page_signup_pitch = get_sub_field('page_signup_pitch');
        }
    }
}
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section id="team_hero" class="hero_section">
                <div class="page_hero_container" style="background-image: url('<?php echo $hero_image_url; ?>')">
                    <?php if($hero_title || $hero_caption) { ?>}
                    <div class="hero_text_overlay">
                        <div class="hero_text_wrap">
                            <h1 class="hero_title">
                                <?php echo $hero_title; ?>
                            </h1>
                            <p class="hero_caption">
                                <?php echo $hero_caption ?>
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="header_overlay_1"></div>
                    <div class="header_overlay_1_svg">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1690 173.74"><defs><style>.cls-1{fill:url(#linear-gradient);}</style><linearGradient id="linear-gradient" x1="845" y1="174.05" x2="845" y2="0.31" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#202020"/><stop offset="0.32" stop-color="#202020" stop-opacity="0.9"/><stop offset="1" stop-color="#202020" stop-opacity="0.9"/></linearGradient></defs><title>Untitled-2</title><polygon class="cls-1" points="1690 173.74 0 173.74 0 0 1690 173.74"/></svg>
                    </div>
                    <div class="header_overlay_2 iosheight">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 315.26 526.88"><defs><style>.cls-2{fill:#ebc520;opacity:0.58;}</style></defs><title>Untitled-1</title><polygon class="cls-2" points="315.09 46.6 26.66 526.88 0 524.67 315.26 0 315.09 46.6"/></svg>
                    </div>
                    <div class="header_overlay_3 iosheight">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 287.1 477.9"><defs><style>.cls-2{fill:#ebc520;opacity:0.58;}</style></defs><title>Untitled-1</title><polygon class="cls-2" points="287.1 477.9 0 477.9 287.1 0 287.1 477.9"/></svg>
                    </div>
                </div>
            </section>
            <!-- #team_hero -->
            <section id="about_section">
                <div id="about_section_text">
                    <h1 class="home_section_title section_title">
                        WE ARE TEAM HD
                    </h1>
                    <p>
                        <?php echo $about_the_team; ?>
                    </p>
                </div>
            </section>
            <!-- #about_the_team -->
            <section id="team_profiles">
                <?php
                if (function_exists('get_field')) {
                    if (have_rows('member_profile')) {
                        $count = 1;
                        $today = new DateTime('now');
                        while (have_rows('member_profile')) {
                            the_row();
                            
                            //reset vars
                            $profile_name = "";
                            $profile_titles = "";
                            $profile_bio = "";
                            $show_birthday = false;
                            $profile_dob = "";
                            $profile_height = "";
                            $profile_offseason = "";
                            $profile_contest = "";
                            
                            if (get_sub_field('profile_image')) {
                                $image = get_sub_field('profile_image');
                                $image_url = $image['url'];
                                $image_alt = $image['alt'];
                                $image_caption = $image['caption'];
                                $image_description = $image['description'];
                                $image_title = $image['title'];
                            }
                            if (get_sub_field('profile_name')) { $profile_name = get_sub_field('profile_name'); }
                            if (get_sub_field('profile_titles')) { $profile_titles = get_sub_field('profile_titles'); }
                            if (get_sub_field('profile_bio')) { $profile_bio = get_sub_field('profile_bio'); }
                            if (get_sub_field('show_birthday')) { $show_birthday = get_sub_field('show_birthday'); }
                            if (get_sub_field('profile_dob')) { $profile_dob = get_sub_field('profile_dob'); }
                            if (get_sub_field('profile_height')) { $profile_height = get_sub_field('profile_height'); }
                            if (get_sub_field('profile_offseason')) { $profile_offseason = get_sub_field('profile_offseason'); }
                            if (get_sub_field('profile_contest')) { $profile_contest = get_sub_field('profile_contest'); } 
                            if ($count % 2 != 0) {
                                $profile_class = "odd_team";
                            } else {
                                $profile_class = "even_team";
                            } 
                ?>


                    <div id="profile_<?php $counter = $count - 1; echo $counter; ?>"class="team_profile <?php echo $profile_class ?>">

                        <div class="profile_image">
                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" title="<?php echo $image_title; ?>" />
                        </div>
                        <div class="profile_wrap">
                            <div class="profile_content_wrapper">
                                <div class="bio_wrap">
                                    <h2 class="profile_name">
                                        <?php echo strtoupper($profile_name); ?>
                                    </h2>
                                    <p class="profile_titles">
                                        <?php echo $profile_titles; ?>
                                    </p>
                                    <?php if ($profile_dob || $profile_height || $profile_offseason || $profile_contest) { ?>
                                        <ul class="profile_stats">
                                            <?php if ($profile_dob) { 
                                                    $dob = new DateTime($profile_dob);
                                                    $profile_age = $today->diff($dob);


                                                    ?>
                                            <li><span class="stat_title">Age: </span><span class="stat_answer"><?php echo $profile_age->y; ?></span></li>
                                            <?php 
                                                } ?>
                                            <?php if ($show_birthday && $profile_dob) { ?>
                                            <li><span class="stat_title">DOB: </span><span class="stat_answer"><?php echo date_format($dob, 'M d, Y'); ?></span></li>
                                            <?php } ?>
                                            <?php if ($profile_height) { ?>
                                            <li><span class="stat_title">Height: </span><span class="stat_answer"><?php echo $profile_height; ?></span></li>
                                            <?php } ?>
                                            <?php if ($profile_offseason) { ?>
                                            <li><span class="stat_title">Off-Season: </span><span class="stat_answer"><?php echo $profile_offseason; ?></span></li>
                                            <?php } ?>
                                            <?php if ($profile_contest) { ?>
                                            <li><span class="stat_title">Contest: </span><span class="stat_answer"><?php echo $profile_contest; ?></span></li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                    <div class="profile_bio">
                                        <?php echo $profile_bio; ?>
                                    </div>
                                </div>
                                <div class="profile_contact">
                                    <div class="profile_email">
                                        <?php if (get_sub_field('profile_email')) { 
                                                $email = get_sub_field('profile_email'); ?><a href="mailto:<?php echo $email; ?>"><span><i class="far fa-envelope"></i></span>&nbsp; <?php echo $email; ?></a>
                                        <?php } ?>
                                    </div>
                                    <div class="profile_social">
                                        <ul>
                                            <?php if (get_sub_field('profile_instagram')) { $profile_instagram = get_sub_field('profile_instagram'); ?>
                                            <li><a href="<?php echo $profile_instagram; ?>"><i class="fab fa-instagram"></i></a></li>
                                            <?php } 
                                            if (get_sub_field('profile_youtube')) { $profile_youtube = get_sub_field('profile_youtube'); ?>
                                            <li><a href="<?php echo $profile_youtube; ?>"><i class="fab fa-youtube-square"></i></a></li>
                                            <?php }
                                            if (get_sub_field('profile_facebook')) { $profile_facebook = get_sub_field('profile_facebook'); ?>
                                            <li><a href="<?php echo $profile_facebook; ?>"><i class="fab fa-facebook-square"></i></a></li>
                                            <?php }
                                            if (get_sub_field('profile_snapchat')) { $profile_snapchat = get_sub_field('profile_snapchat'); ?>
                                            <li><a href="<?php echo $profile_snapchat; ?>"><i class="fab fa-snapchat-square"></i></a></li>
                                            <?php }
                                            if (get_sub_field('profile_twitter')) { $profile_twitter = get_sub_field('profile_twitter'); ?>
                                            <li><a href="<?php echo $profile_twitter; ?>"><i class="fab fa-twitter-square"></i></a></li>
                                            <?php } 
                                            if (get_sub_field('profile_tumblr')) { $profile_tumblr = get_sub_field('profile_tumblr'); ?>
                                            <li><a href="<?php echo $profile_tumblr; ?>"><i class="fab fa-tumblr-square"></i></a></li>
                                            <?php }
                                            if (get_sub_field('profile_twitch')) { $profile_twitch = get_sub_field('profile_twitch'); ?>
                                            <li><a href="<?php echo $profile_twitch; ?>"><i class="fab fa-twitch"></i></a></li>
                                            <?php }
                                            if (get_sub_field('profile_soundcloud')) { $profile_soundcloud = get_sub_field('profile_soundcloud'); ?>
                                            <li><a href="<?php echo $profile_soundcloud; ?>"><i class="fab fa-soundcloud"></i></a></li>
                                            <?php }
                                                ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- profile -->
                    <?php
                            $count ++;
                        }
                    }
                }
            ?>
            </section>
            <!-- #team_profiles -->
            <section id="team_signup" class="page_signup">
                <div class="page_signup_overlay"></div>
                <div class="page_signup_wrap">
                    <div class="page_signup_info">
                        <h1 class="page_signup_title section_title">
                            <?php echo $page_signup_title; ?>
                        </h1>
                        <p class="page_signup_text">
                            <?php echo $page_signup_pitch; ?>
                        </p>
                    </div>
                    <div class="page_signup_form signup_form_1">
                        <?php 

                            echo do_shortcode('[contact-form-7 id="105" title="multistep-signup1" ]');
                         ?>
                    </div>
                </div>
            </section>
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();

<?php
/**
 *
 * @package Team_HD_Training
 * @Author Craig D'Arcy - Max Rep Media
 */

get_header('front');

//load advanced custom fields
if (function_exists('get_field')) {
    if( have_rows('about_section')) {
        while (have_rows('about_section')): the_row(); 
            if(get_sub_field('about_section_title')) { $about_section_title = get_sub_field('about_section_title'); }          
            if(get_sub_field('about_section_content')) { $about_section_content = get_sub_field('about_section_content'); } 
        endwhile;
    }
    if( have_rows('team_section')) {
        while (have_rows('team_section')): the_row(); 
            if(get_sub_field('team_section_title')) { $team_section_title = get_sub_field('team_section_title'); }          
            if(get_sub_field('team_section_content')) { $team_section_content = get_sub_field('team_section_content'); }
        endwhile;
    }
    if (have_rows('page_signup', 12)) {
        while (have_rows('page_signup', 12)) {
            the_row();
            $page_signup_title = get_sub_field('page_signup_title');
            $page_signup_pitch = get_sub_field('page_signup_pitch');
        }
    }
    if( have_rows('shop_section')) {
        while (have_rows('shop_section')): the_row(); 
            if(get_sub_field('shop_title')) { $shop_title = get_sub_field('shop_title'); }          
            if(get_sub_field('shop_caption')) { $shop_caption = get_sub_field('shop_caption'); }
            if(get_sub_field('shop_image')) { 
                $shop_image = get_sub_field('shop_image'); 
                $shop_image_url = $shop_image['url'];
            }         
        endwhile;
    }
    if (have_rows('news_section')) {
        while (have_rows('news_section')) {
            the_row();
            if(get_sub_field('news_title')) { $news_title = get_sub_field('news_title'); }          
            if(get_sub_field('news_caption')) { $news_caption = get_sub_field('news_caption'); }
            if(get_sub_field('news_image')) { 
                $news_image = get_sub_field('news_image'); 
                $news_image_url = $news_image['url'];
            } 
        }
    }
}

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section id="about_section">
                <div id="about_section_text">
                    <h1 class="home_section_title section_title">
                        <?php echo $about_section_title ; ?>
                    </h1>
                    <p>
                        <?php echo $about_section_content; ?>
                    </p>
                    <div class="link_button">
                        <a class="button1" href="<?php echo get_home_url(); ?>/packages#packages">SEE COACHING PACKAGES</a>
                    </div>
                </div>
                <!-- .about_section_text -->
                <div id="about_features" class="selling_features">
                    <div class="features_background"></div>
                    <?php if (function_exists('get_field')) {                   
                              if( have_rows('selling_points')) {
                                while (have_rows('selling_points')): the_row(); 
                                    if(get_sub_field('selling_point_icon')) { 
                                        $icon_url = get_sub_field('selling_point_icon');
                                        }          
                                    if(get_sub_field('selling_point_name')) { $selling_point_name = get_sub_field('selling_point_name'); }
                                    if(get_sub_field('selling_point_content')) { $selling_point_content = get_sub_field('selling_point_content'); } ?>
                    <div class="about_feature selling_feature">
                        <div class="feature_icon">
                            <?php echo $icon_url; ?>
                        </div>
                        <h2 class="section_title">
                            <?php echo $selling_point_name; ?>
                        </h2>
                        <p>
                            <?php echo $selling_point_content; ?>
                        </p>
                    </div>
                    <!-- .about_feature -->
                    <?php endwhile; } } ?>
                </div>
                <!-- #about_features -->
            </section>
            <!-- #about_section -->


            <section id="team_section">
                <div class="home_team_overlay"></div>
                <div id="team_section_text">
                    <div class="team_section_overlay">
                        <div class="team_section_text_wrap text_overlay_wrap">
                            <h1 class="home_section_title section_title">
                                <?php echo $team_section_title; ?>
                            </h1>
                            <p>
                                <?php echo $team_section_content; ?>
                            </p>
                            <div class="link_button">
                                <a class="button1" href="<?php echo get_home_url(); ?>/team">MEET THE TEAM</a>
                            </div>
                        </div>
                    </div>
<!--
                    <div class="team_section_overlay1">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 250 140"><defs><style>.cls-10{fill:#E7CD35;fill-opacity:1;}</style></defs><polygon class="cls-10" points="250 140 0 140 250 0 250 140"/></svg>
                    </div>
                    <div class="team_section_overlay2">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 291 163.33"><defs><style>.cls-11{fill:#E7CD35;fill-opacity:1;}</style></defs><polygon class="cls-11" points="24.77 163.33 0 163.33 291 0 290.82 14 24.77 163.33"/></svg>
                    </div>
-->
                </div>
                <!-- #team_section_text -->
                <?php if ( function_exists('get_field')) {
                            if( have_rows('team_section')) {
                                while (have_rows('team_section')) {
                                    the_row(); 
                                    if( have_rows('team_profiles')) {
                                      $profile_count = 0;
                                      while (have_rows('team_profiles')) {
                                        the_row(); 
                                        $profile_count ++;
                                      }
                                    }
                                }
                            }
                        } 
                if ($profile_count == 4 || $profile_count > 6 && $profile_count != 9) {
                    $colums = '_four';
                } else {
                    $colums = '_three';
                }
                ?>
                <div id="home_team_profiles">
                    <?php if ( function_exists('get_field')) {
                            if( have_rows('team_section')) {
                                while (have_rows('team_section')): the_row(); 
                                  if( have_rows('team_profiles')) {
                                       $counter = 0;
                                    while (have_rows('team_profiles')): the_row(); 
                                        if(get_sub_field('profile_image')) { 
                                            $profile_image = get_sub_field('profile_image'); 

                                            $profile_image_url = $profile_image['url'];
                                            $profile_image_alt = $profile_image['alt'];
                                            }          
                                        if(get_sub_field('profile_name')) { $profile_name = get_sub_field('profile_name'); }
                                        if(get_sub_field('profile_titles')) { $profile_titles = get_sub_field('profile_titles'); } ?>

                    <div class="home_team_profile profile_columns<?php echo $colums; ?>" id="profile_<?php echo $counter; ?>">
                        <a href="<?php echo get_home_url(); ?>/team#profile_<?php echo $counter; ?>" class="home_profile_anchor">

                            <img src="<?php echo $profile_image_url; ?>" alt="<?php echo $profile_image_alt; ?>" />
                            
                            <?php 
                                if ($columns == '_three') {
                                    if ($counter < 3) {
                                        $overlay_class = "_top";
                                    } else if ($counter >= 3) {
                                        $overlay_class = "_bottom";
                                        if ($counter == 5) {
                                            $counter = -1;
                                        }
                                    }                                       
                                } else {
                                    if ($counter < 4) {
                                        $overlay_class = "_top";
                                    } else if ($counter >= 4) {
                                        $overlay_class = "_bottom";
                                        if ($counter == 7) {
                                            $counter = -1;
                                        }
                                    }
                                }
                            ?>
                                <div class="link_button">
                                    <p class="button1">ABOUT 
                                    <?php echo $profile_name ?>
                                    </p>
                                </div>
                            <div class="home_profile_text home_profile_text<?php echo $overlay_class; ?>">
                                <div class="home_profile_text_overlay home_profile_text_overlay<?php echo $overlay_class; ?>">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 480 125"><defs><style>.cls-5{fill-opacity:0.72;}</style></defs><polygon class="cls-5" points="480 125 0 125 0 0 480 56.4 480 125"/></svg>
                                </div>
                                <div class="home_profile_text_wrap">
                                    <h2>
                                        <?php echo $profile_name; ?>
                                    </h2>
                                    <p>
                                        <?php echo $profile_titles; ?>
                                    </p>
                                </div>
                                <div class="home_profile_overlay1">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 140 140"><defs><style>.cls-6{fill:#f3db43;fill-opacity:0.58;}</style></defs><polygon class="cls-6" points="140 140 0 140 140 0 140 140"/></svg>
                                </div>
                                <div class="home_profile_overlay2">
                                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 163.33 163.33"><defs><style>.cls-7{fill:#f3db43;fill-opacity:0.58;}</style></defs><polygon class="cls-7" points="13.9 163.33 0 163.33 163.33 0 163.23 14 13.9 163.33"/></svg>
                                </div>
                            </div><!-- .home_profile_text -->
                                </a>
                    </div>
                    <!-- .home_team_profile -->

                    <?php $counter ++;  endwhile; } endwhile; } } ?>
                </div>
                <!-- #home_team_profiles -->
            </section>
            <!-- #home_team_section -->
            <div class="shop_news_wrap">
                <section id="shop_section" class="home_link_section">
                    <a href="http://heavydapparel.com">
                        <div class="home_link_section">
                            <div class="home_link_image" style="background-image: url('<?php echo $shop_image_url; ?>')"></div>
                            <div class="shop_news_overlay"></div>
                            <div class="shop_text home_link_section_text">
                                <h1>
                                    <?php echo $shop_title; ?>
                                </h1>
                                <?php if ($shop_caption) { ?>
                                <p class="home_link_caption">
                                    <?php echo $shop_caption; ?>
                                </p>
                                <?php } ?>
                                <div class="link_button">
                                    <p class="button1">SHOP NOW</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </section>
                <!-- #shop_section -->
                <section id="news_section" class="home_link_section">
                    <a href="<?php echo get_home_url(); ?>/news">
                        <div class="home_link_section">
                            <div class="home_link_image" style="background-image: url('<?php echo $news_image_url; ?>')"></div>
                            <div class="shop_news_overlay"></div>
                            <div class="news_text home_link_section_text">
                                <h1>
                                    <?php echo $news_title; ?>
                                </h1>
                                <?php if ($news_caption) { ?>
                                <p class="home_link_caption">
                                    <?php echo $news_caption; ?>
                                </p>
                                <?php } ?>
                                <div class="link_button">
                                    <p class="button1">SEE LATEST</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </section>
                <!-- #news_section -->
            </div>
            <!-- .shop_news_wrap -->
            <section id="home_client_spotlight" class="featured_client">
                <?php
                      $args = array(
                        'post_type'=>'client_profile', 
                        'orderby'=>'rand', 
                        'posts_per_page'=>'1',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'client-category',
                                'field' => 'slug',
                                'terms' => 'featured-client'
                            )
                        )
                      );

                      $client_profiles = new WP_Query($args);

                      while ($client_profiles->have_posts()) : $client_profiles->the_post(); 
                    
                        if(function_exists('get_field')) {
                            $id = get_the_ID();
                            if(get_field('client_name')){ $client_name = get_field('client_name'); 
                                                        $first_name = explode( "\n", wordwrap ($client_name, 1));
                                                         $first_name = $first_name[0];
                                                        }
                            if(get_field('client_age')){ $client_age = get_field('client_age'); }
                            if(get_field('client_height')){ $client_height = get_field('client_height'); }
                            if(get_field('before_weight')){ $before_weight = get_field('before_weight'); }
                            if(get_field('after_weight')){ $after_weight = get_field('after_weight'); }
                            if(get_field('client_program')){ $client_program = get_field('client_program'); }
                            if(get_field('client_bio')){ $client_bio = get_field('client_bio'); 
                                                       if(strlen($client_bio) > 200) {
                                                           $client_bio = explode( "\n", wordwrap ($client_bio, 200));
                                                           $client_bio = $client_bio[0] . '<a href="' . get_home_url() . '/client-spotlight#' . $id . '">...more on ' . $first_name . '</a>';
                                                       }
                                                       }
                            if(get_field('client_instagram')){ $client_instagram = get_field('client_instagram'); }
                            if(get_field('before_pic')) { 
                                $before_pic = get_field('before_pic'); 

                                $before_pic_url = $before_pic['url'];
                                $before_pic_alt = $before_pic['alt'];
                            }   
                        }
                ?>
                    <div id="featured_client_overlay"></div>
                    <div class="featured_client_text">
                        <div class="text_overlay text_overlay_left">
                            <div class="text_overlay_wrap">
                                <div class="featured_client_info">
                                    <h1 class="section_title">CLIENT SPOTLIGHT</h1>
                                    <?php if ($client_name) { ?>
                                    <h2 class="client_name">
                                        <?php echo $client_name; ?>
                                    </h2>
                                    <div class="client_stats_wrap">
                                        <?php }
                    if ($client_age) { ?>
                                        <p class="client_age"><strong>Age:</strong>
                                            <?php echo $client_age; ?>
                                        </p>
                                        <?php }
                    if ($client_height) { ?>
                                        <p class="client_height"><strong>Height:</strong>
                                            <?php echo $client_height; ?>
                                        </p>

                                        <?php } ?>
                                    </div>
                                    <?php
                            
                    if ($client_bio) { ?>
                                        <p class="client_bio">
                                            <?php echo $client_bio; ?>
                                        </p>
                                        <?php } ?>

                                </div>
                                <div class="featured_client_link link_button">
                                    <a class="button1" href="<?php echo get_home_url(); ?>/client-spotlight">SEE MORE CLIENTS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="featured_client_images">
                        <div class="featured_client_before">
                            <?php if($before_pic) { ?>
                            <img src="<?php echo $before_pic_url; ?>" alt="<?php echo $before_pic_alt; ?>" />
                            <?php } ?>
                        </div>
                        <div class="featured_client_after">
                            <?php if($after_pic) { ?>
                            <img src="<?php echo $after_pic_url; ?>" alt="<?php echo $before_pic_alt; ?>" />
                            <?php } ?>
                        </div>
                    </div>
                    <?php         
                    endwhile;
                    wp_reset_postdata();
                ?>

            </section>
            <!-- #home_client_spotlight -->
            <section id="home_signup" class="page_signup">
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
            <!-- #home_signup -->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php

get_footer();

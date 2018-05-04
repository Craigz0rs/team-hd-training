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
                <div id="about_features" class="selling_features">
                    <span class="features_background"></span>
                    <?php if (function_exists('get_field')) {                   
                              if( have_rows('selling_points')) {
                                while (have_rows('selling_points')): the_row(); 
                                    if(get_sub_field('selling_point_icon')) { 
                                        $selling_point_icon = get_sub_field('selling_point_icon'); 

                                        $icon_title = $selling_point_icon['title'];
                                        $icon_description = $selling_point_icon['description'];
                                        $icon_caption = $selling_point_icon['caption'];

                                        $icon_url = $selling_point_icon['url'];
                                        $icon_alt = $selling_point_icon['alt'];
                                        }          
                                    if(get_sub_field('selling_point_name')) { $selling_point_name = get_sub_field('selling_point_name'); }
                                    if(get_sub_field('selling_point_content')) { $selling_point_content = get_sub_field('selling_point_content'); } ?>
                    <div class="about_feature selling_feature">
                        <img src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>" />
                        <h2 class="section_title">
                            <?php echo $selling_point_name; ?>
                        </h2>
                        <p>
                            <?php echo $selling_point_content; ?>
                        </p>
                    </div>
                    <?php endwhile; } } ?>
                </div>
                <!-- #about_features -->
            </section>
            <!-- #about_section -->


            <section id="team_section">
                <div id="home_team_profiles">
                    <?php if ( function_exists('get_field')) {
                            if( have_rows('team_section')) {
                                while (have_rows('team_section')): the_row(); 
                                  if( have_rows('team_profiles')) {
                                    while (have_rows('team_profiles')): the_row(); 
                                        if(get_sub_field('profile_image')) { 
                                            $profile_image = get_sub_field('profile_image'); 

                                            $profile_image_title = $profile_image['title'];
                                            $profile_image_description = $profile_image['description'];
                                            $profile_image_caption = $profile_image['caption'];

                                            $profile_image_url = $profile_image['url'];
                                            $profile_image_alt = $profile_image['alt'];
                                            }          
                                        if(get_sub_field('profile_name')) { $profile_name = get_sub_field('profile_name'); }
                                        if(get_sub_field('profile_titles')) { $profile_titles = get_sub_field('profile_titles'); } ?>
                    
                        <div class="home_team_profile">
<!--                            <a href="<?php echo get_home_url(); ?>/team">-->
                            <img src="<?php echo $profile_image_url; ?>" alt="<?php echo $profile_image_alt; ?>" />
<!--                                 </a>-->
                            <div class="home_profile_text">
                                <h2>
                                    <?php echo $profile_name; ?>
                                </h2>
                                <p>
                                    <?php echo $profile_titles; ?>
                                </p>
                            </div>
                        </div>
                   
                    <?php endwhile; } endwhile; } } ?>
                </div>
                <!-- #home_team_profiles -->
                <div id="team_section_text">
                    <div class="team_section_overlay text_overlay">
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
                </div>
            </section>
            <!-- #home_team_section -->
            <div class="shop_news_wrap">
           <section id="shop_section" class="home_link_section">
                <a href="http://heavydapparel.com">
                    <div class="home_link_section" style="background-image: url('<?php echo $shop_image_url; ?>')">
                        <span class="shop_news_overlay"></span>
                        <div class="shop_text home_link_section_text">
                            <h1><?php echo $shop_title; ?></h1>
                            <p><?php echo $shop_caption; ?></p>
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
                    <div class="home_link_section" style="background-image: url('<?php echo $news_image_url; ?>')">
                        <span class="shop_news_overlay"></span>
                        <div class="news_text home_link_section_text">
                            <h1><?php echo $news_title; ?></h1>
                            <p><?php echo $news_caption; ?></p>
                            <div class="link_button">
                                <p class="button1">SEE LATEST</p>
                            </div>
                        </div>
                    </div>
                </a>
            </section>
            <!-- #news_section -->
            </div>
            <section id="home_client_spotlight">
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
                            
                            if(get_field('client_name')){ $client_name = get_field('client_name'); }
                            if(get_field('client_age')){ $client_age = get_field('client_age'); }
                            if(get_field('client_height')){ $client_height = get_field('client_height'); }
                            if(get_field('before_weight')){ $before_weight = get_field('before_weight'); }
                            if(get_field('after_weight')){ $after_weight = get_field('after_weight'); }
                            if(get_field('client_program')){ $client_program = get_field('client_program'); }
                            if(get_field('client_bio')){ $client_bio = get_field('client_bio'); }
                            if(get_field('client_instagram')){ $client_instagram = get_field('client_instagram'); }
                            if(get_field('before_pic')) { 
                                $before_pic = get_field('before_pic'); 

                                $before_pic_title = $before_pic['title'];
                                $before_pic_description = $before_pic['description'];
                                $before_pic_caption = $before_pic['caption'];

                                $before_pic_url = $before_pic['url'];
                                $before_pic_alt = $before_pic['alt'];
                            }
                            if(get_field('after_pic')) { 
                                $after_pic = get_field('after_pic'); 

                                $after_pic_title = $after_pic['title'];
                                $after_pic_description = $after_pic['description'];
                                $after_pic_caption = $after_pic['caption'];

                                $after_pic_url = $after_pic['url'];
                                $after_pic_alt = $after_pic['alt'];
                            }     
                        }
                ?>


            

                        <div class="featured_client_info">
                            <h1 class="section_title">CLIENT SPOTLIGHT</h1>
                            <?php if ($client_name) { ?>
                            <h2 class="client_name">
                                <?php echo $client_name; ?>
                            </h2>
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
                            <?php }
                    if ($client_program) { ?>
                            <p class="client_program"><strong>Program:</strong>
                                <?php echo $client_program; ?>
                            </p>
                            <?php }
                    if ($before_weight) { ?>
                            <p class="before_weight">
                                <?php echo $before_weight; ?>
                            </p>
                            <?php }
                    if ($after_weight) { ?>
                            <p class="after_weight">
                                <?php echo $after_weight; ?>
                            </p>
                            <?php }
                    if ($client_bio) { ?>
                            <p class="client_bio">
                                <?php echo $client_bio; ?>
                            </p>
                            <?php }
                    if ($client_instagram) { ?> <a href="<?php echo $client_instagram; ?>" class="client_instagram">Insta Link</a>
                            <?php } ?>
                        </div>
                        <div class="featured_client_link link_button">
                            <a class="button1" href="<?php echo get_home_url(); ?>/client-spotlight">SEE MORE CLIENTS</a>
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
                <div class="page_signup_info">
                    <h1 class="page_signup_title section_title">
                        <?php echo $page_signup_title; ?>
                    </h1>
                    <p class="page_signup_text">
                        <?php echo $page_signup_pitch; ?>
                    </p>
                </div>
                <div class="page_signup_form signup_form_1">

                </div>
            </section>
            <!-- #home_signup -->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php

get_footer();

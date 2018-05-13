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
            <section id="client_spotlight_hero" class="hero_section">
                <div class="page_hero_container" style="background-image: url('<?php echo $hero_image_url; ?>')">
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
            <!-- #packages_hero -->
            <section id="featured_clients">
                <?php
                      $args = array(
                        'post_type'=>'client_profile',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'client-category',
                                'field' => 'slug',
                                'terms' => 'featured-client'
                            )
                        )
                      );
                        
                      $count = 1;

                      $client_profiles = new WP_Query($args);

                      while ($client_profiles->have_posts()) : $client_profiles->the_post(); 
                        
                        if($count % 2 != 0) {
                            $featured_class = "odd_client";
                        } else {
                            $featured_class = "even_client";
                        }
                        
                        if(function_exists('get_field')) {
                            $id = get_the_ID();
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

                    
                        <div id="<?php echo $id; ?>" class="featured_client_profile <?php echo $featured_class; ?>">
                            <div class="featured_client_text">
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
                </div>
                        <?php
                    $count ++;
                    endwhile;
                    wp_reset_postdata();
                ?>            
            </section>
            <!-- #featured_clients -->
            <section id="other_clients">
                 <?php
                      $args = array(
                        'post_type'=>'client_profile',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'client-category',
                                'field' => 'slug',
                                'terms' => 'non-featured-client'
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

                    
                        <div class="client_tile">
                            <div class="client_tile_text">
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
                        <div class="client_tile_images">
                            <div class="client_tile_before">
                                <?php if($before_pic) { ?>
                                <img src="<?php echo $before_pic_url; ?>" alt="<?php echo $before_pic_alt; ?>" />
                                <?php } ?>
                            </div>
                            <div class="client_tile_after">
                                <?php if($after_pic) { ?>
                                <img src="<?php echo $after_pic_url; ?>" alt="<?php echo $before_pic_alt; ?>" />
                                <?php } ?>
                            </div>
                        </div>
                </div>
                        <?php
                    $count ++;
                    endwhile;
                    wp_reset_postdata();
                ?>               
            </section>
            <!-- #other_clients -->
            <section id="client_spotlight_signup" class="page_signup">
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

                    </div>
                </div>
            </section>
            <!-- #client_spotlight_signup -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

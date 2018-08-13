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
                $hero_image_id = $hero_image['id'];
                $hero_image_alt = $hero_image['alt'];
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
            <section id="packages_hero" class="hero_section">
                <div class="page_hero_container">
                    <img class="page_hero_image" <?php ar_responsive_image($hero_image_id,'large','1600px'); ?>  alt="<?php echo $hero_image_alt; ?>" /> 
                    <?php if($hero_title || $hero_caption) { ?>
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
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1690 173.74"><defs><style>.cls-1{fill:url(#linear-gradient);}</style><linearGradient id="linear-gradient" x1="845" y1="174.05" x2="845" y2="0.31" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#202020"/><stop offset="0.32" stop-color="#202020" stop-opacity="0.9"/><stop offset="1" stop-color="#202020" stop-opacity="0.9"/></linearGradient></defs><polygon class="cls-1" points="1690 173.74 0 173.74 0 0 1690 173.74"/></svg>
                    </div>
                    <div class="header_overlay_2 iosheight">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 315.26 526.88"><defs><style>.cls-2{fill:#ebc520;opacity:0.58;}</style></defs><polygon class="cls-2" points="315.09 46.6 26.66 526.88 0 524.67 315.26 0 315.09 46.6"/></svg>
                    </div>
                    <div class="header_overlay_3 iosheight">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 287.1 477.9"><defs><style>.cls-2{fill:#ebc520;opacity:0.58;}</style></defs><polygon class="cls-2" points="287.1 477.9 0 477.9 287.1 0 287.1 477.9"/></svg>
                    </div>
                </div>
                <!-- .page_hero_container -->
            </section>
            <!-- #packages_hero -->
            <section id="packages_section">
                <div class="packages_section_wrap">
                    <section id="contest_prep" class="package_wrap">
                        <div class="package_content_wrap">
                            <h1 class="package_heading section_title">CONTEST PREP</h1>
                            <?php
                        if (function_exists('get_field')) {
                            if(have_rows('contest_prep')) {
                                while (have_rows('contest_prep')) {
                                    the_row();
                                    if(get_sub_field('prep_includes')) { $prep_includes = get_sub_field('prep_includes'); }
                                    if(have_rows('prep_package')) { ?>
                                <ul class="package_list">
                                    <?php
                                        while(have_rows('prep_package')) {
                                            the_row();
                                            if(get_sub_field('prep_package_name')) { $prep_package_name = get_sub_field('prep_package_name'); }
                                            if(get_sub_field('prep_package_price')) { $prep_package_price = get_sub_field('prep_package_price'); } 
                                            if(get_sub_field('prep_package_description')) { $prep_package_description = get_sub_field('prep_package_description'); }                         
                            ?>
                                        <li class="package_list_item">
                                            <h2><span class="package_name"><?php echo strtoupper($prep_package_name); ?></span> <span class="package_price"><?php echo $prep_package_price; ?></span></h2>
                                            <p class="package_description">
                                                <?php echo $prep_package_description; ?>
                                            </p>
                                        </li>
                                        <?php                        
                                        } ?>
                                </ul>
                                <?php
                                    }
                                }
                            }
                        }
                    ?>
                                    <div class="package_includes">
                                        <h2 class="package_name package_includes_heading">PREP PACKAGES INCLUDE:</h2>
                                        <p class="package_description">
                                            <?php echo $prep_includes; ?>
                                        </p>
                                    </div>
                                    <div class="link_button">
                                        <a class="button1" href="<?php echo get_home_url(); ?>/contact#signup">START YOUR PREP</a>
                                    </div>
                        </div>
                        <!-- .package_content_wrap -->
                    </section>
                    <!-- #contest_prep -->
                    <section id="off_season" class="package_wrap">
                        <div class="package_content_wrap">
                            <h1 class="package_heading section_title">OFF-SEASON</h1>
                            <?php
                        if (function_exists('get_field')) {
                            if(have_rows('offseason')) {
                                while (have_rows('offseason')) {
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
                                            <h2>
                                                <span class="package_name"><?php echo strtoupper($offseason_package_name); ?></span><br><span class="package_price"> <?php echo $offseason_package_price; ?></span>
                                            </h2>
                                            <p class="package_description">
                                                <?php echo $offseason_package_description; ?>
                                            </p>
                                        </li>
                                        <?php   } ?>
                                </ul>
                                <?php
                                    }
                                }
                            }
                        }
                    ?>
                                    <div class="package_includes">
                                        <h2 class="package_name package_includes_heading">OFF-SEASON INCLUDES:</h2>
                                        <p class="package_description">
                                            <?php echo $offseason_includes; ?>
                                        </p>
                                    </div>
                                    <div class="link_button">
                                        <a class="button1" href="<?php echo get_home_url(); ?>/contact#signup">START YOUR OFF-SEASON</a>
                                    </div>
                        </div>
                        <!-- .package_content_wrap -->
                    </section>
                    <!-- #off_season -->
                    <section id="lifestyle" class="package_wrap">
                        <div class="package_content_wrap">
                            <h1 class="package_heading section_title">LIFESTYLE</h1>
                            <?php
                        if (function_exists('get_field')) {
                            if(have_rows('lifestyle')) {
                                while (have_rows('lifestyle')) {
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
                                            <p><span class="package_name"><?php echo strtoupper($lifestyle_package_name); ?></span> <span class="package_price"><?php echo $lifestyle_package_price; ?></span></p>
                                            <?php if($lifestyle_package_description) { ?>
                                            <p class="package_description">
                                                <?php echo $lifestyle_package_description; ?>
                                            </p>
                                            <?php } ?>
                                        </li>
                                        <?php  } ?>
                                </ul>
                                <?php
                                    }
                                }
                            }
                        }
                    ?>
                                    <div class="package_includes">
                                        <h2 class="package_name package_includes_heading">LIFESTYLE INCLUDES:</h2>
                                        <p class="package_description">
                                            <?php echo $lifestyle_includes; ?>
                                        </p>
                                    </div>
                                    <div class="link_button">
                                        <a class="button1" href="<?php echo get_home_url(); ?>/contact#signup">GET STARTED NOW</a>
                                    </div>
                        </div>
                        <!-- .package_content_wrap -->
                    </section>
                    <!-- #lifestyle -->
                </div>
                <!-- .packages_section_wrap -->
                <div id="packages_features" class="selling_features">
                    <div class="features_background"></div>
                    <?php if (function_exists('get_field')) {                   
                              if( have_rows('packages_include')) {
                                while (have_rows('packages_include')): the_row(); 
                                    if(get_sub_field('icon')) { 
                                        $icon_url = get_sub_field('icon');
//                                        $feature_icon = get_sub_field('icon'); 
//
//                                        $icon_url = $feature_icon['url'];
//                                        $icon_alt = $feature_icon['alt'];
                                        }          
                                    if(get_sub_field('title')) { $feature_title = get_sub_field('title'); }
                                    if(get_sub_field('description')) { $feature_description = get_sub_field('description'); } ?>
                    <div class="package_feature selling_feature">
                        <div class="feature_icon">
                            <?php echo $icon_url; ?>
                        </div>
                        <!--                        <img src="<?php echo $icon_url; ?>" alt="<?php echo $icon_alt; ?>" />-->
                        <h2 class="section_title">
                            <?php echo $feature_title; ?>
                        </h2>
                        <p>
                            <?php echo $feature_description; ?>
                        </p>
                    </div>
                    <?php endwhile; } } ?>
                </div>

                <?php
                        if (function_exists('get_field')) {
                            if(have_rows('other_services')) { ?>
                    <!--
                    <section id="other_services" class="package_wrap">
                        <h1 class="package_heading section_title">ALSO OFFERING</h1>
                        <?php while (have_rows('other_services')) {
                                    the_row();
                                    if(get_sub_field('other_includes')) { $other_includes = get_sub_field('other_includes'); }
                                    if(have_rows('other_package')) { ?>
                        <ul class="package_list">
                            <?php
                                        while(have_rows('other_package')) {
                                            the_row();
                                            if(get_sub_field('other_package_name')) { $other_package_name = get_sub_field('other_package_name'); }
                                            if(get_sub_field('other_package_price')) { $other_package_price = get_sub_field('other_package_price'); } 
                                            if(get_sub_field('other_package_description')) { $other_package_description = get_sub_field('other_package_description'); } ?>
                                <li class="package_list_item">
                                    <p><span class="package_name"><?php echo $other_package_name; ?></span> <span class="package_price"><?php echo $other_package_price; ?></span></p>
                                    <?php if($other_package_description) { ?>
                                    <p class="package_description">
                                        <?php echo $other_package_description; ?>
                                    </p>
                                    <?php } ?>
                                </li>
                                <?php  } ?>
                        </ul>
                        <?php
                                    }
                                } ?>
                            <div class="package_includes">
                                <p>
                                    <?php echo $other_includes; ?>
                                </p>
                            </div>
                    </section>
-->
                    <?php }
                        }
                    ?>
            </section>
            <!-- #packages_section -->
            <section id="packages_signup" class="page_signup">
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
            <!-- #packages_signup -->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();

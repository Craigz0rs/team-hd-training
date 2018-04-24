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
    if (have_rows('page_header')) {
        while (have_rows('page_header')) {
            the_row();
            if(get_sub_field('title')) { $hero_title = get_sub_field('title'); }            
        }
    }
    
}

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section id="packages_hero">
                <div class="page_hero_container" style="background-image: url('<?php echo $hero_image_url; ?>')">
                    <h1 class="hero_title">
                        <?php echo $hero_title; ?>
                    </h1>
                    <p class="hero_caption">
                        <?php echo $hero_caption ?>
                    </p>
                </div>
            </section>
            <!-- #packages_hero -->
            <section id="packages_section">
                <section id="contest_prep" class="package_wrap">
                    <h1 class="package_heading">CONTEST PREP</h1>
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
                                            if(get_sub_field('prep_package_price')) { $prep_package_price = get_sub_field('prep_package_price'); } ?>
                                <li class="package_list_item">
                                    <p><span class="package_name"><?php echo $prep_package_name; ?></span> <span class="package_price"><?php echo $prep_package_price; ?></span></p>
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
                                <p>
                                    <?php echo $prep_includes; ?>
                                </p>
                            </div>
                            <div class="link_button">
                                <a href="<?php echo get_home_url(); ?>/contact#signup">START YOUR PREP</a>
                            </div>
                </section>
                <section id="off_season" class="package_wrap">
                    <h1 class="package_heading">OFF-SEASON</h1>
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
                                            if(get_sub_field('offseason_package_and_price')) { $offseason_package_and_price = get_sub_field('offseason_package_and_price'); }
                                            ?>
                                <li class="package_list_item">
                                    <p>
                                        <?php echo $offseason_package_and_price; ?>
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
                            <div class="offseason_includes">
                                <p>
                                    <?php echo $offseason_includes; ?>
                                </p>
                            </div>
                            <div class="link_button">
                                <a href="<?php echo get_home_url(); ?>/contact#signup">START YOUR OFF-SEASON</a>
                            </div>
                </section>
                <section id="lifestyle" class="package_wrap">
                    <h1 class="package_heading">LIFESTYLE</h1>
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
                                    <p><span class="package_name"><?php echo $lifestyle_package_name; ?></span> <span class="package_price"><?php echo $lifestyle_package_price; ?></span></p>
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
                                <p>
                                    <?php echo $lifestyle_includes; ?>
                                </p>
                            </div>
                            <div class="link_button">
                                <a href="<?php echo get_home_url(); ?>/contact#signup">GET STARTED NOW</a>
                            </div>
                </section>
                <div id="packages_features" class="selling_features">

                </div>
                <section id="also_offer" class="package_wrap">

                </section>
            </section>
            <!-- #packages_section -->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();

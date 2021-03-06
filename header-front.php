<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Team_HD_Training
 * @author Craig D'Arcy - Max Rep Media
 */

?>
    <!doctype html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'template_directory' ); ?>/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="<?php echo get_bloginfo( 'template_directory' ); ?>/favicon-16x16.png" sizes="16x16" />
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:600,700|Barlow+Semi+Condensed:400,700" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.12/js/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
        <?php wp_head(); ?>
        <?php if (is_front_page()) { ?>
        <link rel="stylesheet" href="<?php echo get_bloginfo( 'template_directory' ); ?>/flexslider/flexslider.css" type="text/css">
        <?php } ?>
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <![endif]-->
    </head>

    <body <?php body_class(); ?>>
        <div id="page" class="site">
            <a class="skip-link screen-reader-text" href="#content">
                <?php esc_html_e( 'Skip to content', 'team_hd_training' ); ?>
            </a>

            <header id="masthead" class="site-header front-header header_standard_size iosheight">
                <div class="navbar">
                    <div class="navbar_wrap">
                        <div class="site-branding">
                            <?php
			the_custom_logo();
			if ( is_front_page() ) :
				?>
                                <h1 class="site-title">
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                LOGO
                            </a>
                                </h1>
                                <?php
			else :
				?>
                                    <p class="site-title">
                                        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                            <?php bloginfo( 'name' ); ?>
                                        </a>
                                    </p>
                                    <?php
			endif;
			$team_hd_training_description = get_bloginfo( 'description', 'display' );
			if ( $team_hd_training_description || is_customize_preview() ) :
				?>

                                        <!--
                                <p class="site-description">
                                                     <?php echo $team_hd_training_description; /* WPCS: xss ok. */ ?> 
                                </p>
-->

                                        <?php endif; ?>
                        </div>
                        <!-- .site-branding -->

                        <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle button_nav" aria-controls="primary-menu" aria-expanded="false"><span>MENU</span></button>
                            <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
                        </nav>
                        <!-- #site-navigation -->
                    </div>
                    <!-- .navbar_wrap -->
                </div>
                <!-- .navbar -->
                <?php if(function_exists('get_field')){  
                if( have_rows('image_slider') ): 
    //reset vars
    $image = "";
    $slide_title = "";
    $slide_text = "";
    $slide_button_text = ""; ?>

                <div class="flexslider hero_slider" id="hero_slider">
                    <div class="loading loading_hidden"></div>
                    <h2 class="loading_text loading_hidden section_title">LOADING...</h2>
                    <ul class="slides hero_slides">
                        <?php while( have_rows('image_slider') ): the_row();
                                                    $image = get_sub_field('slider_image');
                                                    $title = $image['title'];
                                                    $description = $image['description'];
                                                    $caption = $image['caption'];

                                                    $url = $image['url'];
                                                    $alt = $image['alt'];
                                                    $id = $image['id'];


                                            
                                                    $slide_title = get_sub_field('slide_title');
                                                    $slide_text = get_sub_field('slide_text');
                                                    $slide_button_text = get_sub_field('slide_button_text');
                                                    $slide_button_url = get_sub_field('slide_button_url');
                                                ?>
                        <li data-thumb="<?php echo $url; ?>">
                            <div class="slider_image" >
                                <img class="iosheight" <?php ar_responsive_image($id,'full','1600px'); ?>  alt="<?php echo $hero_image_alt; ?>" /> 

                                <?php if ($slide_text) { ?>
                                <div class="slider_overlay">
                                    <div class="slider_info_wrap">
                                        <?php 
                                        if ($slide_title) { ?>
                                        <h2>
                                            <?php echo $slide_title; ?>
                                        </h2>
                                        <?php }
                                        if ($slide_text) { ?>
                                        <p>
                                            <?php echo $slide_text; ?>
                                        </p>
                                        <?php }
                                        if ($slide_button_text) { ?>
                                        <div class="link_button">
                                            <a href="<?php echo $slide_button_url; ?>" class="button3">
                                                <?php echo $slide_button_text; ?>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!-- .slider_info_wrap -->
                                </div>
                                <!-- .slider_overlay -->
                                <?php } ?>
                            </div>
                            <!-- .slider_image -->
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <!-- .hero_slides -->
                    <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'exterior')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                    <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'exterior')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                    <div class="header_overlay_2 iosheight">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 315.26 526.88"><defs><style>.cls-2{fill:#ebc520;opacity:0.58;}</style></defs><title></title><polygon class="cls-2" points="315.09 46.6 26.66 526.88 0 524.67 315.26 0 315.09 46.6"/></svg>
                    </div>
                    <!-- .header_overlay_2 -->
                    <div class="header_overlay_3 iosheight">
                        <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 287.1 477.9"><defs><style>.cls-2{fill:#ebc520;opacity:0.58;}</style></defs><title></title><polygon class="cls-2" points="287.1 477.9 0 477.9 287.1 0 287.1 477.9"/></svg>
                    </div>
                    <!-- .header_overlay_3 -->
                </div>
                <!-- #hero_slider -->
                <?php endif; 
                } ?>
                <div class="header_overlay_1"></div>
                <div class="header_overlay_1_svg">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1690 173.74"><defs><style>.cls-1{fill:url(#linear-gradient);}</style><linearGradient id="linear-gradient" x1="845" y1="174.05" x2="845" y2="0.31" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#202020"/><stop offset="0.32" stop-color="#202020" stop-opacity="0.9"/><stop offset="1" stop-color="#202020" stop-opacity="0.9"/></linearGradient></defs><title></title><polygon class="cls-1" points="1690 173.74 0 173.74 0 0 1690 173.74"/></svg>
                </div>
                <!-- .header_overlay_1_svg -->
            </header>
            <!-- #masthead -->

            <div id="content" class="site-content">

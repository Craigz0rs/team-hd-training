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
        <link rel="profile" href="http://gmpg.org/xfn/11">
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

            <header id="masthead" class="site-header">
                <div class="site-branding">
                    <?php
			the_custom_logo();
			if ( is_front_page() ) :
				?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                <?php bloginfo( 'name' ); ?>
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

                                <p class="site-description">
                                    <!--                 <?php echo $team_hd_training_description; /* WPCS: xss ok. */ ?> -->
                                </p>

                                <?php endif; ?>
                </div>
                <!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'team_hd_training' ); ?></button>
                    <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
                </nav>
                <!-- #site-navigation -->
                <br>
                <?php if(function_exists('get_field')){  
                if( have_rows('image_slider') ): ?>
                <div class="flexslider hero_slider" id="hero_slider">
                    <ul class="slides hero_slides">
                        <?php while( have_rows('image_slider') ): the_row();
                                                    $image = get_sub_field('slider_image');
                                                    $title = $image['title'];
                                                    $description = $image['description'];
                                                    $caption = $image['caption'];

                                                    $url = $image['url'];
                                                    $alt = $image['alt'];


                                                    $size = 'full';
                                                    $myimage = $image['sizes'][ $size ];
                                                    $width = $image['sizes'][ $size . '-width' ];
                                                    $height = $image['sizes'][ $size . '-height' ];
                                                    
                                                    $slide_title = get_sub_field('slide_title');
                                                    $slide_text = get_sub_field('slide_text');
                                                    $slide_button_text = get_sub_field('slide_button_text');
                                                    $slide_button_url = get_sub_field('slide_button_url');
                                                ?>
                        <li data-thumb="<?php echo $url; ?>">
                            <div class="slider_image">
                                <img src="<?php echo $url; ?>" alt="<?php echo $alt; ?>" />
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
                                <a href="<?php echo $slide_button_url; ?>">
                                    <?php echo $slide_button_text; ?>
                                </a>
                                <?php } ?>
                            </div>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <span id='scroll_L_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_L', 'exterior')"><i class="fa fa-chevron-circle-left" aria-hidden="true"></i></span>
                    <span id='scroll_R_Arrow' class="scroll_arrow" onclick="scrollThumb('Go_R', 'exterior')"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i></span>
                </div>
                <?php endif; 
                } ?>
            </header>
            <!-- #masthead -->

            <div id="content" class="site-content">

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
        <link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:600,700|Barlow+Semi+Condensed:400,700" rel="stylesheet">
        <script defer src="https://use.fontawesome.com/releases/v5.0.12/js/all.js" integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR" crossorigin="anonymous"></script>
        <?php wp_head(); ?>
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
                <div class="navbar">
                    <div class="navbar_wrap">
                <div class="site-branding">
                    <?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
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
<!--

                                <p class="site-description">
                                                     <?php echo $team_hd_training_description; /* WPCS: xss ok. */ ?> 
                                </p>
-->

                                <?php endif; ?>
                </div>
                <!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation">
                    <button class="menu-toggle button_nav" aria-controls="primary-menu" aria-expanded="false">Menu</button>
                    <?php
			wp_nav_menu( array(
				'theme_location' => 'menu-1',
				'menu_id'        => 'primary-menu',
			) );
			?>
                </nav>
                </div>
                </div>
                <!-- #site-navigation -->
            </header>
            <!-- #masthead -->

            <div id="content" class="site-content">

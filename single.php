<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Team_HD_Training
 * @author Craig D'Arcy - Max Rep Media
 */

get_header();
            
                while ( have_posts() ) {
                    the_post();
                    if ( has_post_thumbnail() ) {
                        $hero_image_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                    } else {
                        if (function_exists('get_field')) {
                            if (get_field('news_hero_image', 21)) { 
                                    $hero_image = get_field('news_hero_image', 21); 
                                    $hero_image_url = $hero_image['url'];
                            }
                        }
                    }
                    
                    $thetitle = get_the_title();
                }

?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section id="packages_hero" class="hero_section">
                <div class="page_hero_container news_hero_container" style="background-image: url('<?php echo $hero_image_url; ?>')">
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
            <div id="single_wrapper" class="page_main_wrapper">
                <div class="news_tile_wrap">
                    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

//			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
//				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
                </div>
                <!-- .news_tile_wrap -->
                <div class="sidebar_wrapper" id="news_archive_sidebar_wrapper">
                    <?php get_sidebar(); ?>
                </div>
                <!-- #news_archive_sidebar_wrapper -->
            </div>
            <!-- #single_wrapper -->
        </main>
        <!-- #main -->
    </div>
    <!-- #primary -->

    <?php
get_footer();

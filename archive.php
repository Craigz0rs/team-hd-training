<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Team_HD_Training
 */

get_header();
if (function_exists('get_field')) {
    if (get_field('news_hero_image', 21)) { 
            $hero_image = get_field('news_hero_image', 21); 
            $hero_image_url = $hero_image['url'];
            $hero_image_id = $hero_image['id'];
            $hero_image_alt = $hero_image['alt'];
    }
}
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <section id="packages_hero" class="hero_section">
                <div class="page_hero_container news_hero_container">
                    <img class="page_hero_image" <?php ar_responsive_image($hero_image_id,'large','1600px'); ?>  alt="<?php echo $hero_image_alt; ?>" /> 
                    <div class="hero_text_overlay">
                        <div class="news_hero_title">
                            <h1 class="section_title">TEAM HD NEWS</h1>
                            				<?php
				the_archive_title( '<h2 class="news_archive_description">', '</h2>' );
//				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
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
            <header class="page-header news_archive_title">
				<?php
//				the_archive_title( '<h1 class="page-title section_title">', '</h1>' );
//				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->
            <div id="news_wrapper" class="page_main_wrapper">
                <div class="news_tile_wrap">
		<?php if ( have_posts() ) : ?>
                

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content-preview', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
                </div><!-- .news_tile_wrap -->
                <div class="sidebar_wrapper" id="news_archive_sidebar_wrapper">
                    <?php get_sidebar(); ?>
                </div>
                <!-- #news_archive_sidebar_wrapper -->
            </div><!-- .news_wrapper -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();

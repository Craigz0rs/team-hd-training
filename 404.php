<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Team_HD_Training
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div id="contact_background">
                <div class="contact_overlay"></div>
            </div>
            <div class="contact_wrapper page_404_wrapper">
			<section class="error-404 not-found">
                <div class="wrapper_404">
                    <header class="page-header">
                        <h1 class="section_title" id="404_error">404 ERROR</h1>
                        <p class=""><?php esc_html_e( 'Page not found, please try again.', 'team_hd_training' ); ?></p>
                    </header><!-- .page-header -->
                </div>
			</section><!-- .error-404 -->
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();

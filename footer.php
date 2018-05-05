<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Team_HD_Training
 * @author Craig D'Arcy - Max Rep Media
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class="site-info">
				<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Site %1$s by %2$s.', 'team_hd_training' ), '', '<a href="https://maxrepmedia.com">Max Rep Media</a>' );
				?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

    <?php if(is_front_page()) { ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <script src="<?php echo get_bloginfo( 'template_directory' ); ?>/flexslider/jquery.flexslider-min.js"></script>
        <script type="text/javascript" charset="utf-8">
          $(window).load(function() {
            $('.flexslider').flexslider();
          });
        </script>
    <?php } ?>
</body>
</html>

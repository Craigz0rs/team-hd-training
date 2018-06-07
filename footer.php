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

if (function_exists('get_field')) {
    if (get_field('instagram', 12)){ $footinstagram = get_field('instagram', 12); }
    if (get_field('facebook', 12)){ $footfacebook = get_field('facebook', 12); }
    if (get_field('youtube', 12)){ $footyoutube = get_field('youtube', 12); }  
    
}

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
        <div class="footer_wrapper">
            <div class="site-info">
                <p>
                    <?php
                    /* translators: 1: Theme name, 2: Theme author. */
                    printf( esc_html__( 'Site %1$s by %2$s', 'team_hd_training' ), '', '<a href="https://maxrepmedia.com">Max Rep Media</a>' );
                    ?>
                </p>
            </div><!-- .site-info -->
            <div class="site_copyright">
                <p>&#169; HD Training 2018<?php if(date('Y') != 2018){ echo ' - ' . date('Y'); } ?></p>
            </div><!-- .site_copyright -->
            <?php if($footinstagram || $footyoutube || $footfacebook) { ?>
            <div class="site_follow">
                                    <ul>
                                                <?php if ($footinstagram) { ?>
                                                <li><a href="<?php echo $footinstagram; ?>"><i class="fab fa-instagram"></i></a></li>
                                                <?php } 
                                                if ($footyoutube) { ?>
                                                <li><a href="<?php echo $footyoutube; ?>"><i class="fab fa-youtube-square"></i></a></li>
                                                <?php }
                                                if ($footfacebook) { ?>
                                                <li><a href="<?php echo $footfacebook; ?>"><i class="fab fa-facebook-square"></i></a></li>
                                                <?php } ?>
                                    </ul>        
            </div><!-- .site_follow -->
            <?php } ?>
        </div><!-- .footer_wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php wp_footer(); ?>

    <?php if(is_front_page()) { ?>
        <script src="<?php echo get_bloginfo( 'template_directory' ); ?>/flexslider/jquery.flexslider-min.js"></script>
        <script type="text/javascript" charset="utf-8">
//          $(window).load(function() {
//            $('.flexslider').flexslider();
//          });
            $(window).on("load", function() {
            $('.flexslider').flexslider({
                animation: "fade",
                controlNav: true,
                directionNav: true,
                pauseOnHover: true,
                pauseOnAction: true
            });
        });
        </script>
            <script src="<?php echo get_bloginfo( 'template_directory' ); ?>/js/iosviewport.js"></script>
    <?php } ?>
</body>
</html>

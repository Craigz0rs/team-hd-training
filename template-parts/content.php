<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Team_HD_Training
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
//		if ( is_singular() ) :
//			the_title( '<h1 class="entry-title">', '</h1>' );
//		else :
//			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
//		endif;

		if ( 'post' === get_post_type() ) :
			?>
            <div class="entry-meta">
                <ul class="article_meta_list">
                    <li><i class="far fa-user"></i> by <?php echo get_the_author('display_name'); ?></li>
                    <li><i class="far fa-calendar"></i> on  <?php echo get_the_date(); ?></li>
                </ul>
            </div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'team_hd_training' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'team_hd_training' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer article_footer">
        <div class="entry-meta entry_meta_single_footer">
                <ul class="article_meta_list">
                    <li><i class="far fa-user"></i> by <?php echo get_the_author('display_name'); ?></li>
                    <li><i class="far fa-calendar"></i> on  <?php echo get_the_date(); ?></li>
                </ul>
                <div class="article_category_list">
                    <strong>Posted in: </strong> <?php echo get_the_category_list('', ' '); ?>
                </div>
                <div class="article_category_list">
                    <i class="fas fa-tags"></i> <?php echo get_the_tag_list('', ' '); ?>
                </div>
        </div><!-- .entry-meta -->
<!--		<?php team_hd_training_entry_footer(); ?>-->
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

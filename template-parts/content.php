<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Team_HD_Training
 * @author Craig D'Arcy - Max Rep Media
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
            <?php
		if ( 'post' === get_post_type() ) :
			?>
                <h1 class="page-title section_title">
                    <?php echo get_the_title(); ?>
                </h1>
                <div class="entry-meta entry-meta-top">
                    <ul class="article_meta_list">
                        <li>By
                            <?php echo get_the_author('display_name'); ?>
                        </li>
                        <li>
                            <?php echo get_the_date(); ?>
                        </li>
                    </ul>
                </div>
                <!-- .entry-meta -->
                <?php endif; ?>
        </header>
        <!-- .entry-header -->
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
        </div>
        <!-- .entry-content -->
        <footer class="entry-footer article_footer">
            <div class="entry-meta entry_meta_single_footer">
                <ul class="article_meta_list">
                    <li><i class="far fa-user"></i> by
                        <?php echo get_the_author('display_name'); ?>
                    </li>
                    <li><i class="far fa-calendar"></i> on
                        <?php echo get_the_date(); ?>
                    </li>
                </ul>
                <div class="article_category_list">
                    <i class="far fa-newspaper"></i> in
                    <?php echo get_the_category_list('', ' '); ?>
                </div>
                <div class="article_category_list">
                    <i class="fas fa-tags"></i>
                    <?php echo get_the_tag_list('', ' '); ?>
                </div>
            </div>
            <!-- .entry-meta -->
        </footer>
        <!-- .entry-footer -->
    </article>
    <!-- #post-<?php the_ID(); ?> -->

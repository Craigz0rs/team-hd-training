<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="article_preview_tile">
        <?php if ( has_post_thumbnail() ) { ?>
        <div class="article_media">

            <?php 
                $thumbnail_id = get_post_thumbnail_id( $post->ID );
                $title = get_post(get_post_thumbnail_id())->post_title; 
                $alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
                $caption = get_post(get_post_thumbnail_id())->post_excerpt;   
                $description = get_post(get_post_thumbnail_id())->post_content; // The Description
            ?>
            <figure>
                <a class="article_media_link" href="<?php echo get_permalink(); ?>">
                    <img src="<?php the_post_thumbnail_url( 'medium_large' );  ?>" title="<?php echo $title ?>" alt="<?php echo $alt; ?>"/>
                </a>
            </figure>
        </div>
        <!-- .article_media -->
        <?php } ?>
        <div class="article_preview_content_wrap">
            <div class="article_excerpt_title">
                <?php
                the_title( '<h2 class="entry-title"><a class="section_title" href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); 
            ?>
            </div>
            <!-- .article_excerpt_title -->
            <div class="news_article_content">
                <div class="article_excerpt">
                    <?php
                    the_excerpt();                    
                ?>
                </div>
            </div>
            <!-- .news_article_content -->
            <div class="article_read_more">
                <a class="button2" href="<?php echo get_permalink(); ?>">READ MORE</a>
            </div>
            <footer class="article_footer">
                <?php
            if ( 'post' === get_post_type() ) : ?>
                    <div class="entry-meta">
                        <ul class="article_meta_list">
                            <li><i class="far fa-user"></i> by
                                <?php echo get_the_author('display_name'); ?>
                            </li>
                            <li><i class="far fa-calendar"></i> on
                                <?php echo get_the_date(); ?>
                            </li>
                        </ul>
                        <div class="article_category_list">
                            <i class="fas fa-tags"></i>
                            <?php echo get_the_tag_list('', ' '); ?>
                        </div>
                    </div>
                    <!-- .entry-meta -->
                    <?php
            endif; ?>
            </footer>
            <!-- .entry-footer -->
        </div>
        <!-- .article_preview_content_wrap -->
    </div>
    <!-- .article_preview_content -->
</article>
<!-- #post-<?php the_ID(); ?> -->

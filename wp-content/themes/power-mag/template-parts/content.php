<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Power_Mag
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header wow fadeIn">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url(get_permalink()). '" rel="bookmark">', '</a></h2>' );
			}

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
            <div class="pm_post_page_header_wrapper">
                    <?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?>
            </div>
            <div class="pm_singe_post_no_thumbnail">
                <div class="pm_single_post_info_wrapper">
                    <div class="category_lists">
                        <?php power_mag_colored_category(); ?>
                    </div>                 
                    <div class="post_info_wrap"> 
                        <span class="post_date">
                            <?php 
                            $time_string = sprintf( 
                                    /* translators: %1$s : description of datetime */
                            		/* translators: %2$s : description of date */
                                wp_kses_post(__('<time class="entry-date published" datetime="%1$s">%2$s</time>', 'power-mag') ),
                               esc_attr( get_the_date() ),
                               esc_html( get_the_date() )
                            );
                            printf( /* translators: %1$s : description of url */
                            		/* translators: %2$s : description of title */
                            		/* translators: %3$s : description of time */
                            wp_kses_post( __('<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'power-mag' ) ),
                               esc_url( get_permalink() ),
                               esc_attr( get_the_time() ),
                               wp_kses_post( $time_string )
                            ); ?>
                        </span>
                        <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>             
                        <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span> 
                    </div>
                </div>
            </div>
			<?php //power_mag_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content wow fadeIn">
		<?php
        
        if(is_single())
        {
            the_content();
            
            wp_link_pages( array(
                'before' => '<div class="page-links"><strong>'. esc_html__('Pages:','power-mag'),
				'after'  => '</strong></div>',
        		'link_before'      => '<span class="pm_wp_def_link">',
        		'link_after'       => '</span>',
        		'separator'        => '&nbsp;',
			) );
            
        }
        else
        {
            power_mag_add_excerpt_length( apply_filters( 'power_mag_service_excerpt_length', absint(50)) );
            the_excerpt();
            power_mag_remove_excerpt_length();
        }


			

		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer wow fadeIn">
        <?php if(is_single()):
        ?>
            <div class="tag_wrapper">
        <?php
            $posttags = get_the_tags();
            if ($posttags) {
              foreach($posttags as $tag) {
                ?>
                  <div class="tag_single_wrap"><a href="<?php echo esc_url(site_url().'/tag/'.esc_attr($tag->slug)); ?>"><?php echo esc_html($tag->name) ; ?></a></div>
              <?php
              }
            }
            ?>
            </div>
        <?php
        endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
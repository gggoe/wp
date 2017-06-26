<?php
/**
 * Template part for displaying category layout 2.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Power_Mag
 */
 
global $power_mag_cat_count;
$cat_sidebar_layout = esc_attr(get_theme_mod('power_mag_category_sidebar_setting','right-sidebar'));
if($cat_sidebar_layout == 'no-sidebar')
{
    $character_title_count = 60;
    $character_content_count = 30;
    $cat_no_sidebar = 'cat-layout2-no-sidebar';
}
else
{
    $character_title_count = 100;
    $character_content_count = 50;
    $cat_no_sidebar = '';
}
?>


<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($cat_no_sidebar)); ?>>
	<header class="entry-header">
		<?php
			

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
                <div class="pm_layout_2_header_wrapper wow fadeIn">
                    <div class="pm_layout_2_singe_post_thumbnail">
                        <div class="pm_cat_layout_2_thumb">
                            <?php if(has_post_thumbnail()){ 
                                
                            the_post_thumbnail('power-mag-hilight-thumb', array( 
            						'alt' => get_the_title(),
            						'title' => get_the_title(),  
            					));
                            
                        }
                        else
                        {
                            ?>
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/300.282.png'); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                            <?php
                        } ?> 
                        </div>
                        
    
                        <div class="pm_layout_2_single_post_info_wrapper">
                            <?php 
                            if ( is_single() ) {
                				?>
                                 <h1 class="entry-title">
                                 <?php the_title(); ?>
                                 </h1>
                                <?php
                			} else {
                				?>
                                 <h2 class="entry-title"><a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo esc_html(power_mag_excerpt(get_the_title(),absint($character_title_count))); ?></a></h2>
                                 <?php
                			}
                            ?>
    	                    <div class="category_lists">
    	                        <?php power_mag_colored_category(); ?>
    	                    </div>
                                            
    	                    <div class="post_info_wrap"> 
    	                        <span class="post_date">
    	                            <?php 
    	                            $time_string = sprintf(
                                                    /* translators: %1$s : description of datetime */
						                          /* translators: %2$s : description of date */
                                    wp_kses_post(__('<time class="entry-date published" datetime="%1$s">%2$s</time>', 'power-mag')),
    	                               esc_attr( get_the_date() ),
    	                               esc_html( get_the_date() )
    	                            );
    	                            printf(    /* translators: %1$s : description of url */
						                      /* translators: %2$s : description of title */
                                              /* translators: %3$s : description of time */ 
                                    wp_kses_post(__('<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'power-mag')),
    	                               esc_url( get_permalink() ),
    	                               esc_attr( get_the_time() ),
    	                               wp_kses_post( $time_string )
    	                            ); ?>
    	                        </span>
    	                        
    	                        <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>
    	                        
    	                        <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span> 
    	                    </div>
                            <div class="p_cat_layout_2_content_wrap">
                                 <?php
                                    power_mag_add_excerpt_length( apply_filters( 'power_mag_service_excerpt_length', absint($character_content_count)) );
                                    the_excerpt();
                                    power_mag_remove_excerpt_length();
                                ?>
                            </div>
                    </div>
                    </div> 
                </div>
            
			<?php //power_mag_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
    

	<footer class="entry-footer">
        <?php if(is_single()):
        ?>
            <div class="tag_wrapper">
        <?php
            $posttags = get_the_tags();
            if ($posttags) {
              foreach($posttags as $tag) {
                ?>
                  <div class="tag_single_wrap"><a href="<?php echo esc_url(site_url().'/tag/'.esc_attr($tag->slug)); ?>"><?php echo esc_html($tag->name); ?></a></div>
              <?php
              }
            }
            ?>
            </div>
        <?php
        endif; ?>
		<?php //power_mag_entry_footer(); 
        ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
<?php 
/** 
 * Category layout style one header
 * 
 * author @CodeTrendy
 * since version 0.0.1 
 *
 *
 * @package Power_Mag
 */
 
 global $power_mag_cat_count;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
       
			

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
            <?php
            
            // first large image 
            if($power_mag_cat_count == 1){
                ?>
                <div class="pm_cat_first_layout_1"> 
                    <div class="pm_cat_first_img">
                        <?php if(has_post_thumbnail()){ 
                              the_post_thumbnail('power-mag-cat-1-banner', array( 
            						'alt' => get_the_title(),
            						'title' =>get_the_title(), 
            					));
                            
                            
                        }
                        else{
                            ?>
                            
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/600into564.png') ; ?>"  alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                        <?php
                    }
                     ?>
                     <div class="pm_bg"></div>
                     </div> 
                     <div class="pm_cat_first_info">
                        <div class="category_lists">
                            <?php power_mag_colored_category(); ?>
                        </div>
                     </div>
                     <div class="pm_cat_first_info_box">
                         <?php 
                         if ( is_single() ) {
            				the_title( '<h1 class="entry-title">', '</h1>' );
            			} else {
            				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            			}
                          ?>
                        <div class="pm_cat_first_info_wrap"> 
    	                        <?php do_action('power_mag_home_posted_on'); ?>
    	                        
    	                        <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>
    	                        
    	                        <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span> 
                        </div>
                    </div>
                </div>
                <?php
            }
            elseif($power_mag_cat_count <= 5 )
            {
                ?>
                <div class="pm_cat_four">
                    <div class="pm_cat_four_img">
                    <?php if(has_post_thumbnail()){ 
                           the_post_thumbnail('power-mag-hilight-thumb', array( 
        						'alt' => get_the_title(),
        						'title' => get_the_title(), 
        					));
                        
                        
                    }
                    else{
                        ?>
                        <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/300.282.png') ; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                        <?php
                    }
                     ?><div class="pm_bg"></div>
                     </div>
                     <div class="pm_cat_four_info">
                        <div class="category_lists">
                            <?php  power_mag_colored_category(); ?>
                        </div>
                         </div>
                         <div class="pm_cat_first_info_box">
                         <?php
                         if ( is_single() ) {
            				the_title( '<h1 class="entry-title">', '</h1>' );
            			} else {
            				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            			}
                         ?>
                         <div class="pm_cat_four_info_wrap"> 
                            <?php do_action('power_mag_home_posted_on'); ?>
                            
                            <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>
                            
                        </div>
                    </div>
                </div>
                <?php
            }
             ?>
			<?php //power_mag_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->
</article><!-- #post-## -->
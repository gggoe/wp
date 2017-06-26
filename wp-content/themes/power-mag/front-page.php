<?php 
/** 
 * 
 * Template to show front page
 * 
 * @package powermag
 */
 get_header();

?>
<?php
if( get_option( 'show_on_front' ) == 'posts' )
{
    $default_sidebar_layout = esc_attr(get_theme_mod('power_mag_default_sidebar_setting', 'right-sidebar')); 
    ?>
    <?php if($default_sidebar_layout ==  'left-sidebar' && is_active_sidebar('left-sidebar')): ?>
        <aside id="secondary" class="widget-area" role="complementary">
    	   <?php dynamic_sidebar('left-sidebar'); ?>
        </aside><!-- #secondary -->
    <?php endif; ?>
 	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php
			endif;

			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

    <?php
    if($default_sidebar_layout == 'right-sidebar'):
        get_sidebar();
    endif;
}
else
{
    ?>
    	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post();
            
            $power_mag_header_trending_activate = absint(get_theme_mod('power_mag_header_trending_activate',1));
            $power_mag_recent_posts_activate = absint(get_theme_mod('power_mag_home_recent_posts_activate',1));
               
            if($power_mag_header_trending_activate == 1)
            {
               power_mag_trending_news();
            }
            
            $sticky = get_option( 'sticky_posts' );
            if ( !empty( $sticky ) ) {  // don't show anything if there are no sticky posts
                $args = array(
                    'posts_per_page' => -1,  // show all sticky posts
                    'post__in'  => $sticky
                );
                $query = new WP_Query( $args );
                while ( $query->have_posts() ) {
                    $query->the_post();
                    // display your sticky post here (however you like to do it)
                    get_template_part( 'template-parts/content', get_post_format() );
                }
                wp_reset_postdata();
            }
           
                
                            
           
            ?>
            <div class="pm_hilight_area_wrapper"> 
                <?php
                if(is_active_sidebar('home-header-left-area')):
                    ?>
                    <div class="pm_home_header_left_area">
                    
                        <?php dynamic_sidebar('home-header-left-area'); ?>
                        
                    </div>
                    <?php
                endif;
                    
                if(is_active_sidebar('home-header-right-area')):
                    ?>
                    <div class="pm_home_header_right_area">
                    
                        <?php dynamic_sidebar('home-header-right-area'); ?>
                    
                    </div>
                    <?php
                endif;
                ?> 
            </div>
            <?php
            if(is_active_sidebar('home-top-content-area') || is_active_sidebar('home-top-sidebar')):
            ?>
            
            <div class="pm_home_top_content_sidebar_section"> 
            <?php
            endif;
            ?>
            <div class="pm_home_top_content_area">
            <?php
            if(is_active_sidebar('home-top-content-area')):
                ?>
                    <?php dynamic_sidebar('home-top-content-area'); ?>
                    <?php
                endif;
                    
                
                if(is_active_sidebar('home-bottom-left-content-area') || is_active_sidebar('home-bottom-right-content-area')){
                    ?>
                    <div class="pm_home_both_column_wrapper">
                    <?php
                }
                
                if(is_active_sidebar('home-bottom-left-content-area')):
                    ?>
                    <div class="pm_home_bottom_left_content_area ">
                        <?php dynamic_sidebar('home-bottom-left-content-area'); ?>
                    </div>
                    <?php
                endif;
                
                
                if(is_active_sidebar('home-bottom-right-content-area')):
                    ?>
                    <div class="pm_home_bottom_right_content_area">
                            <?php dynamic_sidebar('home-bottom-right-content-area'); ?>
                    </div>
                    <?php
                endif;
                
                if(is_active_sidebar('home-bottom-left-content-area') || is_active_sidebar('home-bottom-right-content-area')){
                    ?>
                    </div>
                    <?php
                }
                
                
                if(is_active_sidebar('home-bottom-content-area')){
                    
                    dynamic_sidebar('home-bottom-content-area');
                    
                }
                
                
                if($power_mag_recent_posts_activate == 1):
                $number_recent_post = absint(get_theme_mod('power_mag_home_recent_posts_number_setting'));
                ?>
                    <div class="pm_home_recent_posts">
                        <div class="featured_layout_2_title_wrapper widget_title_wrapper wow fadeIn">
                        	<h2 class="widget-title"> <span><?php esc_html_e('Recent Articles', 'power-mag');?></span> </h2>
                            <div class="pm_view_all"><a href="#"><i class="fa fa-paper-plane" aria-hidden="true"></i></i><?php ?></a></div>   
                        </div>
                        <div class="ppm_recent_posts_wrap">
                        <?php
                            $recent_post_args = array('post-type' => 'post',
                                                        'post_status' => 'publish',
                                                        'posts_per_page' => absint($number_recent_post),
                                                        'ignore_sticky_posts' => true,
                                                        );
                            $recent_posts_query = new WP_Query($recent_post_args);
                            
                            while($recent_posts_query->have_posts()): $recent_posts_query->the_post();
                                ?>
                                <div class="pm_ho_recent_post_single_wrap wow fadeIn">
                                <div class="pm_ho_recent_post_single_image_cat_wrap">
                                    <?php
                                    if (has_post_thumbnail() != '') {
                            
                                    ?>
                                    <div class="recent_post_thumbnail_big">
                                        <?php
                                          the_post_thumbnail('power-mag-widget-large', array( 
                        						'alt' => get_the_title(),
                        						'title' => get_the_title(), 
                        					));
                                        ?>
                                    </div>
                                    <?php
                                    } 
                                    else {
                                        ?>
                                        <div class="recent_post_thumbnail_big">
                                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/426into220.png'); ?>" alt="<?php the_title(); ?>" />
                                        </div>
                                        <?php
                				    }
                                    ?>
                                    <div class="category_lists">
                                        <?php power_mag_colored_category(); ?>
                                    </div>
                                </div>
                                <div class="pm_recent_title">
                                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                </div>
                                <div class="pm_recent_single_info_wrap">
                                    <?php  do_action('power_mag_home_posted_on'); ?>
                                    <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>
                                    <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span>        
                                </div>
                                </div>
                                <?php
                                
                            endwhile;
                            wp_reset_postdata();
                        ?>
                        </div>
                    </div>
                <?php
                endif;
                    ?>
                </div>
                <?php

            if(is_active_sidebar('home-top-sidebar')):
                ?>
                <div class="pm_home_top_sidebar">
                    <?php dynamic_sidebar('home-top-sidebar'); ?>
                </div>
                <?php
            endif;
            
            if(is_active_sidebar('home-top-content-area') || is_active_sidebar('home-top-sidebar')):
            ?> 
            </div>
            <?php
            endif;

			endwhile; // End of the loop.
            wp_reset_postdata();
			?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php

}

get_footer();
 ?>
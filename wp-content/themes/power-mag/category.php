<?php
/**
 * The template for displaying category pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Power_Mag
 */

get_header(); 

$cat_sidebar_layout = esc_attr(get_theme_mod('power_mag_category_sidebar_setting','right-sidebar'));
?> 
    <?php 
       // global $cat;
        $default_post_count = get_option( 'posts_per_page' );
        $layout = esc_attr(power_mag_category_layout(absint($cat)));        
        $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
        $args = array( 
            'post_type' => 'post',
            'cat'=> absint($cat),
            'posts_per_page'=>absint($default_post_count),
            'post_status'=>'publish',
            'order'=>'DESC',
            'paged'=> absint($paged)
             );

        $query = new WP_Query( $args );
        
        if($query->have_posts()) : 
        global $power_mag_category_post_count;
        $category_post_cnt = get_category(absint($cat));
        $power_mag_category_post_count = $category_post_cnt->category_count;
        
        
        global $power_mag_cat_count;
        $power_mag_cat_count = 1;
        $category_name = $category_post_cnt->name;
        ?>
        
		
        <header class="entry-header wow fadeIn">
        <h1 class="entry-title pm-catid-<?php echo absint($category_post_cnt->cat_ID); ?>" ><?php the_archive_title(); ?></h1>
        </header>
        <div class="pm_cat_<?php echo esc_attr($layout) ; ?>_banner">
            <?php while ( $query->have_posts() ) : $query->the_post(); 
                    if($layout == 'layout-1'){
                        if($query->post_count>5)
                        {
                            
                        if($power_mag_cat_count == 1){
                            ?>
                            <div class="pm_cat_banner_left_wrapper wow fadeIn">
                            
                                <?php get_template_part('category-layouts/category-header/cat-layout-1-header',get_post_format()); ?>
                            </div>
                            <?php
                        }
                        else{
                            
                            if($power_mag_cat_count == 2){
                                ?>
                                <div class="pm_category_banner_right_wrapper wow fadeIn">
                                <?php
                            }
                            get_template_part('category-layouts/category-header/cat-layout-1-header',get_post_format());
                            
                            if($power_mag_cat_count == 5 || $power_mag_category_post_count == $power_mag_cat_count || $power_mag_cat_count == $query->post_count ){
                                ?>
                                </div>
                                <?php
                            }
                        }
                        
                        $power_mag_cat_count++;
                        //beak loop after 5 posts
                        if($power_mag_cat_count == 6)
                            break;
                    }
                    }
                    elseif($layout == 'layout-2')
                    {                                               
                        if($query->post_count>3)
                        {                                                
                            ?>
                            <div class="pm_layout_2_banner wow fadeIn">
                            <?php get_template_part('category-layouts/category-header/cat-layout-2-header',get_post_format()); ?>
                            </div>
                            <?php
                            $power_mag_cat_count++;
                            //break after 3 loops
                            if($power_mag_cat_count == 4)
                                break;
                        }                                                                
                    }
                    
                    ?>
            <?php endwhile;
                wp_reset_postdata();
             ?>
        </div>
    <?php
    else :

			get_template_part( 'template-parts/content', 'none' );    
    endif;
    ?>
    <?php 
    
    //left sidebar
    if($cat_sidebar_layout == 'left-sidebar' && is_active_sidebar('left-sidebar')):
        ?>
        <aside id="secondary" class="widget-area" role="complementary">
	       <?php dynamic_sidebar('left-sidebar'); ?>
        </aside><!-- #secondary -->
        <?php
    endif; 
    
    ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		if ( $query->have_posts() ) { ?>
        
            <div class="pm_cat_header_wrapper">
			<?php
            if($layout == 'layout-1'){
                
                    ?>
                    <div class="pm_layout_1_content_wrapper">                
                    <?php
                    if($power_mag_cat_count >=6 || $power_mag_cat_count==1){
            			/* Start the Loop */
                        $cat_count_second = 1;
                        ?>
                        <?php
            			while ( $query->have_posts() ) : $query->the_post();
                            /*
            				 * Include the Post-Format-specific template for the content.
            				 * If you want to override this in a child theme, then include a file
            				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
            				 */
                                 
            				get_template_part( 'category-layouts/ccategory-layout-1', get_post_format() );
                            
                            $power_mag_cat_count++;
            			endwhile;
                        }               
                        ?>
                        </div>                
                        <?php
                                                              
            }
            
                                                
            
            if($layout == 'layout-2'){
                
                ?>
                <div class="pm_layout_2_content_wrapper">                
                <?php
                if($power_mag_cat_count >= 4 || $power_mag_cat_count==1){
        			/* Start the Loop */
                    $cat_count_second = 1;
                    ?>
                    <?php
        			while ( $query->have_posts() ) : $query->the_post();
                        /*
        				 * Include the Post-Format-specific template for the content.
        				 * If you want to override this in a child theme, then include a file
        				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        				 */
                         
        				get_template_part( 'category-layouts/category-layout-2', get_post_format() );
        				
        				/*
        				 * Include the Post-Format-specific template for the content.
        				 * If you want to override this in a child theme, then include a file
        				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
        				 */
                        
        			endwhile;
                    }
            
            ?>
            </div>            
            <?php
                                    
            }

        }
		else {
                    echo esc_html_e("This is all we have now!! please visit us again for more future news",'power-mag');
                }
                
        ?>

        
        <div class="paginate">            
            <?php
          $big = 999999999; // need an unlikely integer
            
            echo wp_kses_post( paginate_links( array(
            	'base' => esc_url_raw(str_replace( absint($big), '%#%', esc_url( get_pagenum_link( absint($big) ) ) )),
            	'format' => '?paged=%#%',
            	'current' => max( 1, get_query_var('paged') ),
            	'total' => absint($query->max_num_pages)
            ) ) );
            
            ?>
          </div>
          
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if($cat_sidebar_layout == 'right-sidebar'):
    get_sidebar();
endif;
get_footer();

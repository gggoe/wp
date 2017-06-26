<?php
/**
 * Hilight Posts widget
 *
 * @package Power Mag Since 1.0.0
 */

add_action('widgets_init', 'power_mag_hilighted_widget');

function power_mag_hilighted_widget() {
    register_widget('power_mag_hilighted');
}


/**
 * Recent portfolio Widget Class
 */
class Power_Mag_Hilighted extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 'power_mag_hilighted', 
			'description' => __('Best for Home Page Header Left and Right area', 'power-mag') 
		);
		
		parent::__construct('power_mag_hilighted', '&nbsp;' . __('PM - Hilighted Widget', 'power-mag'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		$category = isset($instance['category']) ? $instance['category'] : '';
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent portfolio', 'power-mag') : $instance['title'], $instance, $this->id_base);
		
		$number = isset($instance['number']) ? $instance['number'] : '';
        
        $layout = isset($instance['layout']) ? $instance['layout'] : 'hilight-layout-1';
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
        
        $queryArgs = array( 
			'posts_per_page' => absint($number), 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => true, 
			'post_type' => 'post', 
            'cat' => absint($category)
		);
		
		
        $lt = new WP_Query($queryArgs);
        
        if ($lt->have_posts()) { 
			echo  wp_kses_post($before_widget);
            ?> 
			<div class="widget_hilight_container <?php echo esc_attr($layout); ?>">
            <div class="hilight_title widget_title_wrapper">
    			<?php
    			if ($title) {
    			 ?>
    			 <h2 class="widget-title"><span class="pm-catid-background-<?php echo absint($category); ?>"><?php echo esc_html($title); ?> </span></h2>
    			<?php
                }
                if($category != ''):
                $cat_slug = get_category( $category );
                ?>
                    <div class="pm_view_all"><a href="<?php echo esc_url(site_url().'/category/' . esc_attr($cat_slug->slug)) ; ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></i></a></div>
                <?php
                endif;
                 ?>
            </div>
			<?php
			
			
			$count = 1;
            
            
            
            while ($lt->have_posts()) : $lt->the_post();
                // class for small thumbnail
                if($layout == 'hilight-layout-1'){
                    if($count > 1){
                        $small_class = 'hilight_thumbnail_wrapper_small';
                    }
                    else
                    {
                        $small_class = '';
                    }
                }
                else{
                    if($count != $number)
                    {
                        $small_class = 'hilight_thumbnail_wrapper_small';
                    }
                    else
                    {
                        $small_class = '';
                    }
                }
            
                ?>
                <div class="hilight_thumbnail_wrapper wow fadeIn <?php echo esc_attr($small_class); ?>">
                
                
                <?php
                if($layout == 'hilight-layout-1')
                {
                    
                if($count == 1 ){
                    
                if (has_post_thumbnail()) {
                    
                    ?>
                    <div class="hilight_thumbnail_big">
                        <?php
                           the_post_thumbnail('power-mag-hilight-large', array( 
        						'alt' => get_the_title(),
        						'title' => get_the_title(), 
        					));
                        ?>
                        <div class="pm_bg"></div>

                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="hilight_thumbnail_big">
                        
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/600into282.png'); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />


                            <div class="pm_bg"></div>
                        </div>
                        <?php
				    }
                }
                else
                {
                    if (has_post_thumbnail() ) {
                    ?>
                    <div class="hilight_thumbnail_small">
                        <?php
                           the_post_thumbnail('power-mag-hilight-thumb', array( 
        						'alt' => get_the_title(),
        						'title' => get_the_title(), 
        					));
                        ?>

                        <div class="pm_bg"></div>
                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="hilight_thumbnail_small">
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/300.282.png'); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />

                            <div class="pm_bg"></div>
                        </div>
                        <?php
				    }
                }
                ?>
                
                <div class="hilight_info_wrapper">
                
    				<div class="category_lists">
                        <?php  power_mag_colored_category(); ?>
                    </div>
                    <div class="post_info_wrap">
                        <span class="post_date">
                            <?php ;
                            $time_string = sprintf( 
                                /* translators: %1$s : description of datetime */
                            		/* translators: %2$s : description of date */
                                wp_kses_post(__('<time class="entry-date published" datetime="%1$s">%2$s</time>', 'power-mag')),
                               esc_attr( get_the_date() ),
                               esc_html( get_the_date() )
                            );
                            printf( /* translators: %1$s : description of url */
                            		/* translators: %2$s : description of title */
                            		/* translators: %3$s : description of time */
                            wp_kses_post( __('<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'power-mag') ),
                               esc_url( get_permalink() ),
                               esc_attr( get_the_time() ),
                               wp_kses_post( $time_string )
                            ); ?>
                        </span>
                        <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>
                        <?php 
                        if($count == 1):
                        ?>
                         <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span>
                         <span class="post_views"></span>
                         <?php
                         endif;
                          ?>
                        
                    </div>
                    <div class="post_title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </div>
    				
    				</div>
                
                <?php
            }
                
                //for last image
                
                
            if($layout == 'hilight-layout-2')
            {    
                if($count == $number){
                    
                if (has_post_thumbnail()) {
                    
                    ?>
                    <div class="hilight_thumbnail_big">
                        <?php
                           the_post_thumbnail('power-mag-hilight-large', array( 
        						'alt' => get_the_title(),
        						'title' => get_the_title(), 
        					));
                        ?>

                        <div class="pm_bg"></div>

                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="hilight_thumbnail_big">
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/600into282.png'); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />

                            <div class="pm_bg"></div>
                        </div>
                        <?php
				    }
                }
                else
                {
                    if (has_post_thumbnail() ) {
                    ?>
                    <div class="hilight_thumbnail_small">
                        <?php
                           the_post_thumbnail('power-mag-hilight-thumb', array( 
        						'alt' => get_the_title(),
        						'title' => get_the_title(),   
        					));
                        ?>

                        <div class="pm_bg"></div>
                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="hilight_thumbnail_small">
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/300.282.png'); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />

                        <div class="pm_bg"></div>
                        </div>
                        <?php
				    }
                }
                ?>
                
                <div class="hilight_info_wrapper">
                
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
                            printf( /* translators: %1$s : description of url */
                            		/* translators: %2$s : description of title */
                            		/* translators: %3$s : description of time */                           
                            wp_kses_post( __('<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'power-mag') ),
                               esc_url( get_permalink() ),
                               esc_attr( get_the_time() ),
                               wp_kses_post( $time_string )
                            ); ?>
                        </span>
                        <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author() ; ?></a></span>
                        
                        <?php if ($count == $number): ?>
                             <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span>
                            <span class="post_views"></span>
                        <?php 
                        endif;
                         ?>
                    </div>
                    <div class="post_title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                        </div>
    				</div>
                
                <?php
             }   
                
                ?>
                </div>
                <?php
                $count++;
			endwhile;
			?>
        </div>
        <?php  
		echo wp_kses_post( $after_widget ); 
        }
		
		wp_reset_postdata();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = absint($new_instance['category']);
        $instance['number'] = absint($new_instance['number']);
        $instance['layout'] = esc_attr($new_instance['layout']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? $instance['number'] : 3;
        $category = isset($instance['category']) ? $instance['category'] : '';
        $layout = isset($instance['layout']) ? $instance['layout'] : 'hilight-layout-1'; 

        ?>
        <p>
            <label><?php esc_html_e('Layouts', 'power-mag'); ?> <br />
                <label><?php esc_html_e('Layout 1', 'power-mag'); ?>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('layout-1')); ?>" name="<?php echo esc_attr($this->get_field_name('layout')); ?>" type="radio" value="hilight-layout-1" <?php checked( $layout, esc_attr('hilight-layout-1') ); ?> />
                </label>
                
                <label><?php esc_html_e('Layout 2', 'power-mag'); ?>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id('layout-2')); ?>" name="<?php echo esc_attr($this->get_field_name('layout')); ?>" type="radio" value="hilight-layout-2" <?php checked( $layout, esc_attr('hilight-layout-2') ); ?> />
                </label>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'power-mag'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ; ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title) ; ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('category')); ?>"><?php esc_html_e('Choose Category', 'power-mag'); ?>:<br />
                <select id="<?php echo esc_attr($this->get_field_id('category')); ?>" name="<?php echo esc_attr($this->get_field_name('category')); ?>" class="widefat">
                    <option value=""><?php esc_html_e('Select Category', 'power-mag'); ?>&nbsp;</option>
				    <?php 
					$tl_categs = get_categories( 'orderby=name&hide_empty=0' );
                    
					
					if (sizeof($tl_categs) > 0) {
						foreach($tl_categs as $tl_categ) {
						      ?>
							 <option value="<?php echo absint($tl_categ->cat_ID); ?>" <?php selected( absint($category), absint($tl_categ->cat_ID) ); ?> > <?php echo esc_attr($tl_categ->name); ?> &nbsp;</option>
                             <?php
						}
					}
				?>
                </select>
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')) ; ?>"><?php esc_html_e("Enter the number of post you'd like to display", 'power-mag'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')) ; ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo absint($number); ?>" size="<?php echo absint(3); ?>" />
                <small class="s_red"><?php esc_html_e('default is 3', 'power-mag'); ?></small><br />
            </label>
        </p>
        
        <?php
    }
}         
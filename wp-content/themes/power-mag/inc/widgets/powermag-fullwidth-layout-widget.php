<?php
/**
 * Featured Posts Full Width Layout widget
 *
 * 
 * @package Power Mag Since 1.0.0
 */

add_action('widgets_init', 'power_mag_featured_fullwidth_widget');

function power_mag_featured_fullwidth_widget() {
    register_widget('Power_mag_featured_fullwidth');
}


/**
 * Powermag featured layout 2 Widget Class
 */
class Power_Mag_Featured_Fullwidth extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 'power_mag_featured_fullwidth', 
			'description' => __('Best for Home Page Top and Bottom Content Area', 'power-mag') 
		);
		
		parent::__construct('power_mag_featured_fullwidth', __('&nbsp;PM - Featured FullWidth Widget', 'power-mag'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
		$category = isset($instance['category']) ? $instance['category'] : '';
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		
		$number = isset($instance['number']) ? absint($instance['number']) : '';
        
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 2) {
            $number = 2;
        } elseif ($number > 25) {
            $number = 25;
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
			echo wp_kses_post($before_widget);
            ?> 
			<div class="widget_fullwidth_featured_layout_container ">
            <div class="fullwidth_featured_layout_title_wrapper widget_title_wrapper wow fadeIn">
    			<?php
                $color_code = power_mag_category_color($category);
    			if ($title) { 
    				?>
                    <h2 class="widget-title"><span class="pm-catid-background-<?php echo absint($category); ?>" ><?php echo esc_html($title); ?></span></h2>
    			<?php
                }
                if($category != ''):
                $cat_slug = get_category( $category );
                
                ?>
                    <div class="pm_view_all"><a href="<?php echo esc_url(site_url().'/category/' . esc_attr($cat_slug->slug)); ?>"><i class="fa fa-paper-plane" aria-hidden="true"></i></i></a></div>
                <?php
                endif;
                 ?>
            </div>
            <div class="owl-carousel owl-theme wow fadeIn">
            <?php
			
			$count = 1;
            while ($lt->have_posts()) : $lt->the_post();
                ?>
                <div class="item featured_fullwidth_layout_thumbnail_wrapper">
                <?php
                    
                if (has_post_thumbnail()) {
                    if(!empty($pm_fullwidth_iamge[0]))
                    {
                        ?>
                              <div class="featured_fullwidth_layout_thumbnail">
                                    <?php
                                    $pm_fullwidth_iamge = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'power-mag-widget-large-2'); 
                                       
                                    ?>
                                    <img src="<?php echo esc_url($pm_fullwidth_iamge[0]) ; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                    <div class="pm_bg"></div>
                                </div>
                        
                        <?php
                    }
                   
                    } else {
                        ?>
                        <div class="featured_fullwidth_thumbnail_big">
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/426into256.png') ; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                        <div class="pm_bg"></div>
                        </div>
                        <?php
				    }

                ?>
                    <div class="pm_featured_fullwidth_info_wrapper">
                        <div class="category_lists">
                            <?php power_mag_colored_category(); ?>
                        </div>
                        <span class="post_date">
                            <?php 
                            $time_string = sprintf( 
                                /* translators: %1$s : description of datetime */
                                /* translators: %2$s : description of date */
                                wp_kses_post(__('<time class="entry-date published" datetime="%1$s">%2$s</time>', 'power-mag')),
                               esc_attr( get_the_date() ),
                               esc_html( get_the_date() )
                            );
                            printf( 
                            /* translators: %1$s : description of url */
                            /* translators: %2$s : description of title */
                            /* translators: %3$s : description of time */
                            wp_kses_post( __('<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'power-mag' ) ),
                               esc_url( get_permalink() ),
                               esc_attr( get_the_time() ),
                               wp_kses_post($time_string)
                            ); ?>
                        </span>
                        <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>         
                        <div class="pm_featured_fullwidth_title">
                            <h6><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
                        </div>
    				</div>
                </div>
                <?php
                
                $count++;
			endwhile;
			?>

        </div>
        </div>
        <?php  
		echo wp_kses_post($after_widget); 
        }
		
		wp_reset_postdata();
    }
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['category'] = absint($new_instance['category']);
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 5;
        $category = isset($instance['category']) ? $instance['category'] : ''; 

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')) ; ?>"><?php esc_html_e('Title', 'power-mag'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ; ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php esc_attr($this->get_field_id('category')) ; ?>"><?php esc_html_e('Choose Category', 'power-mag'); ?>:<br />
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
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of post you'd like to display", 'power-mag'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')) ; ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo absint($number); ?>" size="<?php esc_html__('3', 'power-mag'); ?>" />
                <small class="s_red"><?php esc_html_e('default is 5', 'power-mag'); ?></small><br />
            </label>
        </p>
        <?php
    }
}
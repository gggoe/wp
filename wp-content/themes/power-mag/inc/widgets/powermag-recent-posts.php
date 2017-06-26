<?php
/**
 * Recent Posts widget
 *
 * 
 * @package Power Mag Since 1.0.0
 */

add_action('widgets_init', 'power_mag_register_recent_posts_widget');

function power_mag_register_recent_posts_widget() {
    register_widget('Power_mag_recent_posts');
}


/**
 * Powermag Recent Posts Widget Class
 */
class Power_Mag_Recent_Posts extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 'power_mag_recent_posts', 
			'description' =>__('Displays Recent Posts and Random Posts', 'power-mag') 
		);
		
		parent::__construct('power_mag_recent_posts', esc_html__('&nbsp;PM - Recent and Random Posts', 'power-mag'), $widget_ops);
	}
	
    function widget($args, $instance) {
		extract($args);
        
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);
		
		$number = isset($instance['number']) ? absint($instance['number']) : '';
        
        $randomize = isset($instance['randomize']) ? absint($instance['randomize']) : '';

        if($randomize == 1)
        {
            $order_by = 'rand';
        }
        else
        {
            $order_by = 'desc';
        }
        
		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } 
        
        $queryArgs = array( 
			'posts_per_page' => absint($number), 
			'post_status' => 'publish', 
			'ignore_sticky_posts' => true, 
			'post_type' => 'post', 
            'orderby' => esc_html($order_by)
		);
		
		
        $lt = new WP_Query($queryArgs);

        
        if ($lt->have_posts()) { 
			echo wp_kses_post( $before_widget );
            ?> 
			<div class="recent_random_container ">
            <div class="recent_random_title_wrapper widget_title_wrapper wow fadeIn">
    			<?php
    			if ($title) { 
    				echo wp_kses_post( $before_title ) . esc_html($title) . wp_kses_post( $after_title );
    			}
                ?>
            </div>
            <?php
			
            while ($lt->have_posts()) : $lt->the_post();
                ?>
                <div class="one_column_layout_2_thumbnail_wrapper wow fadeIn">
                <?php
                                    
                    if (has_post_thumbnail()) {
                    ?>
                    <div class="recent_random_thumbnail_small">
                        <?php
                           the_post_thumbnail('thumbnail', array( 
        						'alt' => get_the_title(),
        						'title' => get_the_title(), 
        					));
                        ?>
                    </div>
                    <?php
                    } else {
                        ?>
                        <div class="recent_random_thumbnail_small">
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/150into150.png') ; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                        </div>
                        <?php
				    }
                    ?>
                    
                    <div class="recent_random_title">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </div>
                    <div class="recent_random_info_wrapper">
                        <?php do_action('power_mag_home_posted_on'); ?>
                        <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span>    
                    </div>
                </div>
                <?php
                
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
        $instance['number'] = absint($new_instance['number']);
        $instance['randomize'] = absint($new_instance['randomize']);
		
		return $instance;
	}
	
    function form($instance) {
        $title = isset($instance['title']) ? $instance['title'] : '';
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        $randomize = (isset($instance['randomize'])) ? absint($instance['randomize']) : '';

        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title', 'power-mag'); ?>:<br />
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('randomize')); ?>"><?php esc_html_e('Randomize', 'power-mag'); ?>: 
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id('randomize')); ?>" name="<?php echo  esc_attr($this->get_field_name('randomize')); ?>" type="checkbox" value="<?php echo absint(1); ?>" <?php checked( $randomize, 1 ); ?> />
            </label>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of post you'd like to display", 'power-mag'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo absint($number); ?>" size="<?php absint(3); ?>" />
                <small class="s_red"><?php esc_html_e('default is 3', 'power-mag'); ?></small><br />
            </label>
        </p>
        <?php
    }
}
<?php

/**
 * Posts Tabs widget
 *
 * @package power_mag Since 1.0.0
 */

add_action('widgets_init', 'power_mag_register_post_tab_widget');

function power_mag_register_post_tab_widget() {
    register_widget('power_mag_posts_tabs');
}

/**
 * Posts Tabs Widget Class
 */
class Power_Mag_Posts_Tabs extends WP_Widget {
	function __construct() {
		$widget_ops = array( 
			'classname' => 'widget_custom_posts_tabs_entries', 
			'description' => __('Latest & recent comments', 'power-mag') 
		);
		
		parent::__construct('custom-posts-tabs',__('&nbsp;PM - Posts Tabs', 'power-mag'), $widget_ops);
	}
	
	function widget($args, $instance) {
		extract($args);
        
		$latest = isset($instance['latest']) ? $instance['latest'] : true;
		$recent = isset($instance['recent']) ? $instance['recent'] : true;
		$number = isset($instance['number']) ? $instance['number'] : '';

		
        if (empty($instance['number']) || !$number = absint($instance['number'])) {
            $number = 3;
        } elseif ($number < 1) {
            $number = 1;
        } elseif ($number > 15) {
            $number = 15;
        }
		
         
		echo wp_kses_post( $before_widget );
		
		?>
        <div class="tab lpr cc_recent_popular_post1"> 
		  <ul class="tabs active wow fadeIn cc-tabs cc-widget-title">
		
        <?php
		if ($latest) {
			?>
            
            <li class="latest current cp-tabs-link" data-tab="tab-1">
				<span > <?php esc_html_e('Latest', 'power-mag'); ?> </span> 
			</li>
            <?php
		}
		
		
		
		if ($recent) {
		  ?>
			
            <li class="comments cp-tabs-link" data-tab="tab-2"> 
				<span><?php esc_html_e('Comments', 'power-mag'); ?> </span> 
			</li>
            
            <?php
		}
		
		if (!$latest && !$recent) {
			?>
            
            <li> 
				<span><?php esc_html_e('Latest', 'power-mag'); ?></span> 
			</li>
            
            <?php
		}
		?>
        
		</ul> 
		
 
		
        <?php
		if ($latest) {
			$l = new WP_Query(array( 
				'posts_per_page' => absint($number), 
				'post_status' => 'publish', 
				'ignore_sticky_posts' => true, 
				'post_type' => 'post' 
			));
			
			if ($l->have_posts()) { 
				?>
                
                <div class="tabs_tab tab-content tab_latest current content-tab-1"> 
					<ul class="pm_latest_content">
                    
				<?php
				while ($l->have_posts()) : $l->the_post();
					
					?>
					
					<li>
                        
                        <div class="pm_tab_single_wrapper wow fadeIn">
					
                        <div class="pm_latest_thumbnail_wrap">
						
                        <?php
                        
						if (has_post_thumbnail()) {
							
                           $power_mag_image_thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'thumbnail');
                            the_post_thumbnail('thumbnail', array( 
        						'alt' => get_the_title(),
        						'title' => get_the_title(), 
        					));
                           
						}
                        else
                        {
                            ?>
                            <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/150into150.png') ; ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                            <?php
                        } 
						?>
						</div>

					   <div class="ovh">
                       
                            <div class="pm_post_tab_title">
                            
                                <a href="<?php the_permalink(); ?>">
                                <?php
                                    power_mag_add_excerpt_length( apply_filters( 'power_mag_service_excerpt_length', absint(5)) );
                                    the_excerpt();
                                    power_mag_remove_excerpt_length();
                                ?>
                            </a>
                            
                            </div> 
                            
                            <div class="pm_post_info_wrap">
                            
                                <span class="post_author"><i class="fa fa-user"></i><a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php the_author(); ?>"><?php the_author(); ?></a></span>
                        
                                <span class="post_comments"><i class="fa fa-comment"></i><?php comments_popup_link( '0', '1', '%' );?></span>
                            </div>
					
					   </div> 
                       
                       </div>
                        
					</li>
                    <?php
				endwhile;
				?>
				</ul> 
				</div>
                
                <?php
			}
			
			wp_reset_postdata();
		}
		
		
		if ($recent) {
			$rcomments = get_comments(array( 
				'number' => absint($number), 
				'post_type' => 'post', 
				'status' => 'approve' 
			));
			
			if ($rcomments) { 
				?>
                <div class="tabs_tab tab-content tab_comments content-tab-2" <?php if($latest) {?>style="display: none;" <?php } ?>> 
					<ul>
				
                <?php
				foreach ($rcomments as $comment) {
					$comment_post_ID = $comment->comment_post_ID;
					$comment_author = $comment->comment_author;
					$comment_author_url = $comment->comment_author_url;
					$comment_date = mysql2date('U', $comment->comment_date, false);
					$comment_content = $comment->comment_content;
					$comment_array = explode(' ', $comment_content);
					
					if (sizeof($comment_array) > 10) {
						$new_comment_content = '';
						
						for ($i = 0; $i < 10; $i++) {
							$new_comment_content .= $comment_array[$i] . ' ';
						}
						
						$new_comment_content = trim($new_comment_content) . '...';
					} else {
						$new_comment_content = $comment_content;
					}
					?>
                    
					<li> 
                    <?php
                    echo esc_html( $comment_author ).' '.'<span class="color_2">'.esc_html('on','power-mag').'</span>'.' ';
                    echo  the_title( '<a href="' . esc_url(get_permalink($comment_post_ID)). '" rel="bookmark">', '</a>' );
                    
					power_mag_home_posted_on_cb(absint($comment->comment_ID));
                       ?>
                       
                    <p><?php echo esc_html($new_comment_content);  ?> </p> 
					</li>
                    <?php
				}
				?>
				</ul> 
			</div>
            
            <?php
			}
		}
		?>
		

    </div>
    <?php echo wp_kses_post( $after_widget ); ?> 
		
    
	
    <?php
    }
	
	function update($new_instance, $old_instance) {
		$new_instance = (array) $new_instance;
		
		$instance = array( 
			'latest' => 0, 
			'popular' => 0, 
			'recent' => 0 
		);
		
		foreach ($instance as $field => $val) {
			if (isset($new_instance[$field])) {
				$instance[$field] = 1;
			}
		}
		
		if ($new_instance['latest'] == '' && $instance['popular'] == '' && $instance['recent'] == '') {
			$instance['latest'] = 1;
		}
		
        $instance['number'] = absint($new_instance['number']);
		
		return $instance;
	}
	
    function form($instance) {
		$instance = wp_parse_args((array) $instance, array( 
			'latest' => true, 
			'popular' => true, 
			'recent' => true 
		) );
        $number = (isset($instance['number']) && $instance['number'] != 0) ? absint($instance['number']) : 3;
        
        ?>
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['latest'], true); ?> id="<?php echo esc_attr($this->get_field_id('latest')); ?>" name="<?php echo esc_attr($this->get_field_name('latest')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('latest')); ?>"><?php esc_html_e('Latest Posts', 'power-mag'); ?></label>
		</p>
		
		<p>
			<input class="checkbox" type="checkbox" <?php checked($instance['recent'], true); ?> id="<?php echo esc_attr($this->get_field_id('recent')); ?>" name="<?php echo esc_attr($this->get_field_name('recent')); ?>" /> 
			<label for="<?php echo esc_attr($this->get_field_id('recent')); ?>"><?php esc_html_e('Recent Comments', 'power-mag'); ?></label>
		</p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e("Enter the number of recent comments and latest posts you'd like to display", 'power-mag'); ?>:<br /><br />
                <input id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo absint($number); ?>" size="<?php absint(3); ?>" />
                <small class="s_red"><?php esc_html_e('default is 3', 'power-mag'); ?></small><br />
            </label>
        </p>
        
        <div class="cl"></div>
        <?php
    }
}
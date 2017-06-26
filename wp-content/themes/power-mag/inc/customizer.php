<?php
/**
 * Power Mag Theme Customizer.
 *
 * @package Power_Mag
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
 
 global $power_mag_allowedposttags;

add_filter( 'wp_kses_allowed_html', 'power_mag_map_allowed_tags' ,1 ,1 );

function power_mag_map_allowed_tags( $power_mag_allowedposttags ) {

// Here add tags and attributes you want to allow

$power_mag_allowedposttags['iframe']=array(

'align' => true,
'width' => true,
'height' => true,
'frameborder' => true,
'name' => true,
'src' => true,
'id' => true,
'class' => true,
'style' => true,
'scrolling' => true,
'marginwidth' => true,
'marginheight' => true,

);
return $power_mag_allowedposttags;

}
 
 
function power_mag_customize_register( $wp_customize ) {
    
    class Power_Mag_Label_Highlight extends WP_Customize_Control {
        public $type = 'label_highlight';
        public $label = '';
        public function render_content() {
        ?>
            <div class="pm_label_hilight_customizer"><?php echo esc_html( $this->label ); ?></div>
        <?php
        }
    }
    
    
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
    
    $wp_customize->add_setting('header_logo_option_setting', array(
          'default' => 'hide-logo',
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'sanitize_text_field'
       ));
       
    $wp_customize->add_control('header_logo_option_setting', array(
    		'type' => 'radio',
            'label' => esc_html__('Logo Options', 'power-mag'),
    		'section' => 'title_tagline',
    		'settings' => 'header_logo_option_setting',
            'priority' => 9,
            'choices' => array('show-logo' => esc_html__('Show Logo', 'power-mag'), 
                                'hide-logo' => esc_html__('Hide Logo', 'power-mag'),                               
                                )
    	));
    
    
    // Social Links Options //
    
    $wp_customize->add_section('power_mag_social_link_activate_settings', array(
		'priority' => 2,
		'title' => esc_html__('Social Icon Options', 'power-mag'),
	));

	$wp_customize->add_setting('power_mag_social_link_activate_header', array(
		'default' => 0,
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));
    
    $wp_customize->add_control('power_mag_social_link_activate_header', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate social icons in header', 'power-mag'),
		'section' => 'power_mag_social_link_activate_settings',
		'settings' => 'power_mag_social_link_activate_header'
	));    
    
            
    $wp_customize->add_setting('power_mag_social_link_activate_footer', array(
		'default' => 0,
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));        

	$wp_customize->add_control('powermag_social_link_activate_footer', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate social icons in footer', 'power-mag'),
		'section' => 'power_mag_social_link_activate_settings',
		'settings' => 'power_mag_social_link_activate_footer'
	));

	$power_mag_social_links = array(
		'power_mag_social_facebook' => array(
			'id' => 'power_mag_social_facebook',
			'title' => esc_html__('Facebook', 'power-mag'),
			'default' => ''
		),
		'power_mag_social_twitter' => array(
			'id' => 'power_mag_social_twitter',
			'title' => __('Twitter', 'power-mag'),
			'default' => ''
		),
		'power_mag_social_googleplus' => array(
			'id' => 'power_mag_social_googleplus',
			'title' => __('Google-Plus', 'power-mag'),
			'default' => ''
		),
        
		'power_mag_social_youtube' => array(
			'id' => 'power_mag_social_youtube',
			'title' => __('YouTube', 'power-mag'),
			'default' => ''
		),
        
        'power_mag_social_linkedin' => array(
			'id' => 'power_mag_social_linkedin',
			'title' => __('Linkedin', 'power-mag'),
			'default' => ''
		),
        
        'power_mag_social_instagram' => array(
			'id' => 'power_mag_social_instagram',
			'title' => __('Instagram', 'power-mag'),
			'default' => ''
		),
        
		'power_mag_social_pinterest' => array(
			'id' => 'power_mag_social_pinterest',
			'title' => __('Pinterest', 'power-mag'),
			'default' => ''
		),
        
        'power_mag_social_tumbler' => array(
			'id' => 'power_mag_social_tumbler',
			'title' => __('Tumbler', 'power-mag'),
			'default' => ''
		),
		
        
	);

	$i = 20;

	foreach($power_mag_social_links as $power_mag_social_link) {

		$wp_customize->add_setting(esc_attr($power_mag_social_link['id']), array(
			'default' => esc_url($power_mag_social_link['default']),
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'esc_url_raw'
		));

		$wp_customize->add_control(esc_attr($power_mag_social_link['id']), array(
			'label' => esc_html($power_mag_social_link['title']),
			'section'=> 'power_mag_social_link_activate_settings',
			'settings'=> esc_attr($power_mag_social_link['id']),
			'priority' => absint($i)
		));

		$i++;

	}
   // End of the Social Link Options //
   
   
   // Header Options//
   
   

	$wp_customize->add_section('power_mag_header_section', array(
		'priority' => 3,
		'title' => __('Header Options', 'power-mag'),
	));

    $wp_customize->add_setting('power_mag_separator_label_setting', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'power_mag_separator_label_sanitize'
   ));

   $wp_customize->add_control(new Power_Mag_Label_Highlight($wp_customize, 'label_highlight_top_header_date', array(
      'label' => esc_html__('Top Header Date', 'power-mag'),
      'section' => 'power_mag_header_section',
      'settings' => 'power_mag_separator_label_setting'
   )));
    
	$wp_customize->add_setting('power_mag_top_header_date_activate', array(
		'default' => absint(1),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));

	$wp_customize->add_control('power_mag_top_header_date_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate top header date section', 'power-mag'),
		'section' => 'power_mag_header_section',
		'settings' => 'power_mag_top_header_date_activate'
	));
    
    
    //header location
    
    $wp_customize->add_setting('power_mag_separator_label_setting', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'power_mag_separator_label_sanitize'
   ));

   $wp_customize->add_control(new Power_Mag_Label_Highlight($wp_customize, 'label_highlight_top_location', array(
      'label' => esc_html__('Top Header Location', 'power-mag'),
      'section' => 'power_mag_header_section',
      'settings' => 'power_mag_separator_label_setting'
   )));
    
	$wp_customize->add_setting('power_mag_top_header_location_activate', array(
		'default' => absint(0),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));

	$wp_customize->add_control('power_mag_top_header_location_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate top header location section', 'power-mag'),
		'section' => 'power_mag_header_section',
		'settings' => 'power_mag_top_header_location_activate'
	));
    
    $wp_customize->add_setting('power_mag_top_header_location', array(
		'default' => esc_html__('Kathmandu, Nepal', 'power-mag'),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('power_mag_top_header_location', array(
		'type' => 'text',
		'label' => esc_html__('Type to change top header location', 'power-mag'),
		'section' => 'power_mag_header_section',
		'settings' => 'power_mag_top_header_location'
	));
    //header location ends
    
    
    //header menu
    $wp_customize->add_setting('power_mag_separator_label_setting', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'power_mag_separator_label_sanitize'
   ));

   $wp_customize->add_control(new Power_Mag_Label_Highlight($wp_customize, 'label_highlight_top_menu', array(
      'label' => esc_html__('Top Header Menu', 'power-mag'),
      'section' => 'power_mag_header_section',
      'settings' => 'power_mag_separator_label_setting'
   )));
    
    $wp_customize->add_setting('power_mag_top_header_menu_activate', array(
		'default' => absint(1),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));

	$wp_customize->add_control('power_mag_top_header_menu_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate top header Menu section', 'power-mag'),
		'section' => 'power_mag_header_section',
		'settings' => 'power_mag_top_header_menu_activate'
        ));
   
   
   $wp_customize->add_setting('power_mag_separator_label_setting', array(
      'capability' => 'edit_theme_options',
      'sanitize_callback' => 'power_mag_separator_label_sanitize'
   ));

   $wp_customize->add_control(new Power_Mag_Label_Highlight($wp_customize, 'label_highlight_site_search', array(
      'label' => esc_html__('Header Search', 'power-mag'),
      'section' => 'power_mag_header_section',
      'settings' => 'power_mag_separator_label_setting'
   )));
   
   
   $wp_customize->add_setting('power_mag_header_search_activate', array(
		'default' => absint(1),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));

	$wp_customize->add_control('power_mag_header_search_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate header Search', 'power-mag'),
		'section' => 'power_mag_header_section',
		'settings' => 'power_mag_header_search_activate'
        ));
        
  
  // bottom header ends
  
  $wp_customize->add_control(new Power_Mag_Label_Highlight($wp_customize, 'label_highlight_trending', array(
      'label' => esc_html__('Trending News', 'power-mag'),
      'section' => 'power_mag_header_section',
      'settings' => 'power_mag_separator_label_setting'
   )));
   
   
   $wp_customize->add_setting('power_mag_header_trending_activate', array(
		'default' => absint(1),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));

	$wp_customize->add_control('power_mag_header_trending_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate header Trending News', 'power-mag'),
		'section' => 'power_mag_header_section',
		'settings' => 'power_mag_header_trending_activate'
        ));
   
   
     //footer option to change copyright
   $wp_customize->add_section('power_mag_footer_section', array(
		'priority' => 4,
		'title' => esc_html__('Footer Options', 'power-mag'),
	));
    
    $wp_customize->add_setting('power_mag_footer_activate_setting', array(
		'default' => absint(1),
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
        
	));

	$wp_customize->add_control('power_mag_footer_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate footer copyright', 'power-mag'),
		'section' => 'power_mag_footer_section',
		'settings' => 'power_mag_footer_activate_setting'
	));
    
    $wp_customize->add_setting('power_mag_footer_descrption_setting', array(
		'default' => 'codetrendy',
        'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
        ));

	$wp_customize->add_control('power_mag_footer_description', array(
		'type' => 'text',
		'label' => esc_html__('Type to change copyright', 'power-mag'),
		'section' => 'power_mag_footer_section',
		'settings' => 'power_mag_footer_descrption_setting'
        
	));

   // Theme Options panel
   $wp_customize->add_panel('power_mag_theme_options', array(
      'capabitity' => 'edit_theme_options',
      'description' => esc_html__('Theme options settings here', 'power-mag'),
      'priority' => 5,
      'title' => esc_html__('Theme Options', 'power-mag')
   ));
   
   // site Layout
    $wp_customize->add_section('power_mag_site_layout_settings', array(
		'priority' => 1,
		'title' => esc_html__('Site Layout', 'power-mag'),
        'panel' => 'power_mag_theme_options'
	));

	$wp_customize->add_setting('power_mag_site_layout_activate', array(
		'default' => esc_html__('boxed-layout', 'power-mag'),
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));
    
    $wp_customize->add_control('power_mag_site_layout_activate', array(
		'type' => 'select',
		'label' => esc_html__('Select Site Layout', 'power-mag'),
		'section' => 'power_mag_site_layout_settings',
		'settings' => 'power_mag_site_layout_activate',
		'choices' => array(
			'boxed-layout' => esc_html__('Boxed', 'power-mag'),
			'fullwidth-layout' => esc_html__('Fullwidth', 'power-mag'),
		)
	)); 
   
    // home page recent posts
    $wp_customize->add_section('power_mag_home_recent_posts_activate_settings', array(
		'priority' => 1,
		'title' => esc_html__('Home Page Recent Posts', 'power-mag'),
        'panel' => 'power_mag_theme_options'
	));

	$wp_customize->add_setting('power_mag_home_recent_posts_activate', array(
		'default' => absint(1),
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));
    
    $wp_customize->add_control('power_mag_home_recent_posts_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate recent Posts in home page', 'power-mag'),
		'section' => 'power_mag_home_recent_posts_activate_settings',
		'settings' => 'power_mag_home_recent_posts_activate'
	));    
    
    $wp_customize->add_setting('power_mag_home_recent_posts_number_setting', array(
		'default' => absint(4),
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_number_sanitize'
	));
    
    $wp_customize->add_control('power_mag_home_recent_posts_number_setting', array(
		'type' => 'number',
		'label' => esc_html__('Type number of recent posts to display in home page', 'power-mag'),
		'section' => 'power_mag_home_recent_posts_activate_settings',
		'settings' => 'power_mag_home_recent_posts_number_setting'
	));      
    
    
    
    // home page recent posts ends here

	
   // home page recent posts
   
    
    // Single Post related posts
    $wp_customize->add_section('power_mag_related_posts_activate_settings', array(
		'priority' => 1,
		'title' => esc_html__('Activate Related Posts', 'power-mag'),
        'panel' => 'power_mag_theme_options'
	));

	$wp_customize->add_setting('power_mag_related_posts_activate', array(
		'default' => absint(0),
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'power_mag_checkbox_sanitize'
	));
    
    $wp_customize->add_control('power_mag_related_posts_activate', array(
		'type' => 'checkbox',
		'label' => esc_html__('Check to activate related posts in single posts', 'power-mag'),
		'section' => 'power_mag_related_posts_activate_settings',
		'settings' => 'power_mag_related_posts_activate'
	));
    
    
    
    
    
    class POWER_MAG_Image_Radio_Control extends WP_Customize_Control {

 		public function render_content() {

			if ( empty( $this->choices ) )
				return;

			$name = '_customize-radio-' . $this->id;

			?>
			<style>
				#<?php echo esc_attr($this->id); ?> .powermag-radio-img-img {
					border: 3px solid #DEDEDE;
					margin: 0 5px 5px 0;
					cursor: pointer;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				#<?php echo esc_attr($this->id); ?> .powermag-radio-img-selected {
					border: 3px solid #AAA;
					border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
				}
				input[type=checkbox]:before {
					content: '';
					margin: -3px 0 0 -4px;
				}
			</style>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<ul class="controls" id='<?php echo esc_attr($this->id); ?>'>
			<?php
				foreach ( $this->choices as $value => $label ) :
					$class = ($this->value() == $value)?'powermag-radio-img-selected powermag-radio-img-img':'powermag-radio-img-img';
					?>
					<li style="display: inline;">
					<label>
						<input <?php $this->link(); ?>style = 'display:none' type="radio" value="<?php echo esc_attr( $value ); ?>" name="<?php echo esc_attr( $name ); ?>" <?php $this->link(); checked( $this->value(), $value ); ?> />
						<img src = '<?php echo esc_url( $label ); ?>' class = '<?php echo esc_attr($class); ?>' />
					</label>
					</li>
					<?php
				endforeach;
			?>
			</ul>
			<script type="text/javascript">

				jQuery(document).ready(function($) {
					$('.controls#<?php echo esc_attr($this->id); ?> li img').click(function(){
						$('.controls#<?php echo esc_attr($this->id); ?> li').each(function(){
							$(this).find('img').removeClass ('powermag-radio-img-selected') ;
						});
						$(this).addClass ('powermag-radio-img-selected') ;
					});
				});

			</script>
			<?php
		}
	}
     
    // layout options
    $wp_customize->add_section('power_mag_sidebar_section', array(
		'priority' => 1,
		'title' => esc_html__('Sidebar Settings', 'power-mag'),
        'panel' => 'power_mag_theme_options'
	));

	$wp_customize->add_setting('power_mag_category_sidebar_setting', array(
		'default' => esc_html__('right-sidebar', 'power-mag'),
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));
    
    $wp_customize->add_control(new Power_mag_Image_Radio_Control($wp_customize, 'power_mag_category_sidebar_setting', array(
		'type' => 'radio',
		'label' => esc_html__('Category Layout', 'power-mag'),
		'section' => 'power_mag_sidebar_section',
		'settings' => 'power_mag_category_sidebar_setting',
		'choices' => array(
			'right-sidebar' => esc_url(POWERMAG_ADMIN_IMAGES_URL . '/right-sidebar.png'),
			'left-sidebar' => esc_url(POWERMAG_ADMIN_IMAGES_URL . '/left-sidebar.png'),
			'no-sidebar'	=> esc_url(POWERMAG_ADMIN_IMAGES_URL . '/no-sidebar.png'),
		)
	)));
    
    
    $wp_customize->add_setting('power_mag_default_sidebar_setting', array(
		'default' => esc_html__('right-sidebar', 'power-mag'),
      'capability' => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field'
	));
    
    $wp_customize->add_control(new Power_mag_Image_Radio_Control($wp_customize, 'power_mag_default_sidebar_setting', array(
		'type' => 'radio',
		'label' => esc_html__('Default Layout', 'power-mag'),
		'section' => 'power_mag_sidebar_section',
		'settings' => 'power_mag_default_sidebar_setting',
		'choices' => array(
			'right-sidebar' => esc_url(POWERMAG_ADMIN_IMAGES_URL . '/right-sidebar.png'),
			'left-sidebar' => esc_url(POWERMAG_ADMIN_IMAGES_URL . '/left-sidebar.png'),
			'no-sidebar'	=> esc_url(POWERMAG_ADMIN_IMAGES_URL . '/no-sidebar.png'),
		)
	)));
    
   
   	// Category Color Options
   $wp_customize->add_panel('powermag_category_panel', array(
      'priority' => 7,
      'title' => esc_html__('Category Options', 'power-mag'),
      'capability' => 'edit_theme_options',
      'description' => esc_html__('Change the Layout and Color of each category items as you want.', 'power-mag')
   ));

   $wp_customize->add_section('powermag_category_setting', array(
      'priority' => 1,
      'title' => esc_html__('Category Settings', 'power-mag'),
      'panel' => 'powermag_category_panel'
   ));

   $i = 1;
   $args = array(
       'orderby' => 'id',
       'hide_empty' => 0
   );
   $categories = get_categories( $args );
   $wp_category_list = array();
   foreach ($categories as $category_list ) {
      $wp_category_list[$category_list->cat_ID] = $category_list->cat_name;
      
      $wp_customize->add_setting('powermag_category_separator_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'power_mag_separator_label_sanitize'
       ));
    
       
      
      $wp_customize->add_control(new Power_Mag_Label_Highlight($wp_customize, 'powermag_category_separator_'.esc_attr(get_cat_id($wp_category_list[$category_list->cat_ID])), array(
          'label' => sprintf( '%s', esc_html($wp_category_list[$category_list->cat_ID]) ),
          'section' => 'powermag_category_setting',
          'settings' => 'powermag_category_separator_'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) ),
          'priority' => absint($i)
       )));
    
       
        
        //category color
        
      $wp_customize->add_setting('powermag_category_color_'.esc_attr(get_cat_id($wp_category_list[$category_list->cat_ID])), array(
         'default' => esc_attr('#ee3440'),
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'power_mag_color_option_hex_sanitize',
         'sanitize_js_callback' => 'power_mag_color_escaping_option_sanitize'
      ));

      $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'powermag_category_color_'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) ), array(
         'label' => sprintf('%s', esc_html($wp_category_list[$category_list->cat_ID] )),
         'section' => 'powermag_category_setting',
         'settings' => 'powermag_category_color_'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) ),
         'priority' => absint($i)
      )));
      
      // category Layout
      $wp_customize->add_setting('powermag_category_layout_'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) ), array(
         'default' => esc_attr('layout-1'),
         'capability' => 'edit_theme_options',
         'sanitize_callback' => 'sanitize_text_field',
      ));
      
      
      $wp_customize->add_control('powermag_category_layout_'.get_cat_id($wp_category_list[$category_list->cat_ID]), array(
		'type' => 'select',
		'label' => esc_html__('Layout', 'power-mag'),
		'section' => 'powermag_category_setting',
		'settings' => 'powermag_category_layout_'.esc_attr( get_cat_id($wp_category_list[$category_list->cat_ID]) ),
        'choices' => array(
            'layout-1' => esc_html__('Layout 1', 'power-mag'),
            'layout-2' => esc_html__('Layout 2', 'power-mag'),
        ),
        'priority' => absint($i)
	));
    
      $i++;
   }
   
 
   // checkbox sanitization
   function power_mag_checkbox_sanitize($input) {
      if ( $input == 1 ) {
         return 1;
      } else {
         return 0;
      }
   }
   
   function power_mag_color_escaping_option_sanitize($input) {
      $input = esc_attr($input);
      return $input;
   }
   
   function power_mag_color_option_hex_sanitize($input)
   {
    if ($unhashed = sanitize_hex_color_no_hash($input))
         return '#' . $unhashed;

      return $input;
   }
   
   
   function power_mag_sanitize_googlemaps($input)
    {
    	global $power_mag_allowedposttags;
    	$power_mag_allowedposttags_iframe = power_mag_map_allowed_tags($power_mag_allowedposttags);
    		
    	$output = wp_kses( $input, $power_mag_allowedposttags_iframe);
    	return $output;
    }
    function power_mag_number_sanitize ($input)
    {
        return absint($input);
    }
   
   
   
     
}
add_action( 'customize_register', 'power_mag_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function power_mag_customize_preview_js() {
	wp_enqueue_script( 'power_mag_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'power_mag_customize_preview_js' );
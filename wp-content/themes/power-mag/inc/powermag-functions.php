<?php 
/**
 * Power Mag custom functions and definitions.
 *
 *
 * @package Power_Mag
 */
 
register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'power-mag' ),
        'top-header' => esc_html__( 'Top Header', 'power-mag' ),
	) );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function power_mag_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'power-mag' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s wow fadeIn">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'power-mag' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    // Top advertisement sidebar
    register_sidebar( array(
		'name'          => esc_html__( 'Top Advertisement Area', 'power-mag' ),
		'id'            => 'top-advertisement-area',
		'description'   => esc_html__( 'Use textarea widget with <img src=""> tag. Advertisement size 728 x 90px recommended', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Home Page Header Left Area', 'power-mag' ),
		'id'            => 'home-header-left-area',
		'description'   => esc_html__( 'Use Pm-Hilighted widget.(Layout 1)', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Home Page Header Right Area', 'power-mag' ),
		'id'            => 'home-header-right-area',
		'description'   => esc_html__( 'Use Pm-Hilighted widget.(Layout 2)', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    register_sidebar( array(
		'name'          => esc_html__( 'Home Page Top Content Area', 'power-mag' ),
		'id'            => 'home-top-content-area',
		'description'   => esc_html__( 'Use PM-Featured Layout Widget or PM-Fullwidth Widget', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Home Page Middle Left Content Area', 'power-mag' ),
		'id'            => 'home-bottom-left-content-area',
		'description'   => esc_html__( 'Use PM - One column Layout 1 Widget or Pm - One Column Layout 2 Widget.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Home Page Middle Right Content Area', 'power-mag' ),
		'id'            => 'home-bottom-right-content-area',
		'description'   => esc_html__( 'Use PM - One column Layout 1 Widget or Pm - One Column Layout 2 Widget', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Home Page Bottom Content Area', 'power-mag' ),
		'id'            => 'home-bottom-content-area',
		'description'   => esc_html__( 'Use PM-Featured Layout Widget or PM-Fullwidth Widget', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Home Page Sidebar', 'power-mag' ),
		'id'            => 'home-top-sidebar',
		'description'   => esc_html__( 'The right sidebar displayed in Home Page. Add widgets of your choice.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s wow fadeIn">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 1', 'power-mag' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s wow fadeIn">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 2', 'power-mag' ),
		'id'            => 'footer-2',
		'description'   => esc_html__( 'Add widgets here.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s wow fadeIn">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
    register_sidebar( array(
		'name'          => esc_html__( 'Footer 3', 'power-mag' ),
		'id'            => 'footer-3',
		'description'   => esc_html__( 'Add widgets here.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s wow fadeIn">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    
     register_sidebar( array(
		'name'          => esc_html__( 'Woo-Commerce Sidebar', 'power-mag' ),
		'id'            => 'woo_commerce_sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'power-mag' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s wow fadeIn">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
    

    
}
add_action( 'widgets_init', 'power_mag_widgets_init' );


//trending news

function power_mag_trending_news()
{
    $pm_trending_args = array('post_type' => 'post',
                                'posts_per_page' => 5,
                                'ignore_sticky_posts' => true,
                                'post_status' => 'publish'
                                );
    $pm_trending_query = new WP_Query($pm_trending_args);
    ?>
    <div class="trending_news_wrapper"> 

          <div class="pm_newsticker">
    
          <div class="pm_trending_news_title wow fadeIn"><?php esc_html_e('Trending News', 'power-mag'); ?></div>
      
          <div class="pm_trending_news"> 
            <ul class="newsticker">
              <?php
              while($pm_trending_query->have_posts() ){
                  $pm_trending_query->the_post();
                  ?> 
                    <li class="pm_single_title wow fadeIn"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> 
                  <?php
              }
              wp_reset_postdata();
              ?> 
            </ul>
          </div>
          </div> 
    </div> 
    <?php
}


if ( !function_exists('power_mag_colored_category') ) :
   function power_mag_colored_category() {
      global $post;
      $categories = get_the_category();
      $separator = '&nbsp;';
      $output = '';
      if($categories) {
        ?>
      <div class="above-entry-meta"><span class="cat-links">
         <?php
         foreach($categories as $category) {
                ?>
               <a class="pm-catid-background-<?php echo absint($category->cat_ID); ?>" href="<?php echo esc_url(get_category_link( $category->term_id )); ?>" rel="category tag"><?php echo esc_attr($category->cat_name); ?></a>&nbsp; 
            <?php 
      }
      ?>
         </span>
         </div>
         <?php
      }
   }
endif;


/*
 * Category Color Options
 */
if ( ! function_exists( 'power_mag_category_color' ) ) :
function power_mag_category_color( $wp_category_id ) {
   $args = array(
      'orderby' => 'id',
      'hide_empty' => 0
   );
   $category = get_categories( $args );
   foreach ($category as $category_list ) {
      $color = esc_attr(get_theme_mod('powermag_category_color_'.absint($wp_category_id), '#ee3440'));
      return $color;
   }
}
endif;

// powermag Category Layouts

if ( ! function_exists( 'power_mag_category_layout' ) ) :
function power_mag_category_layout( $wp_category_id ) {
   $args = array(
      'orderby' => 'id',
      'hide_empty' => 0
   );
   $category = get_categories( $args );
   foreach ($category as $category_list ) {
      $layout = esc_attr(get_theme_mod('powermag_category_layout_'.absint($wp_category_id), 'layout-1'));
      return $layout;
   }
}
endif;


function power_mag_excerpt( $power_mag_content , $power_mag_letter_count){
		$power_mag_letter_count = !empty($power_mag_letter_count) ? $power_mag_letter_count : 100 ;
	    $power_mag_striped_content = strip_shortcodes($power_mag_content);
        $power_mag_striped_content = strip_tags($power_mag_striped_content);          
		$power_mag_excerpt = mb_substr($power_mag_striped_content, 0 , $power_mag_letter_count);
		if(strlen($power_mag_striped_content) > strlen($power_mag_excerpt)){
			$power_mag_excerpt.= "..";
		}
		return $power_mag_excerpt;
	}
 
 
function power_mag_home_posted_on_cb(){
  global $post;
  
  $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
  if( get_the_date('Ymd') == date('Ymd')):
  if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
    $time_string_human = human_time_diff(get_the_time( 'U' ),current_time('timestamp')).' '.__('ago ','power-mag');
    $time_string = '<time class="entry-date published" datetime="%1$s">'.$time_string_human.'</time><time class="updated" datetime="%3$s">%4$s</time>';
  }
  endif;

  $time_string = sprintf( $time_string,
    esc_attr( get_the_date() ),
    esc_html( get_the_date() ),
    esc_attr( get_the_modified_date() ),
    esc_html( get_the_modified_date() )
    );

   $posted_on = sprintf(
    '%1$s',
    '<a href="' . esc_url( get_permalink() ) . '" title="' . esc_attr( get_the_time() ) . '" rel="bookmark">' . $time_string . '</a>'
    );	   

echo '<span class="posted-on"><i class="fa fa-calendar-o"></i>' . wp_kses_post($posted_on) . '</span>';

}
add_action( 'power_mag_home_posted_on', 'power_mag_home_posted_on_cb', 10 );

// footer block count
function power_mag_footer_count(){
	$power_mag_count = 0;
	if(is_active_sidebar('footer-1'))
	$power_mag_count++;

	if(is_active_sidebar('footer-2'))
	$power_mag_count++;

	if(is_active_sidebar('footer-3'))
	$power_mag_count++;


	return $power_mag_count;
}


function power_mag_page_post_layout($powermag_classes){
    global $post;
    
    $powermag_post_class = esc_attr(get_theme_mod('power_mag_post_sidebar_setting', 'right-sidebar'));
    $powermag_cat_sidebar_layout = esc_html(get_theme_mod('power_mag_category_sidebar_setting', 'right-sidebar'));
    $powermag_default_sidebar_layout = esc_html(get_theme_mod('power_mag_default_sidebar_setting', 'right-sidebar'));
    
        if(class_exists( 'woocommerce' ) &&( is_shop() || is_account_page() || is_product() || is_product_category() || is_product_taxonomy() || is_cart() || is_checkout() ))
        {
            $powermag_post_class = 'right-sidebar';
            $powermag_classes[] = $powermag_post_class;
        }
    
        elseif(is_home() || is_page_template('template-parts/t-home.php') || is_front_page())
        {
            if(get_option( 'show_on_front' ) == 'posts'){
                $powermag_classes[] = esc_attr($powermag_default_sidebar_layout);
            }
            else
            {
                $powermag_classes[]= '';
            }
            
        }
        
        elseif( is_page_template('template-parts/page-left-sidebar.php')){
            $powermag_classes[]= 'left-sidebar';
        }
        
        elseif( is_page_template('template-parts/page-fullwidth.php')){
            $powermag_classes[]= 'fullwidth';
        }
        elseif(is_page())
        {
            $powermag_classes[]= 'right-sidebar';
        }
        
        elseif( is_page_template('template-parts/post-left-sidebar.php')){
            $powermag_classes[]= 'left-sidebar';
        }
        
        elseif( is_page_template('template-parts/post-fullwidth.php')){
            $powermag_classes[]= 'fullwidth';
        }
        elseif(is_single())
        {
            $powermag_classes[]= 'right-sidebar';
        }
        
        elseif(is_category())
        {
            if(empty($powermag_cat_sidebar_layout)){
                $powermag_classes[] = 'right-sidebar';
            }
            
            else{
                $powermag_classes[]= $powermag_cat_sidebar_layout;
            }
        }
        
        elseif(is_archive()){
            if(empty($powermag_default_sidebar_layout)){
                $powermag_classes[] = 'right-sidebar';
            }
            
            else{
                $powermag_classes[]= $powermag_default_sidebar_layout;
            }
        }
        
        elseif(is_search()){
            if(empty($powermag_default_sidebar_layout)){
                $powermag_classes[] = 'right-sidebar';
            }
            
            else{
                $powermag_classes[]= $powermag_default_sidebar_layout;
            }
        }
        elseif(is_404()){
            if(empty($powermag_default_sidebar_layout)){
                $powermag_classes[] = 'right-sidebar';
            }
            
            else{
                $powermag_classes[]= $powermag_default_sidebar_layout;
            }
        }
        
        else{
            
		  $powermag_classes[] = 'right-sidebar';	
		
        }
    return $powermag_classes;
}
add_filter( 'body_class', 'power_mag_page_post_layout' );


//powermag body class

function power_mag_web_layout($powermag_classes){
    $powermag_site_layout = esc_attr(get_theme_mod('power_mag_site_layout_activate', 'boxed-layout'));
    if($powermag_site_layout == 'boxed-layout'){
        $powermag_classes[]= 'boxed-layout';
    }
    
    elseif($powermag_site_layout == 'fullwidth-layout'){
        $powermag_classes[]='fullwidth-layout';
    }   
    return $powermag_classes;
}
add_filter( 'body_class', 'power_mag_web_layout' );
    
    
    // author box
    
    function power_mag_post_author()
     {
        global $post;
        
        
        ?>
        <div class="author_wrapper wow fadeIn">
            <div class="single_author_inner">
        		<figure class="alignleft">
        			<?php echo get_avatar( get_the_author_meta( 'ID' )); ?>
        		</figure>
                <div class="pm_author_info_wrap">
            		<h5><?php the_author(); ?></h5>
                    <?php 
                    $author_url = get_the_author_meta('url');
                    if(!empty($author_url)) {
                        ?>
                        <p><a href="<?php echo esc_url($author_url); ?>" target="_blank"><?php echo esc_url($author_url); ?></a></p>
                        <?php
                    }?>
                    
            		<p><?php $user_bio = get_the_author_meta('description'); 
                        echo esc_html($user_bio); ?></p>
                </div>
        	</div>
        </div>
     <?php 
     }
 

 
 function power_mag_related_posts()
 {
   // global $post;
    global $power_mag_id;
    $related_post = absint(get_theme_mod('power_mag_related_posts_activate',0));
    if($related_post == 1):
    $category_ar = get_the_category ( absint($power_mag_id) );
    
    $category_array = array();
    
    foreach($category_ar as $cat)
    {
        $category_array[] = $cat->cat_ID;
    }
    
    ?>
    <div class="pm_related_news_wrap">
    
        <div class="fullwidth_featured_layout_title_wrapper widget_title_wrapper wow fadeIn">
    		
            <?php echo  '<h2 class="widget-title"><span>'. esc_html__('Related News', 'power-mag').'</span></h2>'; ?>
            
        </div>
        <div class="owl-carousel owl-theme pm_related_posts wow fadeIn">
                <?php
    			$queryArgs = array( 
        			'posts_per_page' => 6, 
        			'post_status' => 'publish', 
        			'ignore_sticky_posts' => true, 
        			'post_type' => 'post', 
                    'cat' => absint($category_array)
        		);
        		
        		
                $lt = new WP_Query($queryArgs);
    			$count = 1;
                while ($lt->have_posts()) : $lt->the_post();
                    ?>
                    <div class="item featured_fullwidth_layout_thumbnail_wrapper">
                    
                    <?php
                        
                    if (has_post_thumbnail()) {
                        
                        ?>
                        <div class="featured_fullwidth_layout_thumbnail">
                            <?php
                            $pm_fullwidth_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'power-mag-widget-large-2'); 
                            if(!empty($pm_fullwidth_image[0]))
                            {
                                ?>
                                  <img src="<?php echo esc_url($pm_fullwidth_image[0]); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                  
                                  <?php
                            }
                               
                            ?>
                            <div class="pm_bg"></div>
                        </div>
                        <?php
                        } else {
                            ?>
                            <div class="featured_fullwidth_thumbnail_big">
                                <img src="<?php echo esc_url(POWERMAG_IMAGES_URL . '/426into256.png'); ?>" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" />
                                
    
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
                                $time_string = sprintf( /* translators: %1$s : description of datetime */
                                                    /* translators: %2$s : description of comment date */
                                    wp_kses_post(__('<time class="entry-date published" datetime="%1$s">%2$s</time>', 'power-mag')),
                                   esc_attr( get_the_date() ),
                                   esc_html( get_the_date() )
                                );
                                printf( /* translators: %1$s : description of url */ 
                                    /* translators: %2$s : description of time */
                                    /* translators: %3$s : description of timestring */
                                    wp_kses_post(__('<span class="posted-on"><a href="%1$s" title="%2$s" rel="bookmark"><i class="fa fa-calendar-o"></i> %3$s</a></span>', 'power-mag')),
                                   esc_url( get_permalink() ),
                                   esc_attr( get_the_time() ),
                                   wp_kses_post( $time_string )
                                ); ?>
                            </span>
                            
                            <div class="pm_featured_fullwidth_title">
                                <h6><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
                            </div>
        				</div>
                    </div>
                   
                    <?php
                    
                    $count++;
    			endwhile;
                 wp_reset_postdata();
    			?>
    
            </div>
        </div>
    <?php
    endif;
 }
 
 //custom excerpt function 
function power_mag_excerpt_length( $length = '' )
  {

    if ( isset( $GLOBALS['power_mag_excerpt_length'] ) && $GLOBALS['power_mag_excerpt_length'] > 0 ) 
    {
        return $GLOBALS['power_mag_excerpt_length'];
    }
     else 
    {
        return 50;
    }
  }
add_filter( 'excerpt_length', 'power_mag_excerpt_length', 99 );

    /**
    * Filter the excerpt "read more" string.
    *
    * @param string $more "Read more" excerpt string.
    * @return string (Maybe) modified "read more" excerpt string.
    */
function power_mag_excerpt_more( $more = '' )
{
    return '...';
}
add_filter( 'excerpt_more', 'power_mag_excerpt_more' );

    /**
    * Add custom excerpt length
    * @param $length
    */
function power_mag_add_excerpt_length( $length )
{
    $length = absint( $length );
    $GLOBALS['power_mag_excerpt_length'] = $length;
}

    /**
    * REMOVE custom excerpt length
    */
function power_mag_remove_excerpt_length ()
{
    if ( isset( $GLOBALS['power_mag_excerpt_length'] ) ) 
    {
        unset( $GLOBALS['power_mag_excerpt_length'] );
    }
}  

function power_mag_styles_method($pm_cat_color = false, $category_name = false) {

$args = array(
          'orderby' => 'id',
          'hide_empty' => 0
       );
$category = get_categories( $args );
    $pm_custom_css = '';
    foreach($category as $cat_id)
    {
        $pm_cat_color = power_mag_category_color($cat_id->term_id);
        $pm_custom_css .= 
                ".pm-catid-".esc_attr($cat_id->term_id)."{
                    color:". esc_attr($pm_cat_color). "
                    }
                .pm-catid-background-".esc_attr($cat_id->term_id)."{
                    background: ".esc_attr($pm_cat_color)."
                    }
                    
                h2.widget-title span.pm-catid-background-".esc_attr($cat_id->term_id)."{
                    background: ".esc_attr($pm_cat_color)."
                    }";
    }
    
    wp_add_inline_style( 'power-mag-style', $pm_custom_css );
    
}
add_action( 'wp_enqueue_scripts', 'power_mag_styles_method' );


/**
 * Hides the custom post template for pages on WordPress 4.6 and older
 *
 * @param array $post_templates Array of page templates. Keys are filenames, values are translated names.
 * @return array Filtered array of page templates.
 */
function power_mag_exclude_page_templates( $post_templates ) {
    if ( version_compare( $GLOBALS['wp_version'], '4.7', '<' ) ) {
        unset( $post_templates['template-parts/post-left-sidebar.php'] );
        unset( $post_templates['template-parts/post-fullwidth.php'] );
    }
 
    return $post_templates;
}
 
add_filter( 'theme_page_templates', 'power_mag_exclude_page_templates' );
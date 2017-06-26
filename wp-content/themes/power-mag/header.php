<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Power_Mag
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#pm_content"><?php esc_html_e( 'Skip to content', 'power-mag' ); ?></a>
	<header id="masthead" class="site-header" role="banner">
        <div class="pm_top_header">
            <div class="pm_container">
                <ul class="pm_top_social_icons wow fadeIn">
                    <?php 
                    $power_mag_social_link_activate_header = absint(get_theme_mod('power_mag_social_link_activate_header'));
                    $pm_facebook_link = get_theme_mod('power_mag_social_facebook');  
                    $pm_twitter_link = get_theme_mod('power_mag_social_twitter');
                    $pm_gplus_link = get_theme_mod('power_mag_social_googleplus');
                    $pm_youtube_link = get_theme_mod('power_mag_social_youtube');
                    $pm_linkedin_link = get_theme_mod('power_mag_social_linkedin');
                    $pm_insta_link = get_theme_mod('power_mag_social_instagram');
                    $pm_pinterest_link = get_theme_mod('power_mag_social_pinterest');
                    $pm_tumbler_link = get_theme_mod('power_mag_social_tumbler');
                    
                    $power_mag_top_header_date_activate = absint(get_theme_mod('power_mag_top_header_date_activate', 1));
                    if($power_mag_social_link_activate_header == 1):
                        if($pm_facebook_link != ''):
                            ?>
                            <li class="pm_facebook"><a href="<?php echo esc_url($pm_facebook_link) ; ?>"><i class="fa fa-facebook"></i></a></li>
                            <?php
                        endif;
                        if($pm_twitter_link != ''):
                            ?>
                            <li class="pm_twitter"><a href="<?php echo esc_url($pm_twitter_link); ?>"><i class="fa fa-twitter"></i></a></li>
                            <?php
                        endif;
                        if($pm_gplus_link != ''):
                            ?>
                            <li class="pm_gplus"><a href="<?php echo esc_url($pm_gplus_link) ; ?>"><i class="fa fa-google-plus"></i></a></li>
                            <?php
                        endif;
                        if($pm_youtube_link != ''):
                            ?>
                            <li class="pm_youtube"><a href="<?php echo esc_url($pm_youtube_link) ; ?>"><i class="fa fa-youtube"></i></a></li>
                            <?php
                        endif;
                        if($pm_linkedin_link != ''):
                            ?>
                            <li class="pm_linkedin"><a href="<?php echo esc_url($pm_linkedin_link) ; ?>"><i class="fa fa-linkedin"></i></a></li>
                            <?php
                        endif;
                        if($pm_insta_link != ''):
                            ?>
                            <li class="pm_insta"><a href="<?php echo esc_url($pm_insta_link) ; ?>"><i class="fa fa-instagram"></i></a></li>
                            <?php
                        endif;
                        if($pm_pinterest_link != ''):
                            ?>
                            <li class="pm_pinterest"><a href="<?php echo esc_url($pm_pinterest_link); ?>"><i class="fa fa-pinterest"></i></a></li>
                            <?php
                        endif;
                        if($pm_tumbler_link != ''):
                            ?>
                            <li class="pm_tumbler"><a href="<?php echo esc_url($pm_tumbler_link); ?>"><i class="fa fa-tumblr"></i></a></li>
                            <?php
                        endif;
                    endif;
                    ?>
                </ul>
                <div class="pm_top_header-date wow fadeIn">
                    <?php
                    
                    if($power_mag_top_header_date_activate == 1):
                      echo esc_html( date_i18n(get_option( 'date_format' )) );
                    endif;
                    ?>
                </div>
                <?php 
                $power_mag_top_header_location_activate = absint(get_theme_mod('power_mag_top_header_location_activate', 1));
                if($power_mag_top_header_location_activate == 1):
                ?>
                <div class="pm_top_header_location wow fadeIn">
                    <?php 
                    $power_mag_top_header_location = esc_html(get_theme_mod('power_mag_top_header_location'));
                    if($power_mag_top_header_date_activate == 1):
                        ?>
                        <span class="pm_date_location_seperator">|</span>
                        <?php
                    endif;
                        echo esc_html($power_mag_top_header_location);
                    ?>
                </div>
                <?php endif; ?>
                <!-- <div class="nnc_top_search"><i class="fa fa-search"></i></div> -->
                <?php $power_mag_header_search_activate = absint(get_theme_mod('power_mag_header_search_activate', 1));
                    if($power_mag_header_search_activate == 1):
                     ?>
                <div class="pm_header_search wow fadeIn">
                    <i class="fa fa-search"></i>
                        <div class="pm_top_search">
                            <?php echo get_search_form(); ?>
                        </div>
                </div>
                <?php endif; ?> 
                <?php
                
                $power_mag_top_header_menu_activate = absint(get_theme_mod('power_mag_top_header_menu_activate', 1));
                
                if($power_mag_top_header_menu_activate == 1):
                ?>
                <div class="pm_top_menu wow fadeIn">
                     <?php wp_nav_menu( array( 'theme_location' => 'top-header', 'menu_id' => 'top-header-menu' ) ); ?>
                </div>
                <?php 
                
                endif;
                ?> 
            </div>
        </div>


        <div class="pm_header_logo">
            <div class="pm_container">
                <div class="site-logo">
                <?php
                     $description = get_bloginfo( 'description', 'display' );
                     $logo1 = esc_html(get_theme_mod('header_logo_option_setting', 'show-logo'));
                       
                        
                         if($logo1=='show-logo' && has_custom_logo())
                         {
                            ?>
                            <div class="logo-img">
                                <?php 
                                        the_custom_logo();
                                ?>
                            </div>
                            <?php
                         }
                        
                ?>                     
                    <div class="site-branding">
                        <h1 class="site-title">
                             <a rel="home" title="<?php bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                        </h1>
                        <p class="site-description">
                            <?php
                                echo esc_html($description);
                            ?>
                        </p>
                    </div>
                    
                </div>

                <div class="pm_header_right_widget wow fadeIn">
                    <?php if(is_active_sidebar('top-advertisement-area')):
                        dynamic_sidebar('top-advertisement-area');
                    endif; ?>
                </div> 
            </div>
        </div>





		<nav id="site-navigation" class="main-navigation wow fadeIn" role="navigation">
            <div class="pm_container">
    			<button class="menu-toggle wow fadeIn" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-navicon"></i></button>
    			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
            </div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->
	<div id="content" class="site-content">
        <div class="pm_container" id="pm_content">
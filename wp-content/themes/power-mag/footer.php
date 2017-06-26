<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Power_Mag
 */

?>
    </div>
	</div><!-- #content -->
    <?php if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' ) ) : ?>
    <div class="pm_footer_wrapper footer-column-<?php echo absint( power_mag_footer_count() ); ?>">
        <div class="pm_container"> 
        <?php if(is_active_sidebar('footer-1')): ?>
            <div class="pm_footer_1 pm_footer">
                <?php dynamic_sidebar('footer-1'); ?>    
            </div>
        <?php 
        endif;
        
        if(is_active_sidebar('footer-2')):
        ?>  
            <div class="pm_footer_2 pm_footer">
                <?php dynamic_sidebar('footer-2'); ?>
            </div>
        <?php 
        endif;
        
        if(is_active_sidebar('footer-3')):
        ?> 
            <div class="pm_footer_3 pm_footer">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
        <?php 
        endif;
        ?>
        </div>
    </div>
    <?php 
    endif;
    ?>
	<footer id="colophon" class="site-footer" role="contentinfo">
        <div class="pm_container"> 
        <ul class="pm_top_social_icons">
            <?php 
            $power_mag_social_link_activate_footer = absint(get_theme_mod('power_mag_social_link_activate_footer'));
            
            if($power_mag_social_link_activate_footer == 1):
            
                $pm_facebook_link = get_theme_mod('power_mag_social_facebook');  
                $pm_twitter_link = get_theme_mod('power_mag_social_twitter');
                $pm_gplus_link = get_theme_mod('power_mag_social_googleplus');
                $pm_youtube_link = get_theme_mod('power_mag_social_youtube');
                $pm_linkedin_link = get_theme_mod('power_mag_social_linkedin');
                $pm_insta_link = get_theme_mod('power_mag_social_instagram');
                $pm_pinterest_link = get_theme_mod('power_mag_social_pinterest');
                $pm_tumbler_link = get_theme_mod('power_mag_social_tumbler');
            
            
                if($pm_facebook_link != ''):
                    ?>
                    <li class="pm_facebook"><a href="<?php echo esc_url($pm_facebook_link); ?>"><i class="fa fa-facebook"></i></a></li>
                    <?php
                endif;
                if($pm_twitter_link != ''):
                    ?>
                    <li class="pm_twitter"><a href="<?php echo esc_url($pm_twitter_link); ?>"><i class="fa fa-twitter"></i></a></li>
                    <?php
                endif;
                if($pm_gplus_link != ''):
                    ?>
                    <li class="pm_gplus"><a href="<?php echo esc_url($pm_gplus_link); ?>"><i class="fa fa-google-plus"></i></a></li>
                    <?php
                endif;
                if($pm_youtube_link != ''):
                    ?>
                    <li class="pm_youtube"><a href="<?php echo esc_url( $pm_youtube_link); ?>"><i class="fa fa-youtube"></i></a></li>
                    <?php
                endif;
                if($pm_linkedin_link != ''):
                    ?>
                    <li class="pm_linkedin"><a href="<?php echo esc_url($pm_linkedin_link) ; ?>"><i class="fa fa-linkedin"></i></a></li>
                    <?php
                endif;
                if($pm_insta_link != ''):
                    ?>
                    <li class="pm_insta"><a href="<?php echo esc_url($pm_insta_link); ?>"><i class="fa fa-instagram"></i></a></li>
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
			<div class="site-info">
        <?php
        
          $footer_activation = absint(get_theme_mod('power_mag_footer_activate_setting'));
          $pm_copyrigt_footer = get_theme_mod('power_mag_footer_descrption_setting');
          
          if($footer_activation==1)
          {
            ?>
                      <h4>
                            <?php  echo esc_html($pm_copyrigt_footer); ?>
                       </h4>
            <?php
          }
          else
          {
            ?>
                      <h4>  
                            
                            <?php esc_html_e('Powered by WordPress. Theme by ', 'power-mag'); ?>
                            <a target="_blank" rel="nofollow" href="<?php echo esc_url('http://www.codetrendy.com'); ?>" target="_blank"><?php esc_html_e('CodeTrendy', 'power-mag'); ?></a>
                        </h4>
            <?php
          }
          
        
        
        ?>

		</div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>

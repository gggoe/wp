<?php 
/**
 * Template Name: Left Sidebar
 * Template Post Type: page
 * @since version 1.1.1
 * 
 * @package powermag
 * 
 */
 
 get_header();
 ?>
 
<?php 
//woocomemrce sidebar
if ( class_exists( 'woocommerce' )  && (is_shop() || is_account_page() || is_product() || is_product_category() || is_product_taxonomy() || is_cart() || is_checkout()) && is_active_sidebar('woo_commerce_sidebar'))
    {
           ?>
        <aside id="secondary" class="widget-area" role="complementary">
         <?php dynamic_sidebar('woo_commerce_sidebar'); ?>
        </aside><!-- #secondary -->
        <?php 
    }
elseif(is_active_sidebar('left-sidebar')){
    ?>
    <aside id="secondary" class="widget-area" role="complementary">
	   <?php dynamic_sidebar('left-sidebar'); ?>
    </aside><!-- #secondary -->
    <?php 
    }
?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
        
			<?php
                    
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );
                
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		</main><!-- #main -->
	</div><!-- #primary -->
    
    

<?php 
get_footer();
<?php
/**
 * Template Name: Left Sidebar
 * 
 * Template Post Type: post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Power_Mag
 */

get_header(); 
 ?>
<?php if(is_active_sidebar('left-sidebar')):
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
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', get_post_format() );

			
			the_post_navigation();
            power_mag_post_author();  
            power_mag_related_posts();  
            ?>
            
            <?php
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
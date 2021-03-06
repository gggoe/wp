<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Power_Mag
 */

get_header(); 
$default_sidebar_layout = esc_attr(get_theme_mod('power_mag_default_sidebar_setting', 'right-sidebar')); 
?>
<?php if($default_sidebar_layout ==  'left-sidebar' && is_active_sidebar('left-sidebar')): ?>
    <aside id="secondary" class="widget-area" role="complementary">
        <?php dynamic_sidebar('left-sidebar'); ?>
    </aside><!-- #secondary -->
<?php endif; ?>
    
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if($default_sidebar_layout == 'right-sidebar'):
    get_sidebar();
endif;
get_footer();

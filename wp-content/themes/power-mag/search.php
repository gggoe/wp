<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Power_Mag
 */

get_header();
$default_sidebar_layout = esc_html(get_theme_mod('power_mag_default_sidebar_setting', 'right-sidebar')); 
?>
<?php if($default_sidebar_layout ==  'left-sidebar' && is_active_sidebar('left-sidebar')): ?>
    <aside id="secondary" class="widget-area" role="complementary">
	   <?php dynamic_sidebar('left-sidebar'); ?>
    </aside><!-- #secondary -->
<?php endif; ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php 
                printf( /* translators: %s : description of search string */
                esc_html__( 'Search Results for: %s', 'power-mag' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
if($default_sidebar_layout == 'right-sidebar'):
    get_sidebar();
endif;
get_footer();
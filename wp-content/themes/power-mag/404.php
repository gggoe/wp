<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'power-mag' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<span><?php esc_html_e('404', 'power-mag'); ?></span>
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'power-mag' ); ?></p>
					<?php
						get_search_form();

					?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
if($default_sidebar_layout == 'right-sidebar'):
    get_sidebar();
endif;
get_footer();
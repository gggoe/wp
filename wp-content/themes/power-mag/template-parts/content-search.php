<?php
/**
 * Template part for displaying results in search pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Power_Mag
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if (has_post_thumbnail()){
        ?>
        <div class="search_image wow fadeIn">
            <?php the_post_thumbnail(); ?>
        </div>
        <?php
    } ?>
	<header class="entry-header wow fadeIn">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php power_mag_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-summary wow fadeIn">
        <?php
            power_mag_add_excerpt_length( apply_filters( 'power_mag_service_excerpt_length', absint(50)) );
            the_excerpt();
            power_mag_remove_excerpt_length();
        ?>
	</div><!-- .entry-summary -->
	<footer class="entry-footer wow fadeIn">
		<?php //power_mag_entry_footer(); ?>
        <div class="category_lists">
            <?php power_mag_colored_category(); ?>
        </div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
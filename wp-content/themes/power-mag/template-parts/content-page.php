<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Power_Mag
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header wow fadeIn">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content wow fadeIn">
    <?php if(has_post_thumbnail()): ?>
        <div class="pm_singe_page_post_thumbnail"><?php the_post_thumbnail(); ?></div>
    <?php endif; ?>
		<?php                    
			the_content();
            
            wp_link_pages( array(
                'before' => '<div class="page-links"><strong>'. esc_html__('Pages:','power-mag'),
				'after'  => '</strong></div>',
        		'link_before'      => '<span class="pm_wp_def_link">',
        		'link_after'       => '</span>',
        		'separator'        => '&nbsp;',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer wow fadeIn">
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					esc_html__( 'Edit %s', 'power-mag' ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
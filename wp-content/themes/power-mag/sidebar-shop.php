<?php
if (  is_active_sidebar( 'woo_commerce_sidebar' ) ) {
	?>
    <aside id="secondary" class="widget-area" role="complementary">
    	<?php dynamic_sidebar( 'woo_commerce_sidebar' ); ?>
    </aside><!-- #secondary -->
    <?php
}        
	?>
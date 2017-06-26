<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form" method="get" role="search"> 
		<span class="screen-reader-text"><?php esc_html_e("Search for:","power-mag")?></span>
		<input type="search" name="s" value="<?php echo get_search_query(); ?>" placeholder="<?php esc_html_e("Search","power-mag")?>" class="search-field" > 
		<button value="Search" name="submit" class="searchsubmit" type="submit"><i class="fa fa-search"></i></button>
</form> 
<form role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" >
	<input type="text" class="search-query" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="<?php echo esc_attr( __( 'Search' ) ); ?>"/ >
</form>
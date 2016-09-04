<form action="<?php bloginfo('home'); ?>/" method="get">
	<div>
		<?php
		$defaultSearch = esc_attr(apply_filters('the_search_query', get_search_query()));
		if ( !$defaultSearch ) {
			$defaultSearch = 'Search...';
		}
		?>
		<input class="searchInput" type="text" name="s" value="<?php echo $defaultSearch; ?>" />
	</div>
</form>

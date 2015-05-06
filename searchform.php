<form method="get" role="search" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="input-group">
		<input type="text" class="form-control" name="s" placeholder="<?php esc_attr_e( 'Search', 'satorii' ); ?>" value="<?php the_search_query() ?>">
		<span class="input-group-btn">
			<input type="submit" class="submit btn btn-primary" name="submit" value="<?php esc_attr_e( 'Search', 'satorii' ); ?>" />
		</span>
	</div>
</form>
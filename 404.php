<?php get_header() ?>
	<div id="container">
		<div id="content" class="container">
			<div id="post-0" class="post error404 not-found">
				<h1 class="page-title"><?php _e( 'Not Found', 'satorii' ) ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Apologies, but we were unable to find what you were looking for. Perhaps  searching will help.', 'satorii' ) ?></p>
				</div>
				<?php get_template_part('parts/searchform-lg'); ?>
			</div><!-- .post -->
		</div><!-- #content -->
	</div><!-- #container -->
<?php get_footer() ?>
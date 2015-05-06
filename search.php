<?php get_header() ?>
	<div id="container">
		<div id="content" class="container" role="main">
		<?php if ( have_posts() ) : ?>
			<div id="nav-above">
				<div class="navigation sr-only row">
					<div class="nav-previous col-sm-12 text-left"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'satorii' )) ?></div>
					<div class="nav-next col-sm-12 text-right"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'satorii' )) ?></div>
				</div>
			</div>
			<h1 class="page-title"><?php _e( 'Search Results for:', 'satorii' ) ?> <span class="search-query"><?php the_search_query() ?></span></h1>
<?php while ( have_posts() ) : the_post();
	get_template_part('parts/short-post-template');
	comments_template();
endwhile; ?>
		</div><!-- #content -->
		<div class="container-fluid">
			<div id="nav-below" class="paginated navigation row">
				<?php echo paginate_links( array('echo' => true) ); ?>
			</div>
		</div>
	<?php else: ?>
			<div id="post-0" class="post no-results not-found">
				<h1 class="page-title"><?php _e( 'Nothing Found', 'satorii' ) ?></h1>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'satorii' ) ?></p>
				</div>
				<?php get_template_part('parts/searchform-lg'); ?>
			</div><!-- .post -->
	<?php endif; ?>
	</div><!-- #container -->
<?php get_sidebar() ?>
<?php get_footer() ?>
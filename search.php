<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php if ( have_posts() ) : ?>

		<h2 class="page-title"><?php _e( 'Search Results for:', 'satorii' ) ?> <span><?php the_search_query() ?></span></h2>

			<div id="nav-above" class="navigation yui-g">
				<div class="nav-previous yui-u first"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older results', 'satorii' ) ) ?></div>
				<div class="nav-next yui-u"><?php previous_posts_link( __( 'Newer results <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?></div>
			</div>

<?php while ( have_posts() ) : the_post();

get_template_part('parts/short-post-template');

endwhile; ?>

			<div id="nav-below" class="navigation yui-g">
				<div class="nav-previous yui-u first"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older results', 'satorii' ) ) ?></div>
				<div class="nav-next yui-u"><?php previous_posts_link( __( 'Newer results <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?></div>
			</div>

<?php else : ?>

			<div id="post-0" class="post no-results not-found">
				<h2 class="entry-title"><?php _e( 'Nothing Found', 'satorii' ) ?></h2>
				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'satorii' ) ?></p>
				</div>
				<form id="searchform-no-results" class="blog-search" method="get" action="<?php echo home_url(); ?>">
					<div>
						<input id="s-no-results" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
						<input class="button" type="submit" value="<?php _e( 'Find', 'satorii' ) ?>" />
					</div>
				</form>
			</div><!-- .post -->

<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>

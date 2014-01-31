<?php get_header() ?>

	<div id="container">
		<div id="content">

			<h2 class="page-title"><?php _e( 'Category Archives:', 'satorii' ) ?> <span><?php single_cat_title() ?></span></h2>
			<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>


			<div id="nav-above" class="navigation yui-g">
				<div class="nav-previous yui-u first"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'satorii' ) ) ?></div>
				<div class="nav-next yui-u"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?></div>
			</div>

<?php while ( have_posts() ) : the_post();

get_template_part('parts/short-post-template');

endwhile; ?>

			<div id="nav-below" class="navigation yui-g">
				<div class="nav-previous yui-u first"><?php next_posts_link( __( '<span class="meta-nav">&laquo;</span> Older posts', 'satorii' ) ) ?></div>
				<div class="nav-next yui-u"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?></div>
			</div>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>

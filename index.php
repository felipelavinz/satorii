<?php get_header() ?>
	<div id="container">
		<div id="content" class="container">
			<div id="nav-above">
				<div class="navigation sr-only row">
					<div class="nav-previous col-sm-12 text-left"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'satorii' )) ?></div>
					<div class="nav-next col-sm-12 text-right"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'satorii' )) ?></div>
				</div>
			</div>
<?php while ( have_posts() ) : the_post();
	get_template_part('parts/post-template');
	comments_template();
endwhile; ?>
		</div><!-- #content -->
		<div class="container-fluid">
			<div id="nav-below" class="navigation row">
				<div class="nav-previous col-sm-12 text-left"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'satorii' )) ?></div>
				<div class="nav-next col-sm-12 text-right"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'satorii' )) ?></div>
			</div>
		</div>
	</div><!-- #container -->
<?php get_sidebar() ?>
<?php get_footer() ?>
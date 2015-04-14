<?php get_header() ?>
	<div id="container">
		<div id="content" class="container">
		<?php the_post() ?>
			<div id="nav-above" class="navigation sr-only row">
				<div class="navigation sr-only">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
				</div>
			</div>
			<?php get_template_part('parts/post-template'); ?>
		</div><!-- #content -->
		<div class="container-fluid">
			<div id="nav-below" class="navigation row">
				<div class="nav-previous col-sm-12 text-left"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span> %title' ) ?></div>
				<div class="nav-next col-sm-12 text-right"><?php next_post_link( '%link', '%title <span class="meta-nav">&raquo;</span>' ) ?></div>
			</div>
		</div>
		<?php comments_template() ?>
	</div><!-- #container -->
<?php get_footer() ?>
<?php get_header() ?>
	<div id="container">
		<div id="content" class="container">
			<?php get_template_part('parts/nav-adjacent-above') ?>
<?php while ( have_posts() ) : the_post();
	get_template_part('parts/post-template');
endwhile; ?>
		</div><!-- #content -->
		<?php get_template_part('parts/nav-adjacent-below'); ?>
	</div><!-- #container -->
<?php get_sidebar() ?>
<?php get_footer() ?>
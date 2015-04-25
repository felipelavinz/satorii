<?php get_header() ?>
	<div id="container">
		<div id="content" class="container">
		<?php the_post() ?>
			<?php get_template_part('parts/page-template'); ?>
		</div><!-- #content -->
		<?php comments_template() ?>
	</div><!-- #container -->
<?php get_footer() ?>
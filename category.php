<?php get_header() ?>
	<div id="container">
		<div id="content" class="container">
			<h1 class="page-title">
				<?php echo sprintf( __('Category Archives: %s', 'satorii'), '<span class="page-object">'. single_term_title('', false) .'</span>' ) ?>
			</h1>
			<?php if ( category_description() ) : ?>
			<div class="archive-meta lead">
				<?php echo apply_filters('the_content', category_description() ); ?>
			</div>
			<?php endif; ?>
			<?php get_template_part('parts/nav-adjacent-above') ?>
<?php while ( have_posts() ) : the_post();
	get_template_part('parts/short-post-template');
endwhile; ?>
		</div><!-- #content -->
		<?php get_template_part('parts/nav-adjacent-below'); ?>
	</div><!-- #container -->
<?php get_sidebar() ?>
<?php get_footer() ?>

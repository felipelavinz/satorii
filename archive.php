<?php get_header() ?>
	<div id="container">
		<div id="content" class="container" role="main">
<?php the_post() ?>
<?php if ( is_day() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Daily Archives: <span class="page-object">%s</span>', 'satorii' ), get_the_time(get_option('date_format')) ) ?></h1>
<?php elseif ( is_month() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Monthly Archives: <span class="page-object">%s</span>', 'satorii' ), get_the_time('F Y') ) ?></h1>
<?php elseif ( is_year() ) : ?>
			<h1 class="page-title"><?php printf( __( 'Yearly Archives: <span class="page-object">%s</span>', 'satorii' ), get_the_time('Y') ) ?></h1>
<?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
			<h1 class="page-title"><?php _e( 'Blog Archives', 'satorii' ) ?></h1>
<?php endif; ?>
<?php rewind_posts() ?>
			<?php get_template_part('parts/nav-adjacent-above'); ?>
<?php while ( have_posts() ) : the_post();

get_template_part('parts/short-post-template');

endwhile; ?>
		</div><!-- #content -->
		<?php get_template_part('parts/nav-adjacent-below'); ?>
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>

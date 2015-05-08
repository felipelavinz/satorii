<?php get_header() ?>
	<div id="container">
		<div id="content" class="container" role="main">
			<?php the_post() ?>
			<h1 class="page-title author">
				<?php printf( __( 'Author Archives: <span class="vcard page-object">%s</span>', 'satorii' ), '<a class="url fn n" href="'. esc_url( $authordata->user_url ) .'" rel="me">'. $authordata->display_name .'</a>') ?>
			</h1>
			<?php $authordesc = $authordata->user_description; if ( !empty($authordesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta lead">' . $authordesc . '</div>' ); ?>

			<?php get_template_part('parts/nav-adjacent-above'); ?>

<?php rewind_posts() ?>

<?php while ( have_posts() ) : the_post();

get_template_part('parts/short-post-template');

endwhile; ?>

		</div><!-- #content -->
			<?php get_template_part('parts/nav-adjacent-below'); ?>
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>

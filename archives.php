<?php
/*
Template Name: Archives Page
*/
?>
<?php get_header() ?>

	<div id="container">
		<div id="content">

<?php the_post() ?>

			<div id="post-<?php the_ID() ?>" class="<?php sandbox_post_class() ?>">
				<h2 class="entry-title"><?php the_title() ?></h2>
				<div class="entry-content">
<?php the_content() ?>

				<div class="yui-g">
					<div class="yui-u first" id="category-archives">
							<h3><?php _e( 'Archives by Category', 'satorii' ) ?></h3>
							<ul>
								<?php wp_list_categories('optioncount=1&title_li=&show_count=1') ?>
							</ul>
					</div>
					<div class="yui-u" id="monthly-archives">
							<h3><?php _e( 'Archives by Month', 'satorii' ) ?></h3>
							<ul>
								<?php wp_get_archives('type=monthly&show_post_count=1') ?>
							</ul>
					</div>
				</div>

<?php edit_post_link( __( 'Edit', 'satorii' ), '<span class="edit-link">', '</span>' ) ?>

				</div>
			</div><!-- .post -->

<?php if ( get_post_custom_values('comments') ) comments_template() // Add a key/value of "comments" to enable comments on pages! ?>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>

<?php get_header() ?>

	<div id="container">
		<div id="content">

			<div id="nav-above" class="navigation yui-g">
				<div class="nav-previous yui-u first"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'satorii' )) ?></div>
				<div class="nav-next yui-u"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'satorii' )) ?></div>
			</div>

<?php while ( have_posts() ) : the_post() ?>

			<div id="post-<?php the_ID() ?>" <?php post_class(); ?>>
				<h2 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'satorii'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
				<div class="entry-content">
<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?>
				<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'satorii' ) . '&after=</div>') ?>
				<?php the_tags( __( '<p class="tag-links"><span>Tagged:</span> ', 'satorii' ), ', ', '</p>') ?>
				</div>
				<dl class="entry-meta">
					<dt><?php _e('Published:', 'satorii')?></dt>
						<dd class="entry_date"><a href="<?php the_permalink(); ?>" rel="bookmark"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s', 'satorii' ), the_date( '', '', '', false ), get_the_time() ) ?></abbr></a></dd>
					<dt><?php _e('Author:', 'satorii')?></dt>
						<dd class="author vcard"><?php printf( __( 'By %s', 'satorii' ), '<a class="url fn n" href="' . get_author_posts_url( $post->post_author ) . '" title="' . sprintf( __( 'View all posts by %s', 'satorii' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></dd>
					<dt><?php _e('Categories:', 'satorii')?></dt>
						<dd class="cat-links">
						<?php the_category(); ?>
						</dd>
					<dt><?php _e('Comments:', 'satorii')?></dt>
						<dd class="comments-link"><?php comments_popup_link( __( 'None', 'satorii' ), __( '1 Comment', 'satorii' ), __( '% Comments', 'satorii' ) ) ?></dd>
					<?php edit_post_link( __('Edit this post', 'satorii'), __('<dt>Edit</dt><dd class="edit-link">', 'satorii'), '</dd>');?>
				</dl>
			</div><!-- .post -->

<?php comments_template() ?>

<?php endwhile; ?>

			<div id="nav-below" class="navigation yui-g">
				<div class="nav-previous yui-u first"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> Older posts', 'satorii' )) ?></div>
				<div class="nav-next yui-u"><?php previous_posts_link(__( 'Newer posts <span class="meta-nav">&raquo;</span>', 'satorii' )) ?></div>
			</div>

		</div><!-- #content -->
	</div><!-- #container -->

<?php get_sidebar() ?>
<?php get_footer() ?>

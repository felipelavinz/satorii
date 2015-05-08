<?php
get_header();
the_post();
?>
	<div id="container">
		<div id="content">
			<div id="post-<?php the_ID() ?>" <?php post_class(); ?> itemscope itemtype="http://schema.org/ImageObject">
				<div class="container">
					<h1 class="page-title">
						<a href="<?php echo get_permalink($post->post_parent) ?>" title="<?php echo esc_attr( sprintf( __( 'Return to %s', 'satorii' ), get_the_title($post->post_parent) ) ) ?>" rev="attachment">
							<?php echo get_the_title($post->post_parent) ?>
						</a>
						&gt;
						<span class="page-object" itemprop="name"><?php the_title() ?></span>
					</h1>
				</div>
				<div class="entry-attachment">
					<a href="<?php echo wp_get_attachment_url($post->ID); ?>" title="<?php echo esc_html( get_the_title($post->ID), 1 ) ?>" rel="attachment">
						<?php echo wp_get_attachment_image( $post->ID, 'full', array('itemprop' => 'contentUrl') ); ?></a>
				</div>
				<div class="container">
					<?php if ( has_excerpt() ) : ?>
					<div class="entry-summary lead" itemprop="caption">
						<?php the_excerpt(); ?>
					</div>
					<?php endif; ?>
					<?php if ( get_the_content() ) : ?>
					<div class="entry-content" itemprop="description">
						<?php the_content() ?>
					</div>
					<?php endif; ?>
					<div class="entry-meta">
						<?php printf( __( 'Posted by %1$s on <time class="published" title="%2$sT%3$s" itemprop="datePublished">%4$s at %5$s</time>. Bookmark the <a href="%6$s" title="Permalink to %7$s" rel="bookmark">permalink</a>. Follow any comments here with the <a href="%8$s" title="Comments RSS to %7$s" rel="alternate" type="application/rss+xml">RSS feed for this post</a>.', 'satorii' ),
							'<span class="author vcard"><a class="url fn n" href="' . get_author_posts_url( $post->post_author ) . '" title="' . sprintf( __( 'View all posts by %s', 'satorii' ), $authordata->display_name ) . '">' . get_the_author() . '</a></span>',
							get_the_time('Y-m-d'),
							get_the_time('H:i:sO'),
							the_date( '', '', '', false ),
							get_the_time(),
							get_permalink(),
							the_title_attribute('echo=0'),
							get_post_comments_feed_link() ) ?>
	<?php if ( ('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Comments and trackbacks open ?>
						<?php printf( __( '<a class="comment-link" href="#respond" title="Post a comment">Post a comment</a> or leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'satorii' ), get_trackback_url() ) ?>
	<?php elseif ( !('open' == $post->comment_status) && ('open' == $post->ping_status) ) : // Only trackbacks open ?>
						<?php printf( __( 'Comments are closed, but you can leave a trackback: <a class="trackback-link" href="%s" title="Trackback URL for your post" rel="trackback">Trackback URL</a>.', 'satorii' ), get_trackback_url() ) ?>
	<?php elseif ( ('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Only comments open ?>
						<?php _e( 'Trackbacks are closed, but you can <a class="comment-link" href="#respond" title="Post a comment">post a comment</a>.', 'satorii' ) ?>
	<?php elseif ( !('open' == $post->comment_status) && !('open' == $post->ping_status) ) : // Comments and trackbacks closed ?>
						<?php _e( 'Both comments and trackbacks are currently closed.', 'satorii' ) ?>
	<?php endif; ?>
						<?php edit_post_link( __( 'Edit', 'satorii' ), "<p><span class=\"edit-link\">", "</span></p>" ) ?>
					</div>
				</div>
			</div><!-- .post -->
			<div id="nav-images" class="container nav-images">
				<div class="row">
					<div class="col-xs-12 text-left previous">
						<?php next_image_link() ?>
					</div>
					<div class="col-xs-12 text-right next">
						<?php previous_image_link() ?>
					</div>
				</div>
			</div>
<?php comments_template() ?>
		</div><!-- #content -->
	</div><!-- #container -->
<?php get_footer() ?>
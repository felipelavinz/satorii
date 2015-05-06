<?php global $authordata; ?>
<article id="post-<?php the_ID() ?>" <?php post_class('entry'); ?> itemscope itemtype="http://schema.org/Article">
	<div class="row">
		<header class="col-md-offset-3 col-md-18 col-sm-24">
			<h2 class="entry-title" itemprop="name">
				<a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'satorii'), the_title_attribute('echo=0') ) ?>" rel="bookmark">
					<?php the_title() ?>
				</a>
				<?php if ( comments_open() || pings_open() || get_comments_number() > 0 ) : ?>
				<span class="comments-link"><i class="dashicons dashicons-admin-comments"></i><?php echo comments_popup_link( '0','1','%' ) ?></span>
				<?php endif; ?>
			</h2>
		</header>
	</div>
	<div class="row">
		<?php if ( get_post_type() == 'post' ) : ?>
		<div class="col-md-13 col-md-push-5 col-md-offset-3 col-sm-19 col-sm-push-5">
			<div class="entry-summary" itemprop="description">
				<?php the_excerpt( ); ?>
			</div>
			<?php wp_link_pages('before=<p class="page-link pagination">' . __( 'Pages:', 'satorii' ) . '&after=</p>') ?>
			<p class="cat-links tax-links"><i class="dashicons dashicons-category"></i><span class="taxonomy"><?php _e('Categories:', 'satorii')?></span> <?php the_category(', ') ?></p>
			<?php the_tags( __( '<p class="tag-links tax-links"><i class="dashicons dashicons-tag"></i><span class="taxonomy">Tagged:</span> <span itemprop="keywords">', 'satorii' ), ', ', '</span></p>') ?>
			<?php edit_post_link( sprintf( __('Edit <span class="sr-only">%s</span>', 'satorii'), get_the_title() ) , '<p><span class="edit-link"><i class="dashicons dashicons-edit"></i>', '</span></p>');?>
		</div>
		<div class="col-md-5 col-md-pull-13 col-sm-5 col-sm-pull-19">
			<dl class="entry-meta">
				<dt><?php _e('Published:', 'satorii')?></dt>
					<dd class="entry_date"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark"><time class="published" datetime="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php printf( __( '%1$s &#8211; %2$s', 'satorii' ), get_the_time( get_option('date_format') ), get_the_time() ) ?></time></a></dd>
				<dt><?php _e('Author:', 'satorii')?></dt>
					<dd class="author vcard"><?php printf( __( 'By %s', 'satorii' ), '<a itemprop="author" class="url fn n" href="' . get_author_posts_url( $post->post_author ) . '" title="' . sprintf( __( 'View all posts by %s', 'satorii' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></dd>
			</dl>
		</div>
		<?php else : ?>
		<div class="col-md-14 col-md-push-5 col-sm-19 col-sm-push-5">
			<div class="entry-summary" itemprop="description">
				<?php the_excerpt( ); ?>
			</div>
			<?php wp_link_pages('before=<div class="page-link pagination">' . __( 'Pages:', 'satorii' ) . '&after=</div>') ?>
			<?php the_tags( __( '<p class="tag-links tax-links"><i class="dashicons dashicons-tag"></i><span taxonomy>Tagged:</span> <span itemprop="keywords">', 'satorii' ), ', ', '</span></p>') ?>
		</div>
		<?php endif; ?>
	</div>
</article><!-- .post -->
<?php
	global $authordata;
 ?>
<article id="post-<?php the_ID() ?>" <?php post_class('entry'); ?> itemscope itemtype="http://schema.org/Article">
	<div class="row">
		<header class="col-md-offset-3 col-md-18">
			<h2 class="entry-title" itemprop="name"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'satorii'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
		</header>
	</div>
	<div class="row">
		<div class="col-md-13 col-md-push-5 col-md-offset-3">
			<div class="entry-content" itemprop="articleBody">
<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?>
			</div>
			<?php wp_link_pages('before=<div class="page-link">' . __( 'Pages:', 'satorii' ) . '&after=</div>') ?>
			<?php the_tags( __( '<p class="tag-links"><span>Tagged:</span> <span itemprop="keywords">', 'satorii' ), ', ', '</span></p>') ?>
		</div>
		<div class="col-md-5 col-md-pull-13">
			<dl class="entry-meta">
				<dt><?php _e('Published:', 'satorii')?></dt>
					<dd class="entry_date"><a itemprop="url" href="<?php the_permalink(); ?>" rel="bookmark"><time class="published" datetime="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s', 'satorii' ), the_date( '', '', '', false ), get_the_time() ) ?></time></a></dd>
				<dt><?php _e('Author:', 'satorii')?></dt>
					<dd class="author vcard"><?php printf( __( 'By %s', 'satorii' ), '<a itemprop="author" class="url fn n" href="' . get_author_posts_url( $post->post_author ) . '" title="' . sprintf( __( 'View all posts by %s', 'satorii' ), $authordata->display_name ) . '">' . get_the_author() . '</a>' ) ?></dd>
				<dt><?php _e('Categories:', 'satorii')?></dt>
					<dd class="cat-links" itemprop="articleSection">
					<?php the_category(); ?>
					</dd>
				<dt><?php _e('Comments:', 'satorii')?></dt>
					<dd class="comments-link" itemprop="commentCount"><?php comments_popup_link( __( 'None', 'satorii' ), __( '1 Comment', 'satorii' ), __( '% Comments', 'satorii' ) ) ?></dd>
				<?php edit_post_link( __('Edit this post', 'satorii'), __('<dt>Edit</dt><dd class="edit-link">', 'satorii'), '</dd>');?>
			</dl>
		</div>
	</div>
</article><!-- .post -->
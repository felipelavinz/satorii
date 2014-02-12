			<div id="post-<?php the_ID() ?>" <?php post_class();?>>
				<h3 class="entry-title"><a href="<?php the_permalink() ?>" title="<?php printf( __( 'Permalink to %s', 'satorii' ), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a> <span class="comments-link"><i class="dashicons dashicons-admin-comments"></i><?php comments_popup_link( '0','1','%' ) ?></span> <?php edit_post_link( __('Edit', 'satorii'), ' · <span class="edit-link"><i class="dashicons dashicons-edit"></i>', '</span>');?></h3>
				<div class="entry-content">
<?php the_excerpt( __( 'Read More <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?>
				<?php if ( $post->post_type == 'post' ) { ?><p class="cat-links"><i class="dashicons dashicons-category"></i><span><?php _e('Categories:', 'satorii')?></span> <?php the_category(',') ?></p><?php } ?>
				<?php the_tags( __( '<p class="tag-links"><i class="dashicons dashicons-tag"></i><span>Tagged:</span> ', 'satorii' ), ', ', '</p>') ?>
				</div>
				<?php if ( $post->post_type == 'post') { ?>
				<dl class="entry-meta">
					<dt><?php _e('Published:', 'satorii')?></dt>
						<dd class="entry_date"><a href="<?php the_permalink(); ?>" rel="bookmark"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php unset($previousday); printf( __( '%1$s &#8211; %2$s', 'satorii' ), the_date( '', '', '', false ), get_the_time() ) ?></abbr></a></dd>
					<dt><?php _e('Author:', 'satorii')?></dt>
						<dd class="author vcard"><?php printf( __( 'By %s', 'satorii' ), '<a class="url fn n" href="' . get_author_posts_url( $post->post_author ) . '" title="' . sprintf( __( 'View all posts by %s', 'satorii' ), get_the_author() ) . '">' . get_the_author() . '</a>' ) ?></dd>
				</dl>
				<?php } ?>
			</div><!-- .post -->

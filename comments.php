<?php
	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
		die ( 'Please do not load this page directly. Thanks.' );
	$ping_count = $comment_count = 0;
?>
			<div id="comments">
<?php
	if ( !empty($post->post_password) ) :
		if ( isset($_COOKIE['wp-postpass_' . COOKIEHASH]) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) :
?>
				<div class="nopassword"><?php _e( 'This post is protected. Enter the password to view any comments.', 'satorii' ) ?></div>
			</div><!-- .comments -->
<?php
		return;
	endif;
endif;
?>
<?php if ( $comments ) : ?>
<?php global $sandbox_comment_alt ?>

<?php // Number of pings and comments
foreach ( $comments as $comment )
	get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;
?>

				<div class="yui-gd">

				<div id="trackbacks-list" class="comments yui-u first">

					<h3><?php printf($ping_count > 0 ? __('<span>%d</span> Trackbacks', 'satorii') : __('<span>No</span> Trackbacks', 'satorii'), $ping_count) ?></h3>
						<?php if ( pings_open() ) { ?>
							<p class="leave-trackback"><?php _e('You can leave a trackback using this <acronym title="Universal Resource Locator">URL</acronym>:', 'satorii'); ?> <span class="trackback-url"><?php trackback_url();?></span></p>
						<?php } ?>
				<?php if ( $ping_count ) : ?>
				<?php $sandbox_comment_alt = 0 ?>
					<ol>
<?php wp_list_comments('type=pings&callback=satorii_list_pings'); //list comments?>
					</ol>
<?php endif // REFERENCE: if ( $ping_count ) ?>
				</div><!-- #trackbacks-list .comments -->

				<div id="comments-list" class="comments yui-u">

<?php if ( $comment_count ) : ?>
<?php $sandbox_comment_alt = 0 ?>

					<h3><?php printf($comment_count > 1 ? __('<span>%d</span> Comments', 'satorii') : __('<span>One</span> Comment', 'satorii'), $comment_count) ?></h3>
					<ol>
<?php wp_list_comments('type=comment&callback=satorii_list_comments'); //list comments?>
					</ol>
				</div><!-- #comments-list .comments -->

<?php endif; // REFERENCE: if ( $comment_count ) ?>
				</div>


<?php if ( get_previous_comments_link() || get_next_comments_link() ): ?>
				<div id="nav-comments" class="navigation yui-g">
					<div class="nav-previous yui-u first"><?php previous_comments_link($label=__('<span class="meta-nav">&laquo;</span> Previous Comments', 'satorii')); ?></div>
					<div class="nav-next yui-u"><?php next_comments_link($label=__('Next Comments <span class="meta-nav">&raquo;</span>', 'satorii')); ?></div>
				</div><!-- #nav-comments -->
<?php endif; // REFERENCE: if ( $comments ) ?>

<?php endif // REFERENCE: if ( !get_previous_comments_link() || !get_next_comments_link() ) ?>
<?php if ( 'open' == $post->comment_status ) : ?>
<?php $req = get_option('require_name_email'); // Checks if fields are required. Thanks, Adam. ;-) ?>

				<div id="respond"<?php if ( $comment_count == 0 ) : echo ' class="no-replies"'; endif; ?>>
					<h3><?php _e( 'Post a Comment', 'satorii' ) ?></h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
					<p id="login-req"><?php printf(__('You must be <a href="%s" title="Log in">logged in</a> to post a comment.', 'satorii'),
					get_bloginfo('wpurl') . '/wp-login.php?redirect_to=' . get_permalink() ) ?></p>

<?php else : ?>
					<div class="formcontainer">
						<form id="commentform" action="<?php bloginfo('wpurl') ?>/wp-comments-post.php" method="post">

<?php if ( $user_ID ) : ?>
							<p id="login"><?php printf( __( '<span class="loggedin">Logged in as <a href="%1$s" title="Logged in as %2$s">%2$s</a>.</span> <span class="logout"><a href="%3$s" title="Log out of this account">Log out?</a></span>', 'satorii' ),
								get_bloginfo('wpurl') . '/wp-admin/profile.php',
								esc_html( $user_identity, 1 ),
								wp_logout_url(get_permalink()) ) ?></p>

<?php else : ?>

							<p id="comment-notes"><?php _e( 'Your email is <em>never</em> shared.', 'satorii' ) ?> <?php if ($req) _e( 'Required fields are marked <span class="required">*</span>', 'satorii' ) ?></p>

							<div class="yui-gf">
							<div class="yui-u first">
							<div class="form-label"><label for="author"><?php _e( 'Name', 'satorii' ) ?></label> <?php if ($req) _e( '<span class="required">*</span>', 'satorii' ) ?></div>
							<div class="form-input"><input id="author" name="author" class="text<?php if ($req) echo ' required'; ?>" type="text" value="<?php echo $comment_author ?>" size="30" maxlength="50" tabindex="3" /></div>

							<div class="form-label"><label for="email"><?php _e( 'Email', 'satorii' ) ?></label> <?php if ($req) _e( '<span class="required">*</span>', 'satorii' ) ?></div>
							<div class="form-input"><input id="email" name="email" class="text<?php if ($req) echo ' required'; ?>" type="text" value="<?php echo $comment_author_email ?>" size="30" maxlength="50" tabindex="4" /></div>

							<div class="form-label"><label for="url"><?php _e( 'Website', 'satorii' ) ?></label></div>
							<div class="form-input"><input id="url" name="url" class="text" type="text" value="<?php echo $comment_author_url ?>" size="30" maxlength="50" tabindex="5" /></div>
							</div>

<?php endif // REFERENCE: * if ( $user_ID ) ?>

							<div class="yui-u" id="form-textarea">
							<div class="cancel-comment-reply"><?php cancel_comment_reply_link() ?></div>
							<div class="form-label"><label for="comment"><?php _e( 'Comment', 'satorii' ) ?></label></div>
							<div class="form-textarea"><textarea id="comment" name="comment" class="text required" cols="45" rows="8" tabindex="6"></textarea></div>

							<div class="form-submit"><input id="submit" name="submit" class="button" type="submit" value="<?php _e( 'Post Comment', 'satorii' ) ?>" tabindex="7" /><?php comment_id_fields(); ?></div>
							</div>
							</div>

							<div class="form-option"><?php do_action( 'comment_form', $post->ID ) ?></div>

						</form><!-- #commentform -->
					</div><!-- .formcontainer -->
<?php endif // REFERENCE: if ( get_option('comment_registration') && !$user_ID ) ?>

				</div><!-- #respond -->

<?php endif // REFERENCE: if ( 'open' == $post->comment_status ) ?>

			</div><!-- #comments -->

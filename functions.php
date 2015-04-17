<?php

define( 'TEMPLATE_URL', get_template_directory_uri() );

if ( !isset( $content_width ) ) $content_width = 480;

/*
This file is part of SANDBOX.

SANDBOX is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 2 of the License, or (at your option) any later version.

SANDBOX is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with SANDBOX. If not, see http://www.gnu.org/licenses/.
*/

function satorii_globalnav(){
	wp_nav_menu( array(
		'menu' => 'globalnav',
		'container' => 'nav',
		'container_id' => 'globalnav',
		'container_class' => 'globalnav',
		'menu_class' => 'globalnav-menu',
		'echo' => true,
		'depth' => 1,
		'theme_location' => 'globalnav',
		'fallback_cb' => null
	));
}

// Produces a list of pages in the header without whitespace
function satorii_globalnav_fallback() {
	if ( $menu = str_replace( array( "\r", "\n", "\t" ), '', wp_list_pages('title_li=&sort_column=menu_order&echo=0&depth=1') ) )
		$menu = '<ul class="nav nav-pills">' . $menu . '</ul>';
	$menu = '<div id="menu">' . $menu . "</div>\n";
	echo apply_filters( 'globalnav_menu', $menu ); // Filter to override default globalnav: globalnav_menu
}

// Define the num val for 'alt' classes (in post DIV and comment LI)
$sandbox_post_alt = 1;

// Generates semantic classes for each comment LI element
function sandbox_comment_class( $print = true ) {
	global $comment, $post, $sandbox_comment_alt;

	// Collects the comment type (comment, trackback),
	$c = array( $comment->comment_type );

	// Counts trackbacks (t[n]) or comments (c[n])
	if ( $comment->comment_type == 'comment' ) {
		$c[] = "c$sandbox_comment_alt";
	} else {
		$c[] = "t$sandbox_comment_alt";
	}

	// If the comment author has an id (registered), then print the log in name
	if ( $comment->user_id > 0 ) {
		$user = get_userdata($comment->user_id);
		// For all registered users, 'byuser'; to specificy the registered user, 'commentauthor+[log in name]'
		$c[] = 'byuser comment-author-' . sanitize_title_with_dashes(strtolower( $user->user_login ));
		// For comment authors who are the author of the post
		if ( $comment->user_id === $post->post_author )
			$c[] = 'bypostauthor';
	}

	// If it's the other to the every, then add 'alt' class; collects time- and date-based classes
	sandbox_date_classes( mysql2date( 'U', $comment->comment_date ), $c, 'c-' );
	if ( ++$sandbox_comment_alt % 2 )
		$c[] = 'alt';

	// Separates classes with a single space, collates classes for comment LI
	$c = join( ' ', apply_filters( 'comment_class', $c ) ); // Available filter: comment_class

	// Tada again!
	return $print ? print($c) : $c;
}

// Generates time- and date-based classes for BODY, post DIVs, and comment LIs; relative to GMT (UTC)
function sandbox_date_classes( $t, &$c, $p = '' ) {
	$t = $t + ( get_option('gmt_offset') * 3600 );
	$c[] = $p . 'y' . gmdate( 'Y', $t ); // Year
	$c[] = $p . 'm' . gmdate( 'm', $t ); // Month
	$c[] = $p . 'd' . gmdate( 'd', $t ); // Day
	$c[] = $p . 'h' . gmdate( 'H', $t ); // Hour
}

// For category lists on category archives: Returns other categories except the current one (redundant)
function sandbox_cats_meow($glue) {
	$current_cat = single_cat_title( '', false );
	$separator = "\n";
	$cats = explode( $separator, get_the_category_list($separator) );
	foreach ( $cats as $i => $str ) {
		if ( strstr( $str, ">$current_cat<" ) ) {
			unset($cats[$i]);
			break;
		}
	}
	if ( empty($cats) )
		return false;

	return trim(join( $glue, $cats ));
}

// For tag lists on tag archives: Returns other tags except the current one (redundant)
function sandbox_tag_ur_it($glue) {
	$current_tag = single_tag_title( '', '',  false );
	$separator = "\n";
	$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
	foreach ( $tags as $i => $str ) {
		if ( strstr( $str, ">$current_tag<" ) ) {
			unset($tags[$i]);
			break;
		}
	}
	if ( empty($tags) )
		return false;

	return trim(join( $glue, $tags ));
}

// Produces an avatar image with the hCard-compliant photo class
function sandbox_commenter_link() {
	$commenter = get_comment_author_link();
	$avatar_email = get_comment_author_email();
	$avatar_size = apply_filters( 'avatar_size', '32' ); // Available filter: avatar_size
	$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, $avatar_size ) );
	echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}

function satorii_list_comments($comment, $args, $depth) { // Enables threaded comments (WordPress 2.7 or higher)
	$GLOBALS['comment'] = $comment; ?>
						<li id="comment-<?php comment_ID() ?>" <?php comment_class('yui-gf fw') ?>>
							<div class="comment-author vcard yui-u first"><?php sandbox_commenter_link() ?></div>
							<div class="yui-u">
								<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'satorii') ?>
							<div class="comment-text"><?php comment_text() ?></div>
							<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep">|</span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'satorii'),
										get_comment_date(),
										get_comment_time(),
										'#comment-' . get_comment_ID() );
										edit_comment_link(__('Edit', 'satorii'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>');
										comment_reply_link(array_merge( $args, array('add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth'], 'before' => ' <span class="meta-sep">|</span> <span class="reply">', 'after' => '</span>'))) ?></div>
							</div>

<?php } // REFERENCE: function satorii_list_comments()

function satorii_list_pings($comment, $args, $depth) { // Uses the new functions (WP2.7) to display pingbacks and trackbacks, maybe useless, but with newer code
	$GLOBALS['comment'] = $comment; ?>
						<li id="comment-<?php comment_ID() ?>" >
							<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'satorii'),
									get_comment_author_link(),
									get_comment_date(),
									get_comment_time() );
									edit_comment_link(__('Edit', 'satorii'), ' <span class="meta-sep">|</span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'satorii') ?>
							<div class="trackback-text"><?php comment_text() ?></div>
<?php } // REFERENCE: function satorii_list_pings()

function satorii_page_nav($echo=true){
	global $post;
	$ancestors = $post->ancestors;
	$ancestors_q = count($ancestors);
	$urvater = ( $ancestors_q === 0 ) ? $post->ID : end($ancestors);
	// If this is a top-level page, we'll show it's children; otherwhise we'll show
	// current top-level forefather's children
	$menu = substr(wp_list_pages('sort_column=menu_order&child_of=' . $urvater .'&echo=0&title_li=<h3 class="page-links-title">' . get_the_title($urvater) . '</h3>'), 20, -5);
	$out = !empty($menu) ? '<div class="page-meta">'. $menu .'</div>' : null;
	if ( $echo ) echo $out;
	else return $out;
}



// Runs our code at the end to check that everything needed has loaded
add_action( 'init', 'sandbox_widgets_init' );

// Adds filters for the description/meta content in archives.php
add_filter( 'archive_meta', 'wptexturize' );
add_filter( 'archive_meta', 'convert_smilies' );
add_filter( 'archive_meta', 'convert_chars' );
add_filter( 'archive_meta', 'wpautop' );

/**
 * Theme controller
 * Manage actions, filters and custom functions
 */
class satorii{
	private static $instance;
	private $template_uri;
	const theme_ver = 1.5;
	const theme_uri = 'http://www.yukei.net';
	private $default_background_color = 'ffffff';
	private $default_header_text_color = '000000';
	private $body_classes = null;
	private function __construct(){
		$this->setup_hooks();
		$this->template_uri = get_stylesheet_directory_uri();
	}
	public static function get_instance(){
		if ( !isset(self::$instance) ){
			$c = __CLASS__;
			self::$instance = new $c;
		}
		return self::$instance;
	}
	public function __clone(){
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}
	public function __get( $key ){
		return isset( $this->$key ) ? $this->$key : null;
	}
	public function setup_hooks(){
		add_action( 'after_setup_theme', array($this, 'setup_theme') );
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_assets') );
		add_action( 'comment_form_after', array($this, 'balance_comment_form') );
		add_action( 'wp_footer', array($this, 'add_footer_credits') );
		add_filter( 'post_gallery', array($this, 'filter_gallery'), 10, 2);
		add_action( 'widgets_init', array($this, 'register_sidebars') );
		add_filter( 'body_class', array($this, 'filter_body_class') );

		// @todo create action to print the header_textcolor css and other customizer-generated code
	}
	public function filter_body_class( $classes ){
		$mods = get_theme_mods();

		// using a custom background color
		if ( ! empty($mods['background_color']) && $mods['background_color'] !== $this->get_default_background_color() ) {
			$classes[] = 'satorii-uses-custom-background-color';
		}

		// using a custom background image
		if ( ! empty($mods['background_image']) ) {
			$classes[] = 'satorii-uses-custom-background-image';
		}

		if ( ! empty($mods['header_textcolor']) ) {
			if ( $mods['header_textcolor'] === 'blank' ) {
				// hide header text
				$classes[] = 'satorii-uses-hidden-header-text';
			} elseif ( $mods['header_textcolor'] !== $this->get_default_header_text_color() ) {
				// ... or using a custom color
				$classes[] = 'satorii-uses-custom-header-textcolor';
			}
		}

		// using header image
		if ( ! empty($mods['header_image']) && $mods['header_image'] !== 'remove-header' ) {
			$classes[] = 'satorii-uses-custom-header-image';
		}

		return $classes;
	}
	public function add_footer_credits(){
		echo '<p><strong>', bloginfo('name') ,'</strong> <a href="', bloginfo('rss2_url') ,'">(RSS)</a> + <strong>Satorii</strong> theme by <a href="'. self::theme_uri .'">Felipe Lav&iacute;n</a></p>';
	}

	public function get_default_background_color(){
		return apply_filters('satorii_default_background_color', $this->default_background_color);
	}

	public function get_default_header_text_color(){
		return apply_filters('satorii_default_header_text_color', $this->default_header_text_color);
	}

	public function setup_theme(){
		// Translate, if applicable
		load_theme_textdomain( 'satorii', dirname( __FILE__ ) .'/translation' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );

		/*
		 * Enable support for Post Formats.
		 * See http://codex.wordpress.org/Post_Formats
		 */
		// add_theme_support( 'post-formats', array(
		// 	'aside', 'image', 'video', 'quote', 'link', 'gallery',
		// ) );

		add_theme_support( 'custom-background', array(
			'default-color' => $this->get_default_background_color()
		) );

		add_theme_support( 'custom-header', array(
			'width'       => 1170,
			'height'      => 438,
			'flex-width'  => true,
			'flex-height' => false,
			'header-text' => true,
			'default-text-color' => $this->get_default_header_text_color()
		) );

		// register nav menu locations
		register_nav_menus( array(
			'globalnav' => __('Main menu', 'satorii')
		));
	}
	public function register_sidebars(){
		// Formats the Satorii widgets, adding readability-improving whitespace
		$p = array(
			'before_widget'  =>   "\n\t\t\t" . '<li id="%1$s" class="widget %2$s">',
			'after_widget'   =>   "\n\t\t\t</li>\n",
			'before_title'   =>   "\n\t\t\t\t". '<h3 class="widgettitle">',
			'after_title'    =>   "</h3>\n"
		);

		// Table for how many? Two? This way, please.
		register_sidebars( 3, $p );
	}
	public function enqueue_assets(){
		// enqueue styles
		// wp_enqueue_style( 'yui-reset-fonts-grids', $this->template_uri .'/css/reset-fonts-grids.css', array(), '2.5.1', 'all' );
		// wp_enqueue_style( 'yui-base', $this->template_uri .'/css/base-min.css', array('yui-reset-fonts-grids'), '2.5.1', 'all' );
		wp_enqueue_style( 'satorii-fonts', '//fonts.googleapis.com/css?family=Questrial|Roboto:400,400italic,700,700italic', array(), self::theme_ver, 'all' );
		// wp_enqueue_style( 'satorii', get_stylesheet_uri(), array('yui-reset-fonts-grids', 'yui-base', 'dashicons', 'satorii-fonts'), self::theme_ver, 'all' );
		wp_enqueue_style( 'satorii', $this->template_uri .'/css/style.css', array('dashicons', 'satorii-fonts'), self::theme_ver, 'all' );
		// wp_enqueue_style( 'fancybox-css', $this->template_uri .'/css/jquery.fancybox-1.3.4.css', array(), '1.3.4', 'screen' );

		// ... aaand scripts
		wp_enqueue_script( 'jquery' );
		// wp_enqueue_script( 'fancybox', $this->template_uri .'/js/jquery.fancybox-1.3.4.pack.js', array('jquery'), '1.3.4', true );
		wp_enqueue_script( 'satorii-js', $this->template_uri .'/js/satorii.js', array('jquery'), self::theme_ver, true );
		wp_enqueue_script( 'livereload', '//localhost:35729/livereload.js', array() );
	}
	public function balance_comment_form(){
		if ( ! is_user_logged_in() ) {
			echo '</div>';
		}
	}
	public function filter_gallery( $out = '', $attr = array() ){
		static $instance = 0;
		$instance++;
		$post  = get_post();
		$html5 = true;
		$atts  = shortcode_atts( array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post ? $post->ID : 0,
			'itemtag'    => $html5 ? 'figure'     : 'dl',
			'icontag'    => $html5 ? 'div'        : 'dt',
			'captiontag' => $html5 ? 'figcaption' : 'dd',
			'columns'    => 3,
			'size'       => 'thumbnail',
			'include'    => '',
			'exclude'    => '',
			'link'       => ''
		), $attr, 'gallery' );

		$id = intval( $atts['id'] );

		if ( ! empty( $atts['include'] ) ) {
			$_attachments = get_posts( array( 'include' => $atts['include'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( ! empty( $atts['exclude'] ) ) {
			$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $atts['exclude'], 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
		} else {
			$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $atts['order'], 'orderby' => $atts['orderby'] ) );
		}

		if ( empty( $attachments ) ) {
			return '';
		}

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment ) {
				$output .= wp_get_attachment_link( $att_id, $atts['size'], true ) . "\n";
			}
			return $output;
		}

		$columns    = intval( $atts['columns'] );
		$col_class  = 24 / $columns;
		$colclasssm = $columns - 1 > 0 ? 24 / ( $columns - 1 ) : 1;
		$selector   = "gallery-{$instance}";
		$size_class = sanitize_html_class( $atts['size'] );
		$out        = "<div id='$selector' class='gallery galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
		$i          = 0;
		$attachs_q  = count( $attachments );

		$out .= '<div class="row">';
		foreach ( $attachments as $id => $attachment ) {
			// if ( $i%$columns === 0 ) {
			// 	$out .= '<div class="row">';
			// }
			$out .= '<div class="col-md-'. $col_class .' col-sm-'. $colclasssm .'">';
				$out .= '<figure class="thumbnail">';
				if ( ! empty( $atts['link'] ) && 'file' === $atts['link'] ) {
					$out .= wp_get_attachment_link( $id, $atts['size'], false, false, false, $attr );
				} elseif ( ! empty( $atts['link'] ) && 'none' === $atts['link'] ) {
					$out .= wp_get_attachment_image( $id, $atts['size'], false, $attr );
				} else {
					$out .= wp_get_attachment_link( $id, $atts['size'], true, false, false, $attr );
				}
				$out .= '</figure>';
			$out .= '</div>';


			// if ( $i%$columns === $columns - 1 || $i + 1 === $attachs_q ) {
			// 	$out .= '</div><!--.row-->';
			// }

			++$i;
		}
		$out .= '</div><!--.row-->';

		$out .= "</div>";
		return $out;
	}
	public function get_theme_use( $feature ){
		if ( ! $this->body_classes ) {
			$this->body_classes = (array) get_body_class();
		}

		// custom-header
		// custom-background-(color|image)
		// hidden-header-text
		// custom-header-textcolor
		$feature_test = 'satorii-uses-'. $feature;
		return in_array( $feature_test, $this->body_classes );
	}
}
// Instantiate the class object
$satorii = satorii::get_instance();

function satorii_get_theme_use( $feature ){
	global $satorii;
	return $satorii->get_theme_use( $feature );
}
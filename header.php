<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package satoriii
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--[if (lt IE 7) | (IE 8)]>
	<style type="text/css">#wrapper{ display: table; height: 100% }</style>
<![endif]-->
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); /* Threaded comments */?>
<?php wp_head(); ?>
</head>
<body <?php body_class() ?>>
<div id="wrapper" class="hfeed">
	<div id="inner-wrap">
		<?php empty( get_custom_header()->url ) ? get_template_part('parts/title-header') : get_template_part('parts/title-header', 'custom') ?>
		<div id="access">
			<div class="sr-only sr-only-focusable skip-link"><a href="#content" title="<?php _e( 'Skip to content', 'satorii' ) ?>"><?php _e( 'Skip to content', 'satorii' ) ?></a></div>
			<button type="button" id="globalnav-toggle" class="navbar-toggle visible-xs" data-target="#globalnav">
				<span class="sr-only">Toggle Navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<?php satorii_globalnav(); ?>
		</div><!-- #access -->
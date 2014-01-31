<?php load_theme_textdomain( 'satorii', TEMPLATEPATH .'/translation' ); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes() ?>>
<head profile="http://gmpg.org/xfn/11">
	<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo('name'), 1 ) ?></title>
	<meta http-equiv="content-type" content="<?php bloginfo('html_type') ?>; charset=<?php bloginfo('charset') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url') ?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo TEMPLATE_URL ?>/css/fancy.yuic.css" />
	<script type="text/javascript" src="<?php echo TEMPLATE_URL ?>/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo TEMPLATE_URL ?>/js/jquery.fancybox.yuic.js"></script>
	<!--[if lt IE 7]>
		<script src="<?php echo TEMPLATE_URL ?>/js/jquery.pngFix.pack.js" type="text/javascript"></script>
	<![endif]-->
	<!--[if (lt IE 7) | (IE 8)]>
		<style type="text/css">#wrapper{ display: table; height: 100% }</style>
	<![endif]-->
	<script type="text/javascript" src="<?php echo TEMPLATE_URL ?>/js/satorii.js"></script>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); /* Threaded comments */?>
	<?php wp_head() /* For plugins */?>
</head>
<body <?php body_class() ?>>
<div id="wrapper" class="hfeed">
	<div id="inner-wrap">
		<div id="header">
			<h1 id="blog-title"><span><a href="<?php echo home_url() ?>/" title="<?php echo esc_attr( get_bloginfo('name') ) ?>" rel="home"><?php bloginfo('name') ?></a></span></h1>
			<div id="blog-description"><?php bloginfo('description') ?></div>
		</div><!--  #header -->
		<div id="access">
			<div class="skip-link"><a href="#content" title="<?php _e( 'Skip to content', 'satorii' ) ?>"><?php _e( 'Skip to content', 'satorii' ) ?></a></div>
			<?php satorii_globalnav(); ?>
		</div><!-- #access -->

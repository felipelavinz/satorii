<?php $header_textcolor = get_theme_mod('header_textcolor'); ?>
<div id="page-header">
	<div class="container has-background" style="background: url(<?php echo esc_url(get_custom_header()->url); ?>) center center;">
	<?php if ( ! satorii_get_theme_use('hidden-header-text') ) : ?>
		<h1 id="blog-title"><span><a href="<?php echo home_url() ?>/" title="<?php echo esc_attr( get_bloginfo('name') ) ?>" rel="home"><?php bloginfo('name') ?></a></span></h1>
		<div id="blog-description" class="visible-md visible-lg"><?php bloginfo('description') ?></div>
	<?php endif; ?>
	</div>
</div><!-- #page-header -->
<div id="page-header">
	<div class="container">
	<?php if ( ! satorii_get_theme_use('hidden-header-text') ) : ?>
		<h1 id="blog-title"><span><a href="<?php echo home_url() ?>/" title="<?php echo esc_attr( get_bloginfo('name') ) ?>" rel="home"><?php bloginfo('name') ?></a></span></h1>
		<div id="blog-description" class="visible-md visible-lg"><?php bloginfo('description') ?></div>
	<?php endif; ?>
	</div>
</div><!-- #page-header -->
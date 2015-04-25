<div class="row">
	<header class="col-md-offset-3 col-md-13 col-sm-13 col-sm-push-5">
		<h2 class="entry-title" itemprop="name"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'satorii'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
	</header>
</div>
<div class="row">
	<div class="col-md-13 col-md-push-5 col-md-offset-3 col-sm-19 col-sm-push-5">
		<div class="entry-content" itemprop="articleBody">
<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?>
		</div>
		<?php wp_link_pages('before=<div class="page-link pagination">' . __( 'Pages:', 'satorii' ) . '&after=</div>') ?>
	</div>
	<div class="col-md-5 col-md-pull-13 col-sm-5 col-sm-pull-19">
		<?php satorii_page_nav(); ?>
	</div>
</div>
<div class="row">
	<header class="col-md-14 col-md-offset-5 col-sm-24 col-sm-offset-2">
		<h2 class="entry-title" itemprop="name"><a href="<?php the_permalink() ?>" title="<?php printf( __('Permalink to %s', 'satorii'), the_title_attribute('echo=0') ) ?>" rel="bookmark"><?php the_title() ?></a></h2>
	</header>
</div>
<div class="row">
	<div class="col-md-14 col-md-offset-5 col-sm-20 col-sm-offset-2">
		<div class="entry-content" itemprop="articleBody">
<?php the_content( __( 'Read More <span class="meta-nav">&raquo;</span>', 'satorii' ) ) ?>
		</div>
		<?php wp_link_pages('before=<p class="page-link pagination">' . __( 'Pages:', 'satorii' ) . '&after=</p>') ?>
	</div>
</div>
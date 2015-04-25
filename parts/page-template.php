<?php
	$page_menu = satorii_page_nav( false );
?>
<article id="post-<?php the_ID() ?>" <?php post_class('entry'); ?> itemscope itemtype="http://schema.org/Article">
	<?php $page_menu ? get_template_part('parts/page-template-content', 'menu') : get_template_part('parts/page-template-content'); ?>
</article><!-- .page -->
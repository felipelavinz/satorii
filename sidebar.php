<div id="sidebar-wrapper" class="container-fluid footer-sidebars">
	<div class="row">
		<div id="primary" class="sidebar col-md-8">
			<ul class="xoxo">
	<?php if ( ! dynamic_sidebar(1) ) : // begin primary sidebar widgets ?>
	<?php endif; // end primary sidebar widgets  ?>
			</ul>
		</div><!-- #primary .sidebar -->
		<div id="secondary" class="sidebar col-md-8">
			<ul class="xoxo">
	<?php if ( ! dynamic_sidebar(2) ) : // begin secondary sidebar widgets ?>
	<?php endif; // end secondary sidebar widgets  ?>
			</ul>
		</div><!-- #secondary .sidebar -->
		<div id="terciary" class="sidebar col-md-8">
			<ul class="xoxo">
		<?php if ( ! dynamic_sidebar(3) ) : // begin primary sidebar widgets ?>
		<?php endif; ?>
			</ul>
		</div>
	</div>
</div>

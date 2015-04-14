jQuery(document).ready(function($) {
	$('#globalnav-toggle').on('click', function(event){
		$('#globalnav, #globalnav-toggle').toggleClass('active');
		$('#page-header, #container, body').toggleClass('nav-showing');
		event.preventDefault();
	});
	$(document).on('click', '#globalnav.active', function( event ){
		$('#globalnav-toggle').trigger('click');
		event.preventDefault();
	});
	// $('div#content div[id^=post]').each(function() {
	// 	var postId = $(this).attr('id');
	// 	$('div#'+postId+' a[href$=".png"]').addClass('fancybox').attr('rel', postId);
	// 	$('div#'+postId+' a[href$=".gif"]').addClass('fancybox').attr('rel', postId);
	// 	$('div#'+postId+' a[href$=".jpg"]').addClass('fancybox').attr('rel', postId);
	// 	$('div#'+postId+' a[href$=".PNG"]').addClass('fancybox').attr('rel', postId);
	// 	$('div#'+postId+' a[href$=".GIF"]').addClass('fancybox').attr('rel', postId);
	// 	$('div#'+postId+' a[href$=".JPG"]').addClass('fancybox').attr('rel', postId);
	// });
	// $('a.fancybox').fancybox({
	// 	'overlayShow' : true,
	// 	'hideOnContentClick': true
	// });
	// $('table tr').removeClass('odd even');
	// $('table tr:even').addClass('odd');
});

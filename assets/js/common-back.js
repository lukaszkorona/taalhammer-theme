jQuery(document).ready(function($) {
	$('body').on('click', '.site-header .burger-wrapper', function(event) {
		event.preventDefault();
		$('.header-mobile').css('display', 'flex');
		console.log('wrf clicked');
	});
	$('body').on('click', '.header-mobile .close', function(event) {
		event.preventDefault();
		$('.header-mobile').css('display', 'none');
	});
	console.log('wrf');
	/*$('body').on('click', '.header-mobile .navbar__link', function(event) {
		event.preventDefault();
		$('.header-mobile').css('display', 'none');
		let elem_href = $(this).attr('href');
    	var el = $(elem_href);
    	var body = $("html, body");
    	$(body).stop().animate({scrollTop: el.offset().top}, 1000, 'linear', function(){});
	});*/
	/*$('body').on('click', '.navbar__link', function(event) {
		event.preventDefault();
		let elem_href = $(this).attr('href');
    	var el = $(elem_href);
    	var body = $("html, body");
    	$(body).stop().animate({scrollTop: el.offset().top}, 1000, 'linear', function(){});
	});*/
});
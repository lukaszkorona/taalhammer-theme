jQuery(document).ready(function ($) {
	$('body').on('click', '.siteMal-header .burger-wrapper', function (event) {
		event.preventDefault();
		$('.header-mobile').css('display', 'flex');
	});
	$('body').on('click', '.header-mobile .close', function (event) {
		event.preventDefault();
		$('.header-mobile').css('display', 'none');
	});
	//from taalhammer-child
	$('body').on('click', '.siteMal-header .burger-wrapper, .header-mobile__top .close-wrapper', function (event) {
		event.preventDefault();
		$('.header-mobile').toggleClass('open');
	});

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
	$('.payments-content-item__link button').click(function(){
		$(this).parents('.payments-content-item__link').addClass('none');
		$(this).parents('.payments-content-item__link').addClass('none');
		$(this).parents('.payments-content-item__link').next('.payments-content-item__list').addClass('active')
	})
});
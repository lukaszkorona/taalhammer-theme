jQuery(document).ready(function ($) {
	$('body').on('click', '.siteMal-header .burger-wrapper', function (event) {
		event.preventDefault();
		$('.header-mobile').css('display', 'flex');
	});
	$('body').on('click', '.header-mobile .close', function (event) {
		event.preventDefault();
		$('.header-mobile').css('display', 'none');
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
	$('.owl-carousel').owlCarousel({

		nav: true, // Show next and prev buttons
		URLhashListener: true,
		stagePadding: 0,
		startPosition: 'URLHash',
		slideSpeed: 300,
		paginationSpeed: 400,
		dots: false,
		items: 1,
		itemsDesktop: false,
		itemsDesktopSmall: false,
		itemsTablet: false,
		itemsMobile: false

	});
	$('.payments-content-item__link button').click(function(){
		$(this).parents('.payments-content-item__link').addClass('none');
		$(this).parents('.payments-content-item__link').addClass('none');
		$(this).parents('.payments-content-item__link').next('.payments-content-item__list').addClass('active')
	})
});
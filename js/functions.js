jQuery(document).ready(function ($) {
    var $window = $(window),
        // header
        header = $('.header-content'),
        // menu
        menu = $('.primary-menu'),
        menu_side = $('.primary-menu-side'),
        menu_side_link = $('.primary-menu-side ul li a'),
        menu_side_button = $('.navMenuButton'),
        // sidebar
        aside = $('aside'),
        aside_button = $('.asideMenuButton'),
        // content
        container = $('.container-fluid');
        

    // Navigation
	$(menu_side_button).on('click', function () {
        // header
        header.removeClass('container-aside-open');
        header.toggleClass('primary-menu-side-open');
        // menu
        $(this).toggleClass('navMenuButtonActive');
        menu.toggleClass('primary-menu-side-open');
        menu_side.toggleClass('main-menu-active');
        // sidebar
        aside.removeClass('aside-open');
        aside_button.removeClass('asideMenuButtonActive');
        //content
        container.removeClass('container-aside-open');
        container.toggleClass('container-menu-side-open');
	});
    
    $(aside_button).on('click', function () {
        // header
        header.removeClass('primary-menu-side-open');
        header.toggleClass('container-aside-open');
        // menu
        menu.removeClass('primary-menu-side-open');
        menu_side_button.removeClass('navMenuButtonActive');
        // sidebar
        $(this).toggleClass('asideMenuButtonActive');
        aside.toggleClass('aside-open');
        //content
        container.removeClass('container-menu-side-open');
        container.toggleClass('container-aside-open');
	});

	$(menu_side_link).on('click', function () {
		// header
        header.removeClass('container-aside-open');
        // menu
        menu.toggleClass('primary-menu-side-open');
        menu_side.toggleClass('main-menu-active');
        menu_side_button.toggleClass('navMenuButtonActive');
        //content
        container.toggleClass('container-menu-side-open');
	});
    
    // WNavigation window size
    if ($window.width() < 1200) {
        // menu
        $(menu).addClass('mobile-menu');
    } else {
        // header
        header.removeClass('primary-menu-side-open');
        // menu
        menu.removeClass('mobile-menu');
        menu.removeClass('main-menu-active');
        menu.removeClass('primary-menu-side-open');
        menu_side.removeAttr('style');
        menu_side_button.removeClass('navMenuButtonActive');
        // sidebar
        aside.removeClass('aside-open');
        aside_button.removeClass('asideMenuButtonActive');
		// content        
		container.removeClass('container-menu-side-open');
        container.removeClass('container-menu-side-open');
    }

    // Navigation window rezise
    $(window).on('resize', function () {
        if ($window.width() < 1200) {
            // menu
            $(menu).addClass('mobile-menu');
            menu_side.removeAttr('style');
        } else {
            // header
            header.removeClass('primary-menu-side-open');
            header.removeClass('container-menu-side-open');
            header.removeClass('container-aside-open');
            // menu
            menu.removeClass('mobile-menu');
            menu.removeClass('main-menu-active');
            menu.removeClass('primary-menu-side-open');
            menu_side_button.removeClass('navMenuButtonActive');
            // sidebar
            aside.removeClass('aside-open');
            aside_button.removeClass('asideMenuButtonActive');
            // content
            container.removeClass('container-menu-side-open');
            container.removeClass('container-aside-open');
            
        }
    });
    
    $(window).resize(function () {
		var w = $(window).width();
		if (w > 320 && menu.is(':hidden')) {
			// menu
            menu_side.removeAttr('style');
		}
	});
});
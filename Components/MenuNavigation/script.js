import $ from 'jquery'
import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock'

class NavigationBurger extends window.HTMLElement {
    constructor(...args) {
        const self = super(...args)
        self.init()
        return self
    }

    init() {
        this.$ = $(this)
        this.bindFunctions()
        this.bindEvents()
        this.resolveElements()
    }

    bindFunctions() {
        this.triggerMenu = this.triggerMenu.bind(this)
    }

    bindEvents() {
        this.$.on('click', '[data-toggle-menu]', this.triggerMenu)
    }

    resolveElements() {
        this.$menu = $('.content-hamburger', this)
        this.$menuButton = $('.hamburger', this)
    }

    connectedCallback() {}

    triggerMenu(e) {
		e.preventDefault();
		
        this.$.toggleClass('menu-navigation--menuIsOpen')
        this.$menuButton.attr('aria-expanded', this.$menuButton.attr('aria-expanded') === 'false' ? 'true' : 'false')
        if (this.$.hasClass('menu-navigation--menuIsOpen')) {
			console.log(this.$menu.get(0));
            disableBodyScroll(this.$menu.get(0))
        } else {
            enableBodyScroll(this.$menu.get(0))
        }
    }
}

window.customElements.define('menu-navigation', NavigationBurger, {
    extends: 'nav'
})

$(window).on('load', function() {
    $('.spaceMenu').css('height', $('.menu-navigation').outerHeight());

    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // Esc keycode
            if ($('[is="menu-navigation"]').hasClass('menu-navigation--menuIsOpen')) {
                $('.content-hamburger .close').click();
            }

            if ($('body').hasClass('popup-search-open')) {
                $('body').removeClass('popup-search-open');
            }
        }
    });

});

$('.menu-item .dropdown-toggle').click(function() {
    if ($(this).parents('li').hasClass('open')) {
        $('.menu-item.open').removeClass('open');
        $(this).parents('li').removeClass('open');
    } else {
        $('.menu-item.open').removeClass('open');
        $(this).parents('li').addClass('open');
    }
});

$('.content-hamburger .popup-close').click(function() {
    $('[data-toggle-menu]').click();
});

/**
 *  Search toggle
 */
if( $( '#search-toggle' ).length ) {
	$( '#search-toggle', '#popup-search-close' ).on( 'click', (e) => {
		e.preventDefault();

		$( 'body' ).toggleClass( 'popup-search-open' );
	} );
}

/**
 *  Switch WPML
 */
if( $( '.switch-wpml' ).length && $( '.switch-wpml' ).is( ":visible" ) ) {
	$( '.switch-wpml__active' ).click( function() {
		$(this).toggleClass( 'open' );
	});	

	$(document).click(function(event) {
		// Punto in cui ho cliccato (destinazione)
		let $target = $(event.target);
		  
		// Se la destinazione cliccata non corrisponde a determati elementi del dom allora fai qualcosa
		if( ! $target.closest('.switch-wpml__dropdown, .switch-wpml__active').length ) {
			$( '.switch-wpml__active' ).removeClass('open')
		}        
	});
}

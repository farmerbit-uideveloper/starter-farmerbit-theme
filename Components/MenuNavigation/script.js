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
        this.$.toggleClass('menu-navigation--menuIsOpen')
        this.$menuButton.attr('aria-expanded', this.$menuButton.attr('aria-expanded') === 'false' ? 'true' : 'false')
        if (this.$.hasClass('menu-navigation--menuIsOpen')) {
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

            if ($('.popup-search').hasClass('open')) {
                $('.popup-search').removeClass('open');
            }
        }
    });

    $('li.menu-item--hasChildren').hover(function() {
        $(this).find('.sub-menu').css('top', $('[is="menu-navigation"]').height());
        $(this).find('.sub-menu').css('paddingLeft', $('.nav-menuDesktop__content').offset().left);
    });

});

$('.menu-item .dropdown').click(function() {
    if ($(this).parent().hasClass('open')) {
        $('.menu-item.open').removeClass('open');
        $(this).parent().removeClass('open');
    } else {
        $('.menu-item.open').removeClass('open');
        $(this).parent().addClass('open');
    }
});

$('.content-hamburger .close').click(function() {
    $('[data-toggle-menu]').click();
});

$('.nav-wpml__lang-active').click(function() {
    $(this).toggleClass('open');
});
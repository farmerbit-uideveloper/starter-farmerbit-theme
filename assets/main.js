import './scripts/publicPath'
import 'console-polyfill'
import './main.scss'
import $ from 'jquery'
// import AOS from 'aos/dist/aos';
// import 'aos/dist/aos.css';
const bodyScrollLock = require('body-scroll-lock');
const disableBodyScroll = bodyScrollLock.disableBodyScroll;
const enableBodyScroll = bodyScrollLock.enableBodyScroll;

import installCE from 'document-register-element/pony'

window.jQuery = $

window.lazySizesConfig = window.lazySizesConfig || {}
window.lazySizesConfig.preloadAfterLoad = true
require('lazysizes')

installCE(window, {
  type: 'force',
  noBuiltIn: true
})

function importAll (r) {
  r.keys().forEach(r)
}

importAll(require.context('../Components/', true, /\/script\.js$/))

window.addEventListener("scroll", function() {
  const distance = window.scrollY;
  if(typeof(document.querySelector(".iconFloatPage")) != 'undefined' && document.querySelector(".iconFloatPage") != null){
    document.querySelector(".iconFloatPage").style.transform = `translateY(${distance * 0.1}px)`;
  }
  if(typeof(document.querySelector(".trianglePage")) != 'undefined' && document.querySelector(".trianglePage") != null){
    document.querySelector(".trianglePage").style.transform = `translateY(${distance * 0.1}px)`;
  }
});

// $(document).ready(function() {
//   AOS.init({
//     offset: 200,
//     duration: 600,
//     easing: 'ease-out',
//     delay: 100,
//   });
// });

/*--------------------------------------------
Debounce resize
--------------------------------------------*/
(function ($, sr) {

	// debouncing function from John Hann
	// http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
	var debounce = function (func, threshold, execAsap) {
		var timeout;

		return function debounced() {
			var obj = this,
				args = arguments;

			function delayed() {
				if (!execAsap)
					func.apply(obj, args);
				timeout = null;
			}

			if (timeout)
				clearTimeout(timeout);
			else if (execAsap)
				func.apply(obj, args);

			timeout = setTimeout(delayed, threshold || 100);
		};
	};
	// smartresize
	jQuery.fn[sr] = function (fn) {
		return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
	};

})(jQuery, 'smartresize');



const bps =  {
	smartphone: {
		label: 'sm',
		enter: 576,
		exit: 767				
	},
	tablet: {
		label: 'md',
		enter: 768,
		exit: 991
	},
	desktop: {
		label: 'lg',
		enter: 992,
		exit: 1199			
	},
	desktopBig: {
		label: 'xl',
		enter: 1200,
		exit: 200000000
	}
};



function onResize() {

	/* breakpoints helper classes on body */
	$( 'body' ).removeClass(function (index, css) {
		return (css.match (/\bbp-\S+/g) || []).join(' ');
	});

	if( window.matchMedia( "(max-width: " + bps.smartphone.exit +"px)" ).matches ) {
		$( 'body' ).addClass( 'bp-' + bps.smartphone.label);
	}

	if( window.matchMedia( "(min-width: " + bps.tablet.enter +"px)" ).matches && window.matchMedia( "(max-width: " + bps.tablet.exit +"px)" ).matches ) {
		$( 'body' ).addClass( 'bp-' + bps.tablet.label);
	}

	if (window.matchMedia("(min-width: " + bps.desktop.enter + "px)").matches && window.matchMedia("(max-width: " + bps.desktop.exit +"px)").matches ) {
		$( 'body' ).addClass( 'bp-' + bps.desktop.label);
	}

	if (window.matchMedia("(min-width: " + bps.desktopBig.enter + "px)").matches) {
		$('body').addClass('bp-' + bps.desktopBig.label);
	}



	/* orientation helper classes on body */
	var mql = window.matchMedia("(orientation: portrait)");

	// If there are matches, we're in portrait
	if( mql.matches ) {
		// Portrait orientation
		if(!$('body').hasClass('portrait') ) {
			$('body').removeClass('landscape');
			$('body').addClass('portrait');
		}
	} else {
		// Landscape orientation
		if(!$('body').hasClass('landscape') ) {
			$('body').removeClass('portrait');
			$('body').addClass('landscape');
		}
	}
	
}


// applico debounce al resize
$(window).smartresize(function () {
	onResize();
});

// applico debounce dopo caricamento window
$(window).on('load', function () {
	onResize();
});

$(window).scroll( function() {
	if( $(window).scrollTop() >= 40 ) {
		$('html').addClass('scroll');
	} else {
		$('html').removeClass('scroll');
	}
} );
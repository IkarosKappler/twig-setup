/**
 * The sticks page header had this jQuery code. I ported it back to raw ECMA script
 * because in the beginning I wanted to avoid using large libraries.
 *
 * This was the code:
 *
 * $(window).scroll(function(){
 *   if ($(window).scrollTop() >= 300) {
 *      $('nav').addClass('fixed-header');
 *   }
 *   else {
 *      $('nav').removeClass('fixed-header');
 *   }
 * });
 *
 * @author  Ikaros Kappler
 * @date    2018-01
 * @version 1.0.1
 **/

window.onscroll = function() {
    var header = document.getElementById('pageheader');
    var nav    = document.getElementById('nav');
    
    function addClass(element,name) {
	var arr;
	arr = element.className.split(" ");
	if( arr.indexOf(name) == -1 ) {
            element.className += " " + name;
	}
    }

    function removeClass(element,name) {
	var arr;
	arr = element.className.split(" ");
	var pos;
	if( (pos = arr.indexOf(name)) != -1 ) {
	    arr.splice(pos,1);
            element.className = arr.join(' ');
	}
    }

    // 300 is the height of the header.
    if( window.pageYOffset >= 300 ) { // window.scrollY is only compatible with FF, Safari and Chrome
	addClass(nav,'fixed-header');
	addClass(avatar,'small-avatar' );
	addClass(nav_ul,'small-nav');
    } else {
	removeClass(nav,'fixed-header');
	removeClass(avatar,'small-avatar' );
	removeClass(nav_ul,'small-nav');
    }
}


/* Maybe animate the SVG header? This required inline SVG ... */
/*
window.addEventListener('load', function load() {
    window.removeEventListener('load', load, false);
    console.log('load'); 
    var banner = document.getElementsByClassName('header-banner')[0];
    banner.onmousemove = function(e) { 
	var x = e.pageX - this.offsetLeft; 
	var y = e.pageY - this.offsetTop;

	console.log('mouse at '+x+','+y );

	
	
    };
} );
*/

'use strict';

/**
 * Translated the css/javascript breakpoint change detection found at
 *   http://zerosixthree.se/detecting-media-queries-with-javascript/
 * to plain and lightweight javascript (the old version used jQuery).
 *
 * @author  Ikaros Kappler
 * @date    2018-01-13
 * @version 1.0.0
 **/

window.addEventListener('load', function() {
    var Z63 = (function (parent, $) {

	var MediaQueryListener = function() {
            this.afterElement = window.getComputedStyle ? window.getComputedStyle(document.body, ':after') : false;
	    //console.log( this.afterElement.getPropertyValue('content') );
            this.currentBreakpoint = '';
            this.lastBreakpoint = '';
            this.init();
	};

	MediaQueryListener.prototype = {

            init: function () {
		var self = this;
		
		if(!self.afterElement) {
                    return;
		}

		self._resizeListener();

            },
            _resizeListener: function () {
		var self = this;

		/*
		$(window).on('resize orientationchange load', function() {
                    // Regexp for removing quotes added by various browsers
                    self.currentBreakpoint = self.afterElement.getPropertyValue('content').replace(/^["']|["']$/g, '');
                    console.log('current: ' + self.afterElement.getPropertyValue('content') );
                    if (self.currentBreakpoint !== self.lastBreakpoint) {
			$(window).trigger('breakpoint-change', self.currentBreakpoint);
			self.lastBreakpoint = self.currentBreakpoint;
                    }
		});
		*/
		var handler = function() {
                    // Regexp for removing quotes added by various browsers
                    self.currentBreakpoint = self.afterElement.getPropertyValue('content').replace(/^["']|["']$/g, '');
                    console.log('current: ' + self.afterElement.getPropertyValue('content') );
                    if (self.currentBreakpoint !== self.lastBreakpoint) {
			//$(window).trigger('breakpoint-change', self.currentBreakpoint);
			window.dispatchEvent(new Event('breakpoint-change'),self.currentBreakpoint);
			self.lastBreakpoint = self.currentBreakpoint;
                    }
		};
		window.addEventListener('resize',handler);
		window.addEventListener('orientationchange',handler);
		//window.addEventListener('load',handler);
		// This is already inside the load-handler
		handler();
                    
            }

	};

	parent.mediaqueryListener = parent.mediaqueryListener || new MediaQueryListener();

	return parent;

    }(Z63 || {}, null /*jQuery*/));

    //$(window).on('breakpoint-change', function(e, breakpoint) {
    window.addEventListener('breakpoint-change', function(e, breakpoint) {

	console.log( 'breakpoint: ' + breakpoint );
	
	if(breakpoint === 'bp-small') {
            //console.log( 'CSS Breakpoint <span>screen-small</span>' );
	}

	if(breakpoint === 'bp-medium') {
            //document.body.innerHTML = 'CSS Breakpoint <span>screen-medium</span>';
	}

	if(breakpoint === 'bp-large') {
            //document.body.innerHTML = 'CSS Breakpoint <span>screen-large</span>';
	}

    });

} );

/**
 * Resizes the passed canvas.
 *
 * @param canvas A DOM Canvas element.
 * @param context A 3D or 2D canvas context.
 * @param config.fullSize
 * @param config.width
 * @param config.height
 * @param callback An optional function(w,h).
 **/

var resizeCanvas = function( canvas, context, config, callback ) {
    var _setSize = function(w,h) {
	// console.log( 'setSize: ' + w + 'x' + h );
	context.canvas.width  = w;
	context.canvas.height = h;
	
	canvas.width  = w;
	canvas.height  = h;

	if( typeof callback == 'function' )
	    callback(w,h);
    };
    if( config.fullSize ) _setSize( window.innerWidth, window.innerHeight );
    else                  _setSize( config.width, config.height );
};
//$( window ).resize( resizeCanvas );

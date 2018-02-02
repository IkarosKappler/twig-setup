/*
$(window).scroll(function(){
    if ($(window).scrollTop() >= 300) {
       $('nav').addClass('fixed-header');
    }
    else {
       $('nav').removeClass('fixed-header');
    }
});
*/

window.onscroll = function() {
    console.log('scrolled ...');
    var header = document.getElementById('pageheader');
    var nav    = document.getElementById('nav');
    
    function addClass(element,name) {
	console.log('adding class ...');
	var arr;
	arr = element.className.split(" ");
	if( arr.indexOf(name) == -1 ) {
            element.className += " " + name;
	    console.log('class added: ' + element.className );
	}
    }

    function removeClass(element,name) {
	var arr;
	arr = element.className.split(" ");
	var pos;
	if( (pos = arr.indexOf(name)) != -1 ) {
	    arr.splice(pos,1);
            element.className = arr.join(' '); // " " + name;
	    console.log('removed: ' + arr.join(' ') );
	}
    }

    // 300 is the height of the header.
    console.log( 'window.scrollY=' + window.scrollY + ', document.body.scrollY=' + document.body.scrollY + ', window.pageYOffset=' + window.pageYOffset + ', document.body.scrollTop=' + document.body.scrollTop );
    //if( window.scrollY >= 300) { // FF, Safari and Chrome
    if( window.pageYOffset >= 300 ) {
	addClass(nav,'fixed-header');
    }
    else {
	removeClass(nav,'fixed-header');
    }
}

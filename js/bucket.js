jQuery( document ).ready( function( $ ) {	
	$("#scene").addClass("animation-fade-in");
	function checkElementLocation() {
	  var $window = $(window);
	  var bottom_of_window = $window.scrollTop() + $window.height();

	  $('.to-fade-in').each(function(i) {
		var $that = $(this);
		var bottom_of_object = $that.position().top + $that.outerHeight();

		//if element is in viewport, add the animate class
		if (bottom_of_window > bottom_of_object) {
		  $(this).addClass('fade-in');
		}
	  });
	}
	// if in viewport, show the animation
	checkElementLocation();

	$(window).on('scroll', function() {
	  checkElementLocation();
	});

var hero = document.getElementById('hero');

function fadeOutOnScroll(element) {
	if (!element) {
		return;
	}
	
	var distanceToTop = window.pageYOffset + element.getBoundingClientRect().top;
	var elementHeight = element.offsetHeight;
	var scrollTop = document.documentElement.scrollTop;
	
	var opacity = 1;
	
	if (scrollTop > distanceToTop) {
		opacity = 1 - (scrollTop - distanceToTop) / elementHeight;
	}
	
	if (opacity >= 0) {
		element.style.opacity = opacity;
	}
}

function scrollHandler() {
	fadeOutOnScroll(hero);
}

window.addEventListener('scroll', scrollHandler);	
	
} );
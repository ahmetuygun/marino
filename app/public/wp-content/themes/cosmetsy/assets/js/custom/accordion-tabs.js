jQuery(document).ready(function($) {
	"use strict";
	
	$(".cosmetsy-accordion-item").eq(0).children(".cosmetsy-accordion-title").addClass("cosmetsy-active");
		$(".cosmetsy-accordion-item").eq(0).children(".cosmetsy-accordion-content").show();
	$(".cosmetsy-accordion-title").on("click", function() {
		$(this).toggleClass("cosmetsy-active");
		$(this).next(".cosmetsy-accordion-content").slideToggle(250);
		$(".cosmetsy-accordion-title").not(this).next(".cosmetsy-accordion-content").slideUp(250);
		$(".cosmetsy-accordion-title").not(this).removeClass("cosmetsy-active");
	});
	
});
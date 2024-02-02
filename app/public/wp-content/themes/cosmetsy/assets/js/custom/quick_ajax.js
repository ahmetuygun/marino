jQuery(document).ready(function($) {
	"use strict";

	$(document).on('click', 'a.detail-bnt', function(event){
		event.preventDefault(); 
        var data = {
			cache: false,
            action: 'quick_view',
			beforeSend: function() {
				$('body').append('<svg class="loader-image preloader quick-view" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg"><circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle></svg></div>');
			},
			'id': $(this).attr('href'),
        };

        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		$.post(MyAjax.ajaxurl, data, function(response) {
            $.magnificPopup.open({
                type: 'inline',
                items: {
                    src: response
                }
            })
			
			// Content Slider
			  const siteSlider = document.querySelectorAll( '.site-slider' );	
			  siteSlider.forEach( ( el ) => {
				const that = el;

				const items = that.querySelectorAll( '.slider-item' );
				imagesLoaded( items, () => {
							that.parentNode.classList.add( 'slider-loaded' )
				});

				let slideshow = parseInt( that.dataset.slideshow );
				let speed = parseInt( that.dataset.speed );
				let autoplay = that.dataset.autoplay === 'true' ? true : false;
				let autospeed = parseInt( that.dataset.autospeed );
				let dots = that.dataset.dots === 'true' ? true : false;
				let arrows = that.dataset.arrows === 'true' ? true : false;
				let fade = that.dataset.fade === 'true' ? true : false;
				let centerMode = that.dataset.centermode === 'true' ? true : false;
				let asNavFor = that.dataset.asfor;
				let focusOnSelect = that.dataset.focuselect === 'true' ? true : false;
				let vertical = that.dataset.vertical === 'true' ? true : false;
				let infinite = that.dataset.infinite === 'true' ? true : false;
				let mobileSlide = 1;

				if ( that.classList.contains( 'product-thumbnails' ) ) {
				  mobileSlide = 4;
				}

				let args = {
				  autoplay: autoplay,
				  autoplaySpeed: autospeed,
				  slidesToShow: slideshow,
				  slidesToScroll: 1,
				  speed: speed,
				  cssEase: 'cubic-bezier(.48,0,.12,1)',
				  dots: dots,
				  arrows: arrows,
				  fade: fade,
				  centerMode: centerMode,
				  asNavFor: asNavFor,
				  focusOnSelect: focusOnSelect,
				  vertical: vertical,
				  infinite: infinite,
				  prevArrow: '<button type="button" class="slick-nav slick-prev slick-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.641 511.641" width="511.641" height="511.641"><path d="M148.32 255.76L386.08 18c4.053-4.267 3.947-10.987-.213-15.04a10.763 10.763 0 00-14.827 0L125.707 248.293a10.623 10.623 0 000 15.04L371.04 508.667c4.267 4.053 10.987 3.947 15.04-.213a10.763 10.763 0 000-14.827L148.32 255.76z"/></svg></button>',
				  nextArrow: '<button type="button" class="slick-nav slick-next slick-button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 511.949 511.949" width="511.949" height="511.949"><path d="M386.235 248.308L140.902 2.975c-4.267-4.053-10.987-3.947-15.04.213a10.763 10.763 0 000 14.827l237.76 237.76-237.76 237.867c-4.267 4.053-4.373 10.88-.213 15.04 4.053 4.267 10.88 4.373 15.04.213l.213-.213 245.333-245.333a10.624 10.624 0 000-15.041z"/></svg></button>',
				  responsive: [
					{
					  breakpoint: 1440,
					  settings: {
									  slidesToShow: slideshow <= 6 ? slideshow: 5,
									}
					}, {
					  breakpoint: 1340,
					  settings: {
									  slidesToShow: slideshow <= 5 ? slideshow: 4,
									}
					}, {
					  breakpoint: 992,
					  settings: {
									  slidesToShow: slideshow <= 3 ? slideshow: 2,
									}
					}, {
					  breakpoint: 768,
					  settings: {
						slidesToShow: slideshow <= 2 ? slideshow: 1,
						vertical: false
									}
					}, {
					  breakpoint: 576,
					  settings: {
									  slidesToShow: mobileSlide,
									}
					}
				  ]
				};

				$( that ).not( '.slick-initialized' ).slick( args );

				if ( that.classList.contains( 'carousel' ) ) {
				  var height;
					const media = that.querySelectorAll( '.entry-media' );
					const arrows = that.querySelectorAll( '.slick-arrow' );
					const setArrowHeight = () => {
					  
		  
					  for ( var i = 0; i < media.length; i++ ) {
						height = media[i].clientHeight;
					  }
		  
					  for ( var i = 0; i < arrows.length; i++ ) {
						if ( arrows[i] != null ) {
						  arrows[i].style.top = height / 2 + 'px';
						}
					  }
					}
		  
					window.addEventListener( 'load', setArrowHeight );
					window.addEventListener( 'resize', setArrowHeight );
				}
			  });
			  
			// QUANTITY
			 const qty = () => {

				const quantityButtons = document.querySelectorAll( '.quantity-button' );

				quantityButtons.forEach( (index) => {
				  index.addEventListener( 'click', (event) => {
					let quantity = event.target.closest( '.quantity' );
					let quantityInput = quantity.querySelector( '.input-text.qty' );
					
					let val = parseFloat( quantityInput.value );
					let min = parseFloat( quantityInput.min );
					let max = parseFloat( quantityInput.max );
					let step = parseFloat( quantityInput.step );

					if ( ! val || val === '' || val === 'NaN' ) { val = 0; }
					if ( max === '' || max === 'NaN' ) { max = ''; }
					if ( min === '' || min === 'NaN' ) { min = 0; }
					if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) { step = 1; }

					if ( event.target.classList.contains( 'plus' ) ) {
					  if ( max && ( max === val || val > max ) ) {
						quantityInput.value = max;
					  } else {
						quantityInput.value = val + parseFloat( step );
					  }
					} else {
					  if ( min && ( min === val || val < min ) ) {
						quantityInput.value = min;
					  } else {
						quantityInput.value = val - parseFloat( step );
					  }
					}
					$('.quantity .qty').trigger( 'change' );
					return false;
				  });
				  
				});
			  }

			  qty();
			  $('body').on( 'updated_cart_totals', qty );
			  
			  $("form.cart.grouped_form .input-text.qty").attr("value", "0");
			  
			  $( document.body ).trigger( 'cosmetsySinglePageInit' );
			  
			$(".loader-image").remove();

			$('.input-text.qty').closest('.quickview-product').find( '.input-text.qty' ).val($('.input-text.qty').closest('.quickview-product').find( '.input-text.qty' ).attr('min'));
        });
    });	

});
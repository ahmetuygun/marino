/* KLB Addons for Elementor v1.0 */

jQuery.noConflict();
!(function ($) {
	"use strict";

	
	/* HOME SLIDER TWO*/
	function klb_home_slider($scope, $) {
      const siteSlider = document.querySelectorAll( '.site-slider' );

      siteSlider.forEach( ( el ) => {
        const that = el;

        const items = that.querySelectorAll( '.slider-item' );
        imagesLoaded( items, () => {
					that.parentNode.classList.add( 'slider-loaded' );
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

        if ( that.classList.contains( 'client-box' ) ) {
          mobileSlide = 2;
        }

        if ( that.classList.contains( 'products' ) ) {
          mobileSlide = parseInt( that.dataset.mobile );
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
            };
  
            window.addEventListener( 'load', setArrowHeight );
            window.addEventListener( 'resize', setArrowHeight );
        }
      });

		$(window).resize(function() {
		  if ($('site-global-notification').length) {
			$('.hero-style').innerHeight($(window).height()  - $('.site-global-notification').innerHeight());
		  } else {
			$('.hero-style').innerHeight($(window).height());
		  }

		}).resize();
	}


	/* COUNTER */
	function klb_counter($scope, $) {
      const counter = document.querySelectorAll( '.counter' );
      const counterLabel = document.querySelectorAll( '.count-label' );

      counter.forEach( ( el ) =>  {
        if ( el != null ) {
          let dataDate = el.dataset.date;
          let dspan = el.querySelector( '.days' );
          let hspan = el.querySelector( '.hours' );
          let mspan = el.querySelector( '.minutes' );
          let sspan = el.querySelector( '.seconds' );

          let endDate = new Date( dataDate ).getTime();

          let timer = setInterval( () => {
            let now = new Date().getTime();
            let t = endDate - now;

            if ( t >= 0 ) {

              let days = Math.floor(t / (1000 * 60 * 60 * 24));
              let hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
              let mins = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
              let secs = Math.floor((t % (1000 * 60)) / 1000);
  
              dspan.innerHTML = days;
              hspan.innerHTML = ( '0' + hours ).slice(-2);
              mspan.innerHTML = ( '0' + mins ).slice(-2);
              sspan.innerHTML = ( '0' + secs ).slice(-2);
  
            }
          }, 1000);
        }
      });

      counterLabel.forEach( ( el ) => {
        if ( el != null ) {
          let str = el.innerHTML.charAt( 0 );
          el.innerHTML = str;
        }
      });
	}
	
    jQuery(window).on('elementor/frontend/init', function () {

        elementorFrontend.hooks.addAction('frontend/element_ready/cosmetsy-home-slider.default', klb_home_slider);
        elementorFrontend.hooks.addAction('frontend/element_ready/cosmetsy-product-carousel.default', klb_home_slider);
        elementorFrontend.hooks.addAction('frontend/element_ready/cosmetsy-product-carousel-2.default', klb_home_slider);
        elementorFrontend.hooks.addAction('frontend/element_ready/cosmetsy-counter.default', klb_counter);
        elementorFrontend.hooks.addAction('frontend/element_ready/cosmetsy-clients-box.default', klb_home_slider);

    });

})(jQuery);

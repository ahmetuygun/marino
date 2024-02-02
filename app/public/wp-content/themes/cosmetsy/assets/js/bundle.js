(function ($) {
  "use strict";

  const app = {
    init() {
      this.dom();
      this.scroll();
      this.mobileMenu();
      this.searcHolder();
	  this.mobilebottomtoggle();
    },
    dom() {
      this.overlay = document.querySelector( '.site-overlay' );
      this.toggleMenu = document.querySelectorAll( '.canvas-toggle' );
      this.toggleClose = document.querySelector( '.offcanvas-close' );
      this.siteoverlayclose = document.querySelector( '.site-overlay' );
    },
    scroll() {
      const container = document.querySelectorAll( '.site-scroll' );

      for( var i = 0; i < container.length; i++ ) {
        const ps = new PerfectScrollbar( container[i], {
          suppressScrollX: true
        });
      }
    },
    mobileMenu() {
      const canvasMenu = document.querySelector( '.site-offcanvas' );
      if ( canvasMenu != null ) {
        const canvas = gsap.timeline( { paused: true, reversed: true } );

        canvas.to( this.overlay, { duration: 0.2, opacity: 1, visibility: 'visible' } );
        canvas.to( canvasMenu, {  duration: 0.5, ease: 'power4.inOut', x:0 }, "-=.3" );

        for ( var i = 0; i < this.toggleMenu.length; i++ ) {
          this.toggleMenu[i].addEventListener( 'click', (e) => {
            e.preventDefault();
            canvas.play();
          });
        }

        this.siteoverlayclose.addEventListener( 'click', (e) => {
          e.preventDefault();
          canvas.reverse(1.5);
        });

        this.toggleClose.addEventListener( 'click', (e) => {
          e.preventDefault();
          canvas.reverse(1.5);
        });

        const hasChildren = document.querySelectorAll( '.mobile-menu .menu-item-has-children' );

        const subMenu = ( e ) => {
          let subUl;
          if ( e.target.tagName === 'A' ) {
            e.preventDefault();
            subUl = e.target.nextElementSibling;
          } else {
            subUl = e.target.previousElementSibling;
          }
          let parentUl = e.target.closest( 'ul' );
          let parentLi = e.target.closest( 'li' );
          let activeLi = parentUl.querySelectorAll( '.menu-item-has-children.active' );

          const closeSubs = () => {
            for ( var i = 0; i < activeLi.length; i++ ) {
              const activeSub = activeLi[i].children[1];
              const childSubs = activeSub.querySelectorAll( '.sub-menu' );
              for ( var i = 0; i < childSubs.length; i++ ) {
                if ( childSubs[i] != null ) {
                  gsap.set( childSubs[i], { height: 0 } );
                }
              }
            }
          }

          const subAnimation = ( element, event ) => {
            gsap.to( element, { duration: 0.4, height: event, ease: 'power4.inOut', onComplete: closeSubs } );
          }
          
          if ( ! parentLi.classList.contains( 'active' ) ) {
            for ( var i = 0; i < activeLi.length; i++ ) {
              activeLi[i].classList.remove( 'active' );
              const sub = activeLi[i].children[1];
              subAnimation( sub, 0 );
            }
            parentLi.classList.add( 'active' );
            subAnimation( subUl, 'auto' );
          } else {
            parentLi.classList.remove( 'active' );
            subAnimation( subUl, 0 );
          }

        };

        for( var i = 0; i < hasChildren.length; i++ ) {
          const dropdown = document.createElement( 'span' );
          dropdown.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>';
          dropdown.className = 'menu-dropdown';
          hasChildren[i].appendChild( dropdown );
          
          const link = hasChildren[i].querySelector( 'a[href*="#"]' );
          const sub = hasChildren[i].children[1];
          gsap.set( sub, { height: 0 } );
          dropdown.addEventListener( 'click', subMenu );
		  if(link){
          link.addEventListener( 'click', subMenu );
		  }
        }
        
      }
    },
    searcHolder() {
      const button = document.querySelectorAll( '.search-button' );
      const close = document.querySelector( '.search-holder--close' );
	  
	  if ( button != null && close != null ) {
		  
		  const search = gsap.timeline( { paused: true, reversed: true } );
		  const ajaxsearch = document.querySelector( '.search-holder .dgwt-wcas-search-wrapp' );

		  search.to( '.search-holder', { duration: 0.3, autoAlpha: 1 } );
		  if(ajaxsearch != null) {
			search.to( '.search-holder .dgwt-wcas-search-input', { duration: .4, ease: 'power4', y:0, opacity: 1 } );
		  } else {
			search.to( '.search-holder .search-form-input', { duration: 0.4, ease: 'power4', y:0, opacity: 1 } );
		  }
		  search.to( '.search-holder .search-message', { duration: 0.4, ease: 'power4', y:0, opacity: 1 }, "-=.3" );
		  search.to( close, { duration: 0.4, ease: 'power4', y:0, opacity: 1 }, "-=.4" );
		  search.to( '.most-viewed-title', { duration: 0.4, ease: 'power4', y:0, opacity: 1 }, "-=.4" );
		  search.to( '.most-viewed-products .product', { duration: 0.4, ease: 'power4', y:0, opacity: 1, stagger: 0.1 }, "-=.4" );
		  
		  for ( var i = 0; i < button.length; i++ ) {
			button[i].addEventListener( 'click', ( e ) => {
			  e.preventDefault();
			  search.play();

			  if ( window.innerWidth > 1200 ) {
				setTimeout( function() {
					if(ajaxsearch != null) {
						document.querySelector( '.search-holder .dgwt-wcas-search-input' ).focus();
					} else {
						document.querySelector( '.search-holder .search-form-input' ).focus();
					}
				}, 500);
			  }

			  document.addEventListener( 'keyup', ( ev ) => {
				if( ev.keyCode == 27 ) {
				  search.reverse();
				}
			  });
			}, false );
			
		  }
		 
		  
		  close.addEventListener( 'click', ( e ) => {
					e.preventDefault();
					search.reverse();
				}, false );
	  }
    },

    mobilebottomtoggle() {
		$("li.menu-item-has-children a")[0] && $("li.menu-item-has-children a").on("click", function() {
			$(this).toggleClass("plus"), $(this).toggleClass("minus"), $(this).parent().find("ul").slideToggle();
		});
		

	}
  }

  app.init();

$(document).ready(function() {

	setTimeout(() => {
		$(".flex-control-thumbs").addClass("product-thumbnails");
		
		if ($(".woocommerce-product-gallery").hasClass("vertical") && $(window).width() > 992) {
			var verti = true;
		} else {
			var verti = false;
		}
	
		$('.product-thumbnails').slick({
		  dots: false,
		  arrows: true,
		  prevArrow: '<div class="prev"><i class="far fa-angle-left"></i></div>',
		  nextArrow: '<div class="next"><i class="far fa-angle-right"></i></div>',
		  autoplay: false,
		  Speed: 5000,
		  slidesToShow: 8,
		  slidesToScroll: 1,
		  focusOnSelect: true,
		  vertical: verti,
		});
	
		$(".flex-viewport, .flex-control-nav" ).wrapAll( "<div class='slider-wrapper'></div>" );

		$(".woocommerce-product-gallery__trigger").prependTo(".flex-viewport");
		$(".klb-single-video").prependTo(".flex-viewport");
		
		$('.woocommerce-product-gallery__wrapper > div:not([data-thumb])').each(function() {
			$(this).prependTo(".flex-viewport");
		});

	}, 100);

});

	$(window).scroll(function() {
        $(this).scrollTop() > 135 ? $("header.site-header").addClass("sticky-header") : $("header.site-header").removeClass("sticky-header")
    });

}(jQuery));
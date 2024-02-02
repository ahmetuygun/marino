/* global cosmetsy_settings */
(function($) {
	cosmetsyThemeModule.$document.on('cosmetsyShopPageInit', function() {
	  cosmetsyThemeModule.shopsidebar();
	});

	cosmetsyThemeModule.shopsidebar = function() {
      const button = document.querySelector( '.product-results--filter' );
      const sidebar = document.querySelector( '.site-shop--sidebar' );

      if ( button != null || sidebar != null ) {
        const close = document.querySelectorAll( '.close-sidebar' );
        const animation = gsap.timeline( { paused: true, reversed: true } );

        animation.to( this.overlay, { duration: 0.2, autoAlpha: 1 } );
        animation.to( sidebar, {  duration: 0.5, ease: 'power4.inOut', x:0 }, "-=.3" );

		if(button){
			button.addEventListener( 'click', (e) => {
			  e.preventDefault();
			  animation.play();
			});
		}

        for ( var i = 0; i < close.length; i++ ) {
          close[i].addEventListener( 'click', (e) => {
            e.preventDefault();
            animation.reverse(1.5);
          });
        }
      }
		
	  // Site Scroll
      const container = document.querySelectorAll( '.site-scroll' );

      for( var i = 0; i < container.length; i++ ) {
        const ps = new PerfectScrollbar( container[i], {
          suppressScrollX: true
        });
      }

	};

	$(document).ready(function() {
		cosmetsyThemeModule.shopsidebar();
	});
})(jQuery);

( function ( $ ) {
  'use strict';

  // Basic

	$('.horizon-swiper.basic').horizonSwiper();


  // Full width

  $('.horizon-swiper.full-width').horizonSwiper();


  // Fix item width

  $('.horizon-swiper.fix-item-width').horizonSwiper( {
    showItems: 2
  } );


  // Without arrows

  $('.horizon-swiper.without-arrows').horizonSwiper( {
    showItems: 1,
    arrows: false,
    dots: true
  } );

} )( jQuery );





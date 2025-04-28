const heroSwiper = new Swiper('.hero-slider', {
    slidesPerView: 1,
    //loop: true,
    effect: 'fade',
    grabCursor: true, 
    //direction: 'vertical',
    navigation: {
    nextEl: '.hero-slider__button-next',
    prevEl: '.hero-slider__button-prev',
    lockClass: 'hide-navi'
    },

  });

  const portfolioSwiper = new Swiper('.portfolio-slider', {
    slidesPerView: 1,
    spaceBetween: 0,
    //loop: true,
    //effect: 'fade',
    grabCursor: true, 
    //direction: 'vertical',
    navigation: {
    nextEl: '.portfolio-slider__button-next',
    prevEl: '.portfolio-slider__button-prev',
    lockClass: 'hide-navi'
     },
  //    breakpoints: {
  //     1024: {
  //         slidesPerView: 3,
  //         spaceBetween: 30,
  //     },

  //     375: {
  //       slidesPerView: 1,
  //   },
  // }
  
  });

  const decorSwiper = new Swiper('.event-slider', {
    slidesPerView: 1,
    spaceBetween: 0,
    loop: true,
    //effect: 'fade',
    grabCursor: true, 
    //direction: 'vertical',
    navigation: {
    nextEl: '.event-slider__button-next',
    prevEl: '.event-slider__button-prev',
    lockClass: 'hide-navi'
     },
//      breakpoints: {
//       // when window width is >= 320px
//       768: {
//           slidesPerView: 1,
//           spaceBetween: 30,
//           //slideToClickedSlide: true,
//       },
//   }
  
  });
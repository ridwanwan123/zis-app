 /**
   * Clients untuk HomePage
   */
  new Swiper('.clients-slider', {
    speed: 500,
    loop: true,
    autoplay: {
      delay: 1300,
      disableOnInteraction: false
    },
    slidesPerView: 'auto',
    breakpoints: {
      320: {
        slidesPerView: 1,
        spaceBetween: 40
      },
      480: {
        slidesPerView: 3,
        spaceBetween: 60
      },
      640: {
        slidesPerView: 4,
        spaceBetween: 80
      }
    }
  });
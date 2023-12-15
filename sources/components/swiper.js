const swiper = new Swiper('.swiper', {
    loop: true,
    autoplay: true,
    delay: 5000,
    speed: 500,
    cssMode: true,

    pagination: {
        el: '.swiper-pagination',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
});

const swiper_adv = new Swiper('.swiper-avantages', {
  loop: true,
  loopAddBlankSlides: false,
  speed:500,
  cssMode:true,

  spaceBetween: 30,
  slidesPerView: 4,

  navigation: {
    nextEl: '.swiper-button-next-2',
    prevEl: '.swiper-button-prev-2',
  },
});
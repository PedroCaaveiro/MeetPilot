import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

document.addEventListener('DOMContentLoaded', () => {
  const sliders = [
    { selector: '.slider-conferencias-viernes', next: '.btn-conferencias-viernes-next', prev: '.btn-conferencias-viernes-prev' },
    { selector: '.slider-conferencias-sabado', next: '.btn-conferencias-sabado-next', prev: '.btn-conferencias-sabado-prev' },
    { selector: '.slider-workshops-viernes', next: '.btn-workshops-viernes-next', prev: '.btn-workshops-viernes-prev' },
    { selector: '.slider-workshops-sabado', next: '.btn-workshops-sabado-next', prev: '.btn-workshops-sabado-prev' },
  ];

  sliders.forEach(({ selector, next, prev }) => {
    const slider = document.querySelector(selector);
    if (slider) {
      new Swiper(slider, {
        modules: [Navigation],
        slidesPerView: 1,
        spaceBetween: 15,
        freeMode: true,
        navigation: {
          nextEl: next,
          prevEl: prev
        },
        breakpoints: {
          768: { slidesPerView: 2 },
          1024: { slidesPerView: 3 },
          1200: { slidesPerView: 4 }
        }
      });
    }
  });
});

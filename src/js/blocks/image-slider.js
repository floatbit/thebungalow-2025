import Swiper from 'swiper';
import { Pagination, EffectFade } from 'swiper/modules';

export default class ImageSlider { 
    constructor(el) {
        this.el = el;
        this.init();
    }

    init() {
        const slideshow = this.el.querySelector('.swiper');
        console.log(slideshow)
        if (!slideshow) return;

        const swiper = new Swiper(slideshow, {
            modules: [Pagination, EffectFade],
            loop: true,
            effect: 'fade',
            slidesPerView: 1,
            spaceBetween: 0,
            centeredSlides: true,
            pagination: {
                el: this.el.querySelector('.dots'),
                clickable: true,
            },
        });
    }
}
import Swiper from 'swiper/bundle';
import 'swiper/swiper-bundle.css';
import $ from 'jquery';

document.addEventListener('DOMContentLoaded', function() {
    var $carousel = $('.swiper-container.carousel');
    var $swiperWrapper = $carousel.find('.swiper-wrapper');
    var slides = $carousel.find('.swiper-slide');
    var minSlidesForLoop = 1; 

    
    if (slides.length < minSlidesForLoop) {
        var duplicatesNeeded = minSlidesForLoop - slides.length;
        for (var i = 0; i < duplicatesNeeded; i++) {
            slides.clone().appendTo($swiperWrapper);
        }
    }

    var swiper = new Swiper('.swiper-container.carousel', {
        slidesPerView: 1,
        spaceBetween: 0,
        loop: true,
        autoplay: {
            delay: 8000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});

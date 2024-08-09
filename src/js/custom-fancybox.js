jQuery(document).ready(function($) {
    $('[data-fancybox="gallery"]').fancybox({
        buttons: [
            "zoom",
            "share",
            "slideShow",
            "fullScreen",
            "download",
            "thumbs",
            "close"
        ],
        closeBtn: true,
        closeClickOutside: true,
        animationEffect: "zoom-in-out",
        transitionEffect: "slide",
    });
});

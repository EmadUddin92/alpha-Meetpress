(function ($) {
    $(document).ready(function () {
        var slider = tns({
            container: '.slider',
            speed:300,
            autoplayTimeout:3000,
            items: 1,
            controls:false,
            nav:false,
            autoHeight:true,
            autoplayButtonOutput:false,
            slideBy: 'page',
            autoplay: true
        });
    });
}(jQuery));
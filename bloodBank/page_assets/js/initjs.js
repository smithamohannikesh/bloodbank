$('.one-time').slick({
    dots: false,
    arrows: false,
    autoplay: true,
    infinite: true,
    fade: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
});
$('.t-slide').slick({
    dots: false,
    arrows: false,
    autoplay: true,
    infinite: true,
    fade: true,
    speed: 10000,
    slidesToShow: 1,
    adaptiveHeight: false
});

$(window).load(function () { // makes sure the whole site is loaded			
    $('body').niceScroll({cursoropacitymax: 0.8, cursorwidth: 8});
    $('body').iphoneStyle().change(function () {
        initScroll();
    });
    initScroll();
})
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//stats.g.doubleclick.net/dc.js', 'ga');
ga('create', 'UA-5342062-6', 'noelboss.github.io');
ga('send', 'pageview');


$(".login-holder .block2 a").hover(function (e) {
    e.preventDefault();
    $(".profile").animate({
        opacity: 1,
    });
    $(".profile").show();
});
$(document).mouseup(function (e) {
    var container = $(".profile");
    if (!container.is(e.target)
            && container.has(e.target).length === 0)
    {
        $(".profile").slideUp(1000).stop(true, true);
    }

});
$(document).mouseout(function (e) {
    var container = $(".profile");
    if (!container.is(e.target) && container.has(e.target).length === 0)
    {
        $(".profile").slideUp(10).stop(true, true);
    }

});
$(function () {
    $('.forgot-password').click(function () {
        $('.login-form').toggle();
        $('.recover-password').toggle();
    });
});
$(document).ready(function () {
    $(".tabs-menu a").click(function (event) {
        event.preventDefault();
        $(this).parent().addClass("current");
        $(this).parent().siblings().removeClass("current");
        var tab = $(this).attr("href");
        $(".tab-content").not(tab).css("display", "none");
        $(tab).fadeIn();
    });
});
$(function () {
    $(".form-dropdown").selectbox();
});
$(document).on("click", ".fd-bxx-cls", function (e) {
    e.preventdefault;
    $(this).parent().fadeOut(300);
});



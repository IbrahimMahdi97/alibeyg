var is_rtl_lang = jQuery("body").hasClass("rtl");
var siteLang = jQuery("html").attr("lang");

jQuery(document).ready(function ($) {
  $(".home-slider").owlCarousel({
    rtl: true,
    margin: 10,
    nav: true,
    autoplay: false,
    items: 4,
    loop: true,
    dots: false,
    stagePadding: 0,
    navText: [
      "<i class='icon-chevron-right'></i>",
      "<i class='icon-chevron-left'></i>",
    ],
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 4,
      },
    },
  });
});

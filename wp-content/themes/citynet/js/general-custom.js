jQuery(document).ready(function ($) {
  setTimeout(function () {
    $("#imageModal").modal("show");
  }, 2000);

  $("#footer-accordion .card-link").click(function (event) {
    $(this).toggleClass("opened");
    $(this).parent().next().toggleClass("opened");
  });

  // detect mobile
  if (
    /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
      navigator.userAgent
    )
  ) {
    $("body").addClass("mobile");
    if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
      $("body").addClass("apple-device");
    }
  }

  if ($("#citynet-live-local-clock").length) {
    startTime(placeData.hour_offset, placeData.min_offset);
  }
  function startTime(hourOffset, minOffset) {
    var today = new Date();
    var h = today.getUTCHours();
    var m = today.getUTCMinutes();
    var s = today.getUTCSeconds();
    h = h + parseInt(hourOffset);
    m = m + parseInt(minOffset);
    if (m >= 60) {
      m = m - 60;
      h = h + 1;
    }
    if (m < 0) {
      m = m + 60;
      h = h - 1;
    }
    if (h >= 24) {
      h = h - 24;
    }
    if (h < 0) {
      h = h + 24;
    }
    h = checkTime(h);
    m = checkTime(m);
    s = checkTime(s);
    document.getElementById("citynet-live-local-clock").innerHTML =
      h + ":" + m + ":" + s;
    setTimeout(function () {
      startTime(hourOffset, minOffset);
    }, 1000);
  }
  function checkTime(i) {
    return i < 10 ? "0" + i : i;
  }

  //scroll up in footer
  $(".cn-arrow-footer").click(function () {
    // var body = $("html, body");
    $("html, body").stop().animate({ scrollTop: 100 }, 500, "swing");
  });
});

/**
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
 */
(function () {
  var isIe = /(trident|msie)/i.test(navigator.userAgent);

  if (isIe && document.getElementById && window.addEventListener) {
    window.addEventListener(
      "hashchange",
      function () {
        var id = location.hash.substring(1),
          element;

        if (!/^[A-z0-9_-]+$/.test(id)) {
          return;
        }

        element = document.getElementById(id);

        if (element) {
          if (!/^(?:a|select|input|button|textarea)$/i.test(element.tagName)) {
            element.tabIndex = -1;
          }

          element.focus();
        }
      },
      false
    );
  }
})();

var is_rtl_lang = jQuery("body").hasClass("rtl");
var siteLang = jQuery("html").attr("lang");

jQuery(document).ready(function ($) {
  // get and set cookie
  function setCookie(cname, cvalue, exmin) {
    var d = new Date();
    d.setTime(d.getTime() + exmin * 60 * 1000);
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(";");
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == " ") {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return false;
  }
  function delete_cookie(name) {
    document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:01 GMT;path=/;";
  }
  /**
   * PWA notif
   */
  if (getCookie("pwa-notif") == "") {
    $("#pwa-notif .fa-times").on("click", function () {
      $("#pwa-notif").addClass("closed");
    });
    setCookie("pwa-notif", "true", 1440);
  }

  /**
   * whats app chat in footer
   */
  $(".footer-whatsapp-share").click(function () {
    $(this).toggleClass("footer-whatsapp-share-open");
    $(".footer-whatsapp-share-box").toggleClass(
      "footer-whatsapp-share-box-open"
    );
  });
  $("body").on("click", function (event) {
    if (
      !$(event.target).is(".footer-whatsapp-share") &&
      !$(event.target).is(".footer-whatsapp-share-box") &&
      !$(event.target).is(".footer-whatsapp-share i") &&
      !$(event.target).is(".footer-share-header") &&
      !$(event.target).is(".footer-share-header-heading") &&
      !$(event.target).is(".footer-share-header-heading i") &&
      !$(event.target).is(".footer-whatsapp-share-footer") &&
      !$(event.target).is(".footer-whatsapp-share-footer p") &&
      !$(event.target).is(".footer-whatsapp-share-main-box")
    ) {
      $(".footer-whatsapp-share-box").removeClass(
        "footer-whatsapp-share-box-open"
      );
      $(".footer-whatsapp-share").removeClass("footer-whatsapp-share-open");
    }
  });

  $("header .menu-toggle").click(function () {
    $(this).toggleClass("active");
    $("#site-navigation #main-menu .sub-menu").css("display", "none");
    $("#site-navigation #main-menu .fa-angle-down").removeClass(
      "fa-rotate-180"
    );
    $("#site-navigation").toggleClass("show");
  });

  //display wpml after click language
  $(
    "header .lang-en .lang-title .title , .lang-icon , .language-box-icon"
  ).click(function () {
    $("header .lang-en .lang-box").toggleClass("d-block");
    $("header .lang-en .lang-title .icon-chevron-down").toggleClass("rotate");
  });

  //  //not display wpml Other parts of the page
  $(document).click(function (e) {
    var target = e.target;
    if (
      !$(target).is(
        "header .lang-en .lang-title .title , .lang-icon , .language-box-icon"
      )
    ) {
      $("header .lang-en .lang-box").removeClass("d-block");
      $("header .lang-en .lang-title .icon-chevron-down").removeClass("rotate");
    }
  });

  //display wpml after click language
  $(
    "header .lang-fa .lang-title .title , .lang-icon , .language-box-icon"
  ).click(function () {
    $("header .lang-fa .lang-box").toggleClass("d-block");
    $("header .lang-fa .lang-title .icon-chevron-down").toggleClass("rotate");
  });

  //  //not display wpml Other parts of the page
  $(document).click(function (e) {
    var target = e.target;
    if (
      !$(target).is(
        "header .lang-fa .lang-title .title , .lang-icon , .language-box-icon"
      )
    ) {
      $("header .lang-fa .lang-box").removeClass("d-block");
      $("header .lang-fa .lang-title .icon-chevron-down").removeClass("rotate");
    }
  });

  $("header .wpml-ls").click(function () {
    $(this).toggleClass("open");
  });

  // $(window).scroll(function() {    // this will work when your window scrolled.
  //     var height = $(window).scrollTop();  //getting the scrolling height of window
  //     if(height  > 1) {
  //         $("#masthead").addClass('fixed-top position-fixed top-0');
  //     } else{
  //         $("#masthead").removeClass('fixed-top position-fixed top-0');
  //     }
  // });

  $("#site-navigation").click(function () {
    $(this).removeClass("show");
  });

  $("#site-navigation #main-menu").click(function (event) {
    event.stopPropagation();
  });

  var subMenusTogglerClasses = "fa fa-angle-down px-3 m-0 ";
  subMenusTogglerClasses += $("body").hasClass("rtl")
    ? "float-left"
    : "float-right";
  $("#site-navigation #main-menu li.menu-item-has-children").prepend(
    '<i class="' + subMenusTogglerClasses + '"></i>'
  );

  $("#site-navigation #main-menu .fa-angle-down").click(function () {
    $(this).toggleClass("fa-rotate-180");
    $(this).siblings(".sub-menu").slideToggle();
  });

  $(".citynet-aparat-video .qualities").on("change", function () {
    var selectedQuality = $(this).val();
    $(this)
      .closest(".citynet-aparat-video")
      .children("video")
      .attr("src", selectedQuality);
  });

  $(".table-scroll").each(function () {
    $(this).append(
      $(this).find("table").clone(true).attr("id", "").addClass("clone")
    );
  });

  $(".table-scroll table tbody tr").mouseenter(function () {
    var rowNumber = $(this).data("row-number");
    $(this)
      .closest(".table-scroll")
      .find("table tbody tr[data-row-number=" + rowNumber + "]")
      .addClass("hover");
  });
  $(".table-scroll table tbody tr").mouseleave(function () {
    var rowNumber = $(this).data("row-number");
    $(this)
      .closest(".table-scroll")
      .find("table tbody tr[data-row-number=" + rowNumber + "]")
      .removeClass("hover");
  });

  if ($(".image-gallery").length || $(".itinerary-gallery").length) {
    if (galleryInfo.type == "simple") {
      $(
        ".image-gallery .gallery-image-item, .itinerary-gallery .gallery-image-item"
      ).colorbox({
        maxWidth: "95%",
        maxHeight: "95%",
      });
    } else {
      $(".image-gallery, .itinerary-gallery").each(function () {
        $(this).lightGallery({
          selector: $(this).hasClass("itinerary-gallery")
            ? ""
            : ".gallery-image-item",
        });
      });
    }
  }

  $(".image-gallery.with-slider .gallery-image-item").click(function () {
    $(this)
      .addClass("active")
      .siblings(".gallery-image-item")
      .removeClass("active");
    $("#image-gallery-slider").slick("slickGoTo", $(this).data("index"));
    $("#image-gallery-slider").slick("slickPause");
  });

  $(".image-gallery.with-slider .load-more-photos").click(function () {
    $(this)
      .addClass("active")
      .parent()
      .siblings(".gallery-image-item[data-index=8]")
      .trigger("click");
  });

  if ($("#image-gallery-slider").length) {
    $("#image-gallery-slider").slick({
      rtl: is_rtl_lang,
      autoplay: true,
      autoplaySpeed: 7000,
      fade: true,
    });
  }

  $(".nav-tabs .nav-link").click(function () {
    $('a[data-toggle="popover"].showing-popup').trigger("click");
  });

  $("body.single .nav-tabs .nav-link").click(function () {
    chackTabLoadContents($(this).attr("href"));
  });

  if (window.location.hash) {
    chackTabLoadContents(window.location.hash);
  }

  function chackTabLoadContents(tabID) {
    if ($(tabID).find("#image-gallery-slider").length)
      $("#image-gallery-slider").slick("slickGoTo", 0);
    if ($(tabID).find("#map-embed-place.not-loaded").length)
      $("#map-embed-place").removeClass("not-loaded").html(mapData.embedCode);
  }

  $("#image-gallery.with-slider").on("onCloseAfter.lg", function () {
    $("#image-gallery-slider").slick("slickPlay");
  });

  $("#image-gallery.with-slider").on(
    "onBeforeSlide.lg",
    function (evenet, prevIndex, index) {
      $("#image-gallery-slider").slick("slickGoTo", index);
    }
  );

  $("#image-gallery-slider").on(
    "beforeChange",
    function (event, slick, currentSlide, nextSlide) {
      var photoIndex = $(slick.$slides[nextSlide]).find("li").data("cn-index");
      $("#image-gallery .gallery-image-item[data-index=" + photoIndex + "]")
        .addClass("active")
        .siblings(".gallery-image-item")
        .removeClass("active");
      if ($("#image-gallery .load-more-photos").length) {
        if (photoIndex >= 8)
          $("#image-gallery .load-more-photos").addClass("active");
        else $("#image-gallery .load-more-photos").removeClass("active");
      }
    }
  );

  $("#image-gallery-slider div.slick-slide")
    .find("li")
    .click(function () {
      var photoIndex = $(this).data("cn-index");
      $(
        "#image-gallery .gallery-image-item[data-index=" + photoIndex + "]"
      ).trigger("click");
    });

  $("#package-switcher").on("change", function () {
    $('a[data-toggle="popover"].showing-popup').trigger("click");
    var selectedPackageIndex = $(this).val();
    $(
      ".btn-package-switcher[data-package-index=" + selectedPackageIndex + "]"
    ).trigger("click");
  });

  $(".exchange-prices").click(function () {
    var currentMode = $(this).text() == "نمایش معادل ریالی" ? "main" : "rial";
    var relatedItemsParent = $(this).hasClass("just-after-table")
      ? "table"
      : ".table-scroll";
    var relatedPriceItems = $(this)
      .closest(".row")
      .prev(relatedItemsParent)
      .find(".price-cell");
    var updateButton = $(this).parent().next().children(".update-prices");

    if (currentMode == "main") {
      relatedPriceItems
        .children(".main")
        .addClass("hidden")
        .next(".rial")
        .removeClass("hidden");
      relatedPriceItems
        .children(".extra-night-main")
        .addClass("hidden")
        .next(".extra-night-rial")
        .removeClass("hidden");
      updateButton.removeClass("disable").trigger("click");
      $(this).html('<i class="fa fa-money"></i>نمایش مبالغ اصلی');
    } else {
      relatedPriceItems
        .children(".rial")
        .addClass("hidden")
        .prev(".main")
        .removeClass("hidden");
      relatedPriceItems
        .children(".extra-night-rial")
        .addClass("hidden")
        .prev(".extra-night-main")
        .removeClass("hidden");
      updateButton.addClass("disable");
      $(this).html('<i class="fa fa-money"></i>نمایش معادل ریالی');
    }
  });

  $(".update-prices").click(function () {
    var updateButton = $(this);
    if (!updateButton.hasClass("disable")) {
      var relatedPriceItems = null;
      if (updateButton.hasClass("just-after-table")) {
        relatedPriceItems = updateButton
          .closest(".row")
          .prev("table")
          .find(".price-cell");
      } else {
        relatedPriceItems = updateButton
          .closest(".row")
          .prev(".table-scroll")
          .children(".table-wrap")
          .find(".price-cell");
      }
      var relatedItemsParent = updateButton.hasClass("just-after-table")
        ? "table"
        : ".table-scroll";
      var relatedElement = updateButton
        .closest(".row")
        .prev(relatedItemsParent);
      var priceCellsInfo = [];
      var priceCell = null;
      relatedElement.find(".rial, .extra-night-rial").text("لطفا صبر کنید...");
      updateButton.addClass("disable");
      relatedPriceItems.each(function () {
        priceCell = $(this);
        if (priceCell.data("prices") || priceCell.data("extra-night")) {
          priceCellsInfo.push({
            number: priceCell.data("cell"),
            prices: priceCell.data("prices"),
            extraNight: priceCell.data("extra-night"),
          });
        }
      });

      if (priceCellsInfo.length > 0) {
        var requestData = {
          action:
            $("body").hasClass("single-tour") ||
              $("body").hasClass("offline-tour-reserve")
              ? "citynet_tour_prices_update_ajax_request"
              : "citynet_hotelpackage_prices_update_ajax_request",
          pricesInfo: JSON.stringify(priceCellsInfo),
        };
        $.ajax({
          url: wpData.ajaxurl,
          data: requestData,
          success: function (response) {
            var responseData = JSON.parse(response);
            responseData.forEach(function (cellInfo) {
              relatedElement
                .find('.price-cell[data-cell="' + cellInfo.number + '"] .rial')
                .text(cellInfo.value);
              relatedElement
                .find(
                  '.price-cell[data-cell="' +
                  cellInfo.number +
                  '"] .extra-night-rial'
                )
                .text(cellInfo.extraNightValue);
            });
            updateButton.removeClass("disable");
          },
        });
      }
    }
  });

  function isOnScreen(elem) {
    // if the element doesn't exist, abort
    if (elem.length == 0) {
      return;
    }
    var $window = $(window);
    var viewport_top = $window.scrollTop();
    var viewport_height = $window.height();
    var viewport_bottom = viewport_top + viewport_height;
    var $elem = $(elem);
    var top = $elem.offset().top;
    var height = $elem.height();
    var bottom = top + height;

    return (
      (top >= viewport_top && top < viewport_bottom) ||
      (bottom > viewport_top && bottom <= viewport_bottom) ||
      (height > viewport_height &&
        top <= viewport_top &&
        bottom >= viewport_bottom)
    );
  }

  /*var doScroll = true;
    window.addEventListener('scroll', function(e) {
        autoScrollResponsiveTables();
    });
    autoScrollResponsiveTables();

    function autoScrollResponsiveTables() {
        if (isOnScreen($('.table-wrap')) && doScroll) {
            doScroll = false;
            $('.table-wrap').each(function () {
                var autoScrollElement = $(this);
                var currentScrollLeft = autoScrollElement.scrollLeft();
                autoScrollElement.animate( { scrollLeft: '0' }, 2000, function() {
                    autoScrollElement.animate( { scrollLeft: currentScrollLeft }, 2000, function() {
                        doScroll = true;
                    });
                });
            });
        }
    }*/

  if ($("body").hasClass("page-template-print-tour")) {
    window.onload = function () {
      $("head title").text(printData.title);
      window.print();
      window.close();
    };
  }

  $('[data-toggle="popover"]').popover();

  $('a[data-toggle="popover"]').click(function (e) {
    e.preventDefault();
    $(this).toggleClass("showing-popup");
  });

  function citynetGetEskelets(postType, count) {
    var result = (eskelet = "");
    switch (postType) {
      default:
        eskelet =
          '<li class="eskelet col-12 col-sm-6 my-3 item col-md-4 col-lg-1of5"><figure class="' +
          postType +
          '-eskelet"><i class="fa fa-image"></i><span class="title"></span></figure></li>';
    }
    for (var i = 1; i <= count; i++) {
      result += eskelet;
    }
    return result;
  }

  $("#archives-filter-area .select-area span").click(function () {
    $(this).next("ul").toggleClass("d-none");
  });

  $(document).click(function (e) {
    if ($("#archives-filter-area").length == 1) {
      var target = e.target;
      if (!$(target).is("#archives-filter-area .select-area span")) {
        $("#archives-filter-area .select-area ul").addClass("d-none");
      }
    }
  });

  var archiveQuery = {};
  if ($("body").hasClass("archive") || $("body").hasClass("blog")) {
    var pageNumber = 1;
    var parameters = {
      terms: citynetGetSelectedTerms(),
    };
    archiveQuery = {
      "match-query": generalData["match-query"],
      pages: generalData["pages"],
    };

    $(document).on("click", ".archives-load-more", function () {
      if (!$(this).hasClass("disable")) {
        $(this).addClass("disable");
        pageNumber++;
        citynetAjaxArchivePage(pageNumber, parameters);
      }
    });

    $("#archives-filter-area .select-area ul li").click(function () {
      var selectedOption = $(this);
      if (!selectedOption.hasClass("selected")) {
        $("#archives-filter-area .current-filter-text").text(
          selectedOption.text()
        );
        $(".page-title h1").text(
          selectedOption.data("term-id") == "all"
            ? selectedOption.data("all-label")
            : selectedOption.text()
        );
        selectedOption
          .addClass("selected")
          .siblings(".selected")
          .removeClass("selected");
        pageNumber = 1;
        $(".posts-area").children("li").remove();

        parameters["terms"] =
          selectedOption.data("term") == "all" ? {} : citynetGetSelectedTerms();
        citynetAjaxArchivePage(1, parameters);
      }
    });
  }

  function citynetCalculateLoadCount(pageNumber) {
    var count =
      pageNumber == 1 || pageNumber < archiveQuery["pages"]
        ? generalData["posts-per-page"]
        : archiveQuery["match-query"] -
        (pageNumber - 1) * generalData["posts-per-page"];
    return count >= 0 ? count : 0;
  }

  function citynetAjaxArchivePage(pageNumber, parameters) {
    var notAnyPostsElement = $(".not-found");
    notAnyPostsElement.remove();

    var itemsWrapper = $(".posts-area");
    if (!itemsWrapper.length) {
      $(".main-side").prepend('<div class="row posts-area"></div>');
      itemsWrapper = $(".posts-area");
    }

    var loadCount = citynetCalculateLoadCount(pageNumber);
    itemsWrapper.append(
      citynetGetEskelets(generalData["post-type"], loadCount)
    );

    $(".waitable-element").addClass("disable");

    var loadRequest = {
      action: "cn_ajax_load_posts_in_archive",
      postType: generalData["post-type"],
      terms: JSON.stringify(parameters["terms"]),
      page: pageNumber,
    };
    $.ajax({
      url: wpData.ajaxurl,
      data: loadRequest,
      success: function (result) {
        result = JSON.parse(result);

        $(".posts-area .eskelet").remove();
        $(".waitable-element").removeClass("disable");

        if (result["match-query"] > 0) {
          $.each(result["posts"], function (index, post) {
            itemsWrapper.append(post);
          });

          archiveQuery["match-query"] = result["match-query"];
          archiveQuery["pages"] = result["pages"];

          if (!$(".archives-load-more").length)
            $(".posts-area").after(
              '<div class="row justify-content-center">' +
              '<div class="col-5 mt-5 col-sm-4 col-md-3 col-xl-2"><a class="theme-button archives-load-more waitable-element"><i class="fa fa-eye"></i>' +
              generalData["translates"]["more-items"] +
              "</a></div></div>"
            );
          if (pageNumber < archiveQuery["pages"])
            $(".archives-load-more").removeClass("disable");
          else $(".archives-load-more").addClass("disable");
        } else {
          itemsWrapper.remove();
          $(".archives-load-more").parent("div").parent("div").remove();
          $(".main-side").append(result["not-posts-html"]);
        }
      },
    });
  }

  function citynetGetSelectedTerms() {
    var result = {};
    var selectedTerms = $("#archives-filter-area .select-area ul").find(
      "li.selected"
    );

    selectedTerms.each(function () {
      var taxonomy = generalData["taxonomy"];
      if (!taxonomy)
        taxonomy =
          generalData["post-type"] == "post"
            ? "category"
            : generalData["post-type"] + "-category";
      var termID = $(this).data("term");
      if (result[taxonomy] == undefined) result[taxonomy] = [];
      result[taxonomy].push(termID);
    });
    return result;
  }
});



setTimeout(() => {
  const panelHeader = document.getElementById('panel-header');

  if (window.innerWidth >= 768) {
    // فیلتر کردن عناصری که عنصر HTML هستند
    const elementsCount = Array.from(panelHeader.children).filter(node =>
      node instanceof HTMLElement // بررسی اینکه آیا نود یک عنصر HTML است
    ).length;

    // console.log(elementsCount);
    panelHeader.style.minWidth = '';

    if (elementsCount === 2) {
      panelHeader.style.setProperty('min-width', '230px', 'important');
    } else if (elementsCount === 1) {
      panelHeader.style.setProperty('min-width', '160px', 'important');
    }

    // تغییر استایل عنصر با کلاس accountUser در صورت وجود
    const accountUser = panelHeader.querySelector('.accountUser');
    const langFaElement = document.querySelector('.lang-fa');
    const langTitle = langFaElement.querySelector('.lang-title');
    const globalIcon = document.querySelector('.icon-global.language-box-icon');
    const chevronDownIcon = document.querySelector('.icon-chevron-down.lang-icon');


    function checkUrl() {
      const urlPath = window.location.pathname;
      return urlPath === '/ar' || urlPath === '/ar/';
    }
  

  



    if (checkUrl() && elementsCount === 1) {
      chevronDownIcon.style.setProperty('right', '62px', 'important');
      globalIcon.style.setProperty('left', '80px', 'important');
    }
  }
}, 500);


setInterval(() => {
  const panelHeader = document.getElementById('panel-header');

  if (window.innerWidth >= 768) {
    // فیلتر کردن عناصری که عنصر HTML هستند
    const elementsCount = Array.from(panelHeader.children).filter(node =>
      node instanceof HTMLElement // بررسی اینکه آیا نود یک عنصر HTML است
    ).length;

    // console.log(elementsCount);
    panelHeader.style.minWidth = '';

    if (elementsCount === 2) {
      panelHeader.style.setProperty('min-width', '230px', 'important');
    } else if (elementsCount === 1) {
      panelHeader.style.setProperty('min-width', '160px', 'important');
    }

    // تغییر استایل عنصر با کلاس accountUser در صورت وجود
    const accountUser = panelHeader.querySelector('.accountUser');
    const langFaElement = document.querySelector('.lang-fa');
    const langTitle = langFaElement.querySelector('.lang-title');
    const globalIcon = document.querySelector('.icon-global.language-box-icon');
    const chevronDownIcon = document.querySelector('.icon-chevron-down.lang-icon');

    function checkUrl() {
      const urlPath = window.location.pathname;
      return urlPath === '/ar' || urlPath === '/ar/';
    }
  

  



    if (checkUrl() && elementsCount === 1) {
      chevronDownIcon.style.setProperty('right', '62px', 'important');
      globalIcon.style.setProperty('left', '80px', 'important');
    }
  }
}, 5000); // هر 10 ثانیه (10000 میلی‌ثانیه) کد اجرا می‌شود

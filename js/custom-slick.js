jQuery(document).ready(function () {
  const postSlider = jQuery(".home-banner-slide-main");
  function initializeSlider() {
    postSlider.each(function () {
      const $this = jQuery(this);
      const postSlide = $this.children(".home-banner-slide").length;
      if (window.matchMedia("(max-width: 1023px)").matches) {
        if (!$this.hasClass("slick-initialized")) {
          $this.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            swipeToSlide: true,
            touchThreshold: 100,
            speed: 1000,
            dots: true,
            arrows: true,
            adaptiveHeight: true,
            infinite: true,
            variableWidth: true,
            prevArrow:
              '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><i class="fa-solid fa-circle-chevron-left"></i></div>',
            nextArrow:
              '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><i class="fa-solid fa-circle-chevron-right"></i></div>',
            responsive: [
              {
                breakpoint: 413,
                settings: {
                  variableWidth: false,
                },
              },
            ],
          });
        }
      } else {
        if (postSlide >= 6 && !$this.hasClass("slick-initialized")) {
          $this.slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            swipeToSlide: true,
            touchThreshold: 100,
            speed: 1000,
            dots: true,
            arrows: true,
            adaptiveHeight: true,
            infinite: true,
            variableWidth: true,
            prevArrow:
              '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><i class="fa-solid fa-circle-chevron-left"></i></div>',
            nextArrow:
              '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><i class="fa-solid fa-circle-chevron-right"></i></div>',
            responsive: [
              {
                breakpoint: 413,
                settings: {
                  variableWidth: false,
                },
              },
            ],
          });
        }
      }
    });
  }
  function destroySlider() {
    postSlider.each(function () {
      const $this = jQuery(this);
      if (
        jQuery(window).width() >= 1024 &&
        $this.hasClass("slick-initialized")
      ) {
        $this.slick("unslick");
      }
    });
  }
  // Initial call
  initializeSlider();
  jQuery(window).on("resize", function () {
    destroySlider();
    initializeSlider();
  });

  jQuery(".sf-slider-for").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    infinite: false,
    dots: false,
    speed: 1000,
    arrows: false,
    focusOnSelect: true,
    asNavFor: ".sf-slider-nav",
    fade: true,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
  });
  jQuery(".sf-slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false,
    speed: 1000,
    focusOnSelect: true,
    infinite: false,
    variableWidth: true,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
    asNavFor: ".sf-slider-for",
    prevArrow:
      '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-left"></i></span></div>',
    nextArrow:
      '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><span><i class="fa-sharp fa-regular fa-arrow-right"></i></span></div>',
    responsive: [
      {
        breakpoint: 1300,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: true,
          dots: true,
        },
      },
    ],
  });

  /* home banner Slider */
  // jQuery(".home-banner-slide-main").slick({
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   draggable: true,
  //   swipeToSlide: true,
  //   touchThreshold: 100,
  //   speed: 1000,
  //   dots: true,
  //   arrows: true,
  //   adaptiveHeight: true,
  //   infinite: true,
  //   variableWidth: true,
  //   prevArrow:
  //     '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><i class="fa-solid fa-circle-chevron-left"></i></div>',
  //   nextArrow:
  //     '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><i class="fa-solid fa-circle-chevron-right"></i></div>',
  //   responsive: [
  //     {
  //       breakpoint: 413,
  //       settings: {
  //         variableWidth: false,
  //       },
  //     },
  //   ],
  // });

  /* Featured News */
  if (jQuery(window).width() <= 767) {
    jQuery(".featured-lists").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      variableWidth: true,
      draggable: true,
      touchThreshold: 200,
      swipeToSlide: true,
      adaptiveHeight: true,
      prevArrow:
        '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><i class="fa-solid fa-circle-chevron-left"></i></div>',
      nextArrow:
        '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><i class="fa-solid fa-circle-chevron-right"></i></div>',
    });
  }

  /* home banner Slider */
  // jQuery(".feature-podcasts-slide-main").slick({
  //   slidesToShow: 5,
  //   slidesToScroll: 5,
  //   draggable: true,
  //   swipeToSlide: true,
  //   touchThreshold: 100,
  //   speed: 1000,
  //   dots: false,
  //   arrows: true,
  //   adaptiveHeight: true,
  //   infinite: false,
  //   variableWidth: true,
  //   prevArrow:
  //     '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><i class="fa-solid fa-circle-chevron-left"></i></div>',
  //   nextArrow:
  //     '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"> Load More Audio<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 17.5229 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.4772 17.5228 2 12 2C6.47715 2 2 6.4772 2 12ZM13.3 15.9998C13.3 15.2818 12.7179 14.6998 12 14.6998C11.282 14.6998 10.7 15.2818 10.7 15.9998C10.7 16.7178 11.282 17.2998 12 17.2998C12.7179 17.2998 13.3 16.7178 13.3 15.9998ZM13.3 7.9998C13.3 7.2818 12.7179 6.6998 12 6.6998C11.282 6.6998 10.7 7.2818 10.7 7.9998C10.7 8.7178 11.282 9.2998 12 9.2998C12.7179 9.2998 13.3 8.7178 13.3 7.9998ZM13.3 11.9998C13.3 11.2818 12.7179 10.6998 12 10.6998C11.282 10.6998 10.7 11.2818 10.7 11.9998C10.7 12.7178 11.282 13.2998 12 13.2998C12.7179 13.2998 13.3 12.7178 13.3 11.9998Z" fill="#F1F1F1"/> </svg></div>',
  //   responsive: [
  //     {
  //       breakpoint: 413,
  //       settings: {
  //         variableWidth: false,
  //       },
  //     },
  //   ],
  // });

  function initOrDestroyPodcastSlider() {
    const $slider = jQuery(".feature-podcasts-slide-main");
    const isMobile = window.matchMedia("(max-width: 767px)").matches;

    if (isMobile) {
      if ($slider.hasClass("slick-initialized")) {
        $slider.slick("unslick");
      }
    } else {
      if (!$slider.hasClass("slick-initialized")) {
        $slider.slick({
          slidesToShow: 5,
          slidesToScroll: 5,
          draggable: true,
          swipeToSlide: true,
          touchThreshold: 100,
          speed: 1000,
          dots: false,
          arrows: true,
          adaptiveHeight: true,
          infinite: false,
          variableWidth: true,
          prevArrow:
            '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><i class="fa-solid fa-circle-chevron-left"></i></div>',
          nextArrow:
            '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"> Load More Audio<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"> <path fill-rule="evenodd" clip-rule="evenodd" d="M2 12C2 17.5229 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.4772 17.5228 2 12 2C6.47715 2 2 6.4772 2 12ZM13.3 15.9998C13.3 15.2818 12.7179 14.6998 12 14.6998C11.282 14.6998 10.7 15.2818 10.7 15.9998C10.7 16.7178 11.282 17.2998 12 17.2998C12.7179 17.2998 13.3 16.7178 13.3 15.9998ZM13.3 7.9998C13.3 7.2818 12.7179 6.6998 12 6.6998C11.282 6.6998 10.7 7.2818 10.7 7.9998C10.7 8.7178 11.282 9.2998 12 9.2998C12.7179 9.2998 13.3 8.7178 13.3 7.9998ZM13.3 11.9998C13.3 11.2818 12.7179 10.6998 12 10.6998C11.282 10.6998 10.7 11.2818 10.7 11.9998C10.7 12.7178 11.282 13.2998 12 13.2998C12.7179 13.2998 13.3 12.7178 13.3 11.9998Z" fill="#F1F1F1"/> </svg></div>',
          responsive: [
            {
              breakpoint: 1023,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
              },
            },
            {
              breakpoint: 767,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
              },
            },
          ],
        });
      }
    }
    $slider.on("afterChange", function (event, slick, currentSlide) {
      let slidesToShow = slick.options.slidesToShow;
      let totalSlides = slick.slideCount;
      let visibleSlideIndex = currentSlide + slidesToShow;

      console.log(
        "visibleSlideIndex:",
        visibleSlideIndex,
        "totalSlides:",
        totalSlides
      );

      // Hide Load More when last slide is visible
      if (visibleSlideIndex >= totalSlides) {
        jQuery(".slick-next")
          .removeClass("slick-disabled")
          .attr("aria-disabled", false)
          .css({
            display: "none",
          });
      } else {
        jQuery(".slick-next").show(); // or fadeIn()
      }

      // Hide prev if on first
      if (currentSlide === 0) {
        jQuery(".slick-prev").hide();
      } else {
        jQuery(".slick-prev").show();
      }
    });
  }

  // On page load
  jQuery(document).ready(function () {
    initOrDestroyPodcastSlider();

    // On resize
    jQuery(window).on("resize", function () {
      initOrDestroyPodcastSlider();
    });
  });

  /* more news slider */

  jQuery(".more-news-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    draggable: true,
    swipeToSlide: true,
    touchThreshold: 100,
    speed: 1000,
    dots: true,
    arrows: true,
    adaptiveHeight: true,
    infinite: false,
    variableWidth: true,
    prevArrow:
      '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M18.2741 10.7888L7.15118 10.7889L12.7127 5.22735L11 3.51465L2.51472 11.9999L11 20.4852L12.7127 18.7725L7.1512 13.211L18.2741 13.2111L18.2741 10.7888Z" fill="#152022"/></svg></div>',
    nextArrow:
      '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5.72588 10.7888L16.8488 10.7889L11.2873 5.22735L13 3.51465L21.4853 11.9999L13 20.4852L11.2873 18.7725L16.8488 13.211L5.72588 13.2111L5.72588 10.7888Z" fill="#152022"/></svg></div>',

    responsive: [
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          variableWidth: false,
        },
      },
    ],
  });

  /* history slider */

  // jQuery(".history-slider-wrap").slick({
  //   slidesToShow: 4,
  //   slidesToScroll: 1,
  //   draggable: true,
  //   swipeToSlide: true,
  //   touchThreshold: 100,
  //   speed: 1000,
  //   dots: false,
  //   arrows: true,
  //   adaptiveHeight: true,
  //   infinite: false,
  //   variableWidth: true,
  //   prevArrow:
  //     '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M18.2741 10.7888L7.15118 10.7889L12.7127 5.22735L11 3.51465L2.51472 11.9999L11 20.4852L12.7127 18.7725L7.1512 13.211L18.2741 13.2111L18.2741 10.7888Z" fill="#152022"/></svg></div>',
  //   nextArrow:
  //     '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5.72588 10.7888L16.8488 10.7889L11.2873 5.22735L13 3.51465L21.4853 11.9999L13 20.4852L11.2873 18.7725L16.8488 13.211L5.72588 13.2111L5.72588 10.7888Z" fill="#152022"/></svg></div>',

  //   responsive: [
  //     {
  //       breakpoint: 767,
  //       settings: {
  //         slidesToShow: 1,
  //         slidesToScroll: 1,
  //         variableWidth: false,
  //       },
  //     },
  //   ],
  // });

  $(".timeline-slider-for").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    speed: 1000,
    infinite: false,
    arrows: true,
    prevArrow:
      '<div class="slick-arrow slick-prev flex flex-center" aria-label="Previous Arrow" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M18.2741 10.7888L7.15118 10.7889L12.7127 5.22735L11 3.51465L2.51472 11.9999L11 20.4852L12.7127 18.7725L7.1512 13.211L18.2741 13.2111L18.2741 10.7888Z" fill="#152022"/></svg></div>',
    nextArrow:
      '<div class="slick-arrow slick-next flex flex-center" aria-label="Next Arrow" role="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M5.72588 10.7888L16.8488 10.7889L11.2873 5.22735L13 3.51465L21.4853 11.9999L13 20.4852L11.2873 18.7725L16.8488 13.211L5.72588 13.2111L5.72588 10.7888Z" fill="#152022"/></svg></div>',
    dots: false,
    variableWidth: true,
    asNavFor: ".timeline-slider-nav",
    responsive: [
      {
        breakpoint: 1023,
        settings: {
          arrows: false,
          dots: true,
        },
      },
    ],
  });
  $(".timeline-slider-nav").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    variableWidth: true,
    asNavFor: ".timeline-slider-for",
    focusOnSelect: true,
    arrows: false,
    dots: false,
    speed: 1000,
    infinite: false,
  });
  $(".timeline-slider-for").on("setPosition", function (event, slick) {
    $(".timeline-for-slide").removeAttr("style");
  });
  $(".timeline-slider-nav").on("setPosition", function (event, slick) {
    $(".timeline-nav-slide").removeAttr("style");
  });
});

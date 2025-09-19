import Waves from "./waves.js";
jQuery(function () {
  const waves = new Waves('[data-js-animation="wave"]');

  jQuery("[data-js-animation]").each(function () {
    const $el = jQuery(this);
    const attrname = $el.attr("data-js-animation");

    if ($el.is(":in-viewport") && !$el.hasClass("visible")) {
      $el.addClass(attrname + " visible");
      if (attrname === "wave") {
        waves.play($el);
      }
    }
  });

  jQuery(window).on("scroll", function () {
    jQuery("[data-js-animation]").each(function () {
      const $el = jQuery(this);
      const attrname = $el.attr("data-js-animation");

      if ($el.is(":in-viewport(-120)") && !$el.hasClass("visible")) {
        $el.addClass(attrname + " visible");
        if (attrname === "wave") {
          waves.play($el);
        }
      }
    });
  });
  jQuery(window).on("load", function () {
    jQuery("[data-js-animation]").each(function () {
      const $el = jQuery(this);
      const attrname = $el.attr("data-js-animation");

      if ($el.is(":in-viewport(-120)") && !$el.hasClass("visible")) {
        $el.addClass(attrname + " visible");
        if (attrname === "wave") {
          waves.play($el);
        }
      }
    });
  });
});

import { waves } from "./waves.js";

jQuery(function () {
  jQuery("[data-js-animation]").each(function (i) {
    const $el = jQuery(this);
    const attrname = $el.attr("data-js-animation");

    if ($el.is(":in-viewport") && !$el.hasClass("visible")) {
      $el.addClass(attrname + " visible");
      // play the timeline for this element
      if (attrname == "wave") {
        waves.play($el.get(0));
      }
    }
  });

  jQuery(window).on("scroll", function () {
    jQuery("[data-js-animation]").each(function () {
      const $el = jQuery(this);
      const attrname = $el.attr("data-js-animation");

      if ($el.is(":in-viewport(-120)") && !$el.hasClass("visible")) {
        $el.addClass(attrname + " visible");
        if (attrname == "wave") {
          waves.play($el.get(0));
        }
      }
    });
  });
});

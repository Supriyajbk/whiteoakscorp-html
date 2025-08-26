jQuery(function () {
  // Initial animation on page load
  jQuery(document).ready(function () {
    jQuery("[data-js-animation]").each(function () {
      let $el = jQuery(this);
      let attrname = $el.attr("data-js-animation");

      if ($el.is(":in-viewport") && !$el.hasClass("visible")) {
        $el.addClass(attrname + " visible");
      }
    });
  });

  // Animation on scroll with offset
  jQuery(window).on("scroll", function () {
    jQuery("[data-js-animation]").each(function () {
      let $el = jQuery(this);
      let attrname = $el.attr("data-js-animation");

      if ($el.is(":in-viewport(-120)") && !$el.hasClass("visible")) {
        $el.addClass(attrname + " visible");
      }
    });
  });
});

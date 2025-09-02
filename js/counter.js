let $counter_elements = jQuery("[data-counter-main]");
let $cwindow = jQuery(window);
let animation_started = false;

function check_if_view() {
  let window_height = $cwindow.height();
  let window_top_position = $cwindow.scrollTop();
  let window_bottom_position = window_top_position + window_height;

  $counter_elements.each(function() {
    let $element = jQuery(this);
    let element_height = $element.outerHeight();
    let element_top_position = $element.offset().top;
    let element_bottom_position = element_top_position + element_height;

    if (
      (element_bottom_position >= window_top_position) &&
      (element_top_position <= window_bottom_position) &&
      !animation_started
    ) {
      animation_started = true;

      $element.find(".counter").each(function() {
        let $this = jQuery(this);
        let countFrom = 0; // Start from 0
        let countTo = parseFloat($this.attr("data-count-to")); // Get the exact number from data-count-to
        let countDuration = parseInt($this.attr("data-duration"));

        jQuery({ counter: countFrom }).animate(
          {
            counter: countTo
          },
          {
            duration: countDuration,
            easing: "linear",
            step: function() {
              // Directly update the counter to maintain original formatting
              $this.text(this.counter.toFixed($this.attr("data-count-to").split(".")[1]?.length || 0));
            },
            complete: function() {
              // Ensure the final value matches data-count-to, preserving any trailing zeros
              $this.text($this.attr("data-count-to"));
            }
          }
        );
      });
    }
  });
}

$cwindow.on("scroll load", check_if_view);
$cwindow.trigger("scroll load");


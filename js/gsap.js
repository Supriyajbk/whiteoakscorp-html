gsap.registerPlugin(ScrollTrigger);

document.addEventListener("DOMContentLoaded", function () {
  // next1 animation
  gsap.utils.toArray("[data-animation='fadeInTop']").forEach((section) => {
    const elems = section.querySelectorAll("[data-animation='fadeTop']");

    // Initial state
    gsap.set(elems, {
      y: 100,
      opacity: 0,
    });

    // ScrollTrigger animation
    ScrollTrigger.create({
      trigger: section,
      start: "top 50%",
      toggleActions: "play none none reverse",
      onEnter: () => {
        gsap.to(elems, {
          y: 0,
          opacity: 1,
          duration: 2,
          ease: "power3.out",
          stagger: 0.2,
        });
      },
    });
  });

  // next2 animation
  gsap.utils.toArray(".js-website-section").forEach((section) => {
    const elems = section.querySelectorAll(".js-content-opacity");
    // Set starting params for sections
    gsap.set(elems, {
      y: 100,
      opacity: 0,
      duration: 2,
      ease: "power3.out",
      overwrite: "auto",
    });

    ScrollTrigger.create({
      trigger: section,
      start: "top 50%",
      end: "bottom 30%",
      onEnter: () =>
        gsap.to(elems, {
          y: 0,
          opacity: 1,
          stagger: 0.2,
        }),
    });
  });
  // next3 animation for images
  gsap.utils.toArray("[data-animation='fadeInImgs']").forEach((section) => {
    const elems = section.querySelectorAll("[data-animation='fadeInImg']");

    // Initial state
    gsap.set(elems, {
      opacity: 0,
    });

    // ScrollTrigger animation
    ScrollTrigger.create({
      trigger: section,
      start: "top 100%",
      toggleActions: "play none none reverse",
      onEnter: () => {
        gsap.to(elems, {
          opacity: 1,
          duration: 4,
          ease: "power3.out",
          stagger: 0.2,
        });
      },
    });
  });
});

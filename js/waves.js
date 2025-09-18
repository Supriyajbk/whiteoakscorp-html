class Waves {
  constructor(selector) {
    this.eles = Array.from(document.querySelectorAll(selector));
    this.timelines = new Map();
  }

  createTimeline(ele) {
    if (!ele) return null;
    if (this.timelines.has(ele)) return this.timelines.get(ele);

    const paths = Array.from(ele.querySelectorAll("svg path"));
    if (!paths.length) return null;

    const tl = gsap.timeline({ paused: true });

    tl.to(paths, {
      scaleY: (i) => [0.95, 1, 1.05, 1][i % 5], // very small vertical scaling
      rotation: () => gsap.utils.random(-0.5, 0.5, true), // tiny tilt
      transformOrigin: "center bottom",
      duration: 1, // long, slow cycle
      repeat: -1, // infinite loop
      yoyo: true, // back and forth, smooth
      ease: "sine.inOut",
      stagger: { each: 10 }, // slight ripple across paths
    });

    this.timelines.set(ele, tl);

    return tl;
  }

  // render optionally pre-creates timelines for all elements
  render(precreateAll = false) {
    if (!this.eles.length) return;
    if (precreateAll) {
      this.eles.forEach((el) => this.createTimeline(el));
    }
  }

  // accept element or numeric index
  play(eleOrIndex) {
    const ele =
      typeof eleOrIndex === "number" ? this.eles[eleOrIndex] : eleOrIndex;
    if (!ele) return;
    const tl = this.createTimeline(ele);
    if (!tl) return;
    tl.restart();
  }

  pause(eleOrIndex) {
    const ele =
      typeof eleOrIndex === "number" ? this.eles[eleOrIndex] : eleOrIndex;
    const tl = this.timelines.get(ele);
    if (tl) tl.pause();
  }
}

export const waves = new Waves('[data-js-animation="wave"]');

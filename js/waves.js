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
      opacity: 0.5,
      scaleY: (i) => [0.7, 1, 1.2, 0.8][i % 4],
      rotation: () => gsap.utils.random(-1, 2, true),
      transformOrigin: "center bottom",
      stagger: { each: 0.06 },
      duration: 0.6,
      ease: "sine.inOut",
    });

    tl.to(paths, {
      opacity: 1,
      scaleY: 1,
      rotation: 0,
      transformOrigin: "center bottom",
      duration: 0.45,
      ease: "sine.out",
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
    tl.restart(); // ensures it plays from start
  }

  pause(eleOrIndex) {
    const ele =
      typeof eleOrIndex === "number" ? this.eles[eleOrIndex] : eleOrIndex;
    const tl = this.timelines.get(ele);
    if (tl) tl.pause();
  }
}

export const waves = new Waves('[data-js-animation="wave"]');

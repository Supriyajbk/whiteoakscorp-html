// waves.js
export default class Waves {
  constructor(selector) {
    this.selector = selector;
    // capture elements lazily instead of relying on DOM at module-load time
    this.eles = () => Array.from(document.querySelectorAll(this.selector));
    this.timelines = new Map();
  }

  _resolveElement(ele) {
    // accept jQuery, DOM element, index
    if (!ele && ele !== 0) return null;
    if (ele && ele.jquery) return ele.get(0);
    if (typeof ele === "number") return this.eles()[ele];
    if (typeof ele === "string") return document.querySelector(ele);
    return ele; // assume DOM element
  }

  createTimeline(ele) {
    ele = this._resolveElement(ele);
    if (!ele) return null;

    if (this.timelines.has(ele)) {
      console.debug("[Waves] timeline already exists for", ele);
      return this.timelines.get(ele);
    }

    const paths = Array.from(ele.querySelectorAll("svg path"));
    console.debug("[Waves] createTimeline for", ele, "paths:", paths.length);

    if (!paths.length) return null;

    const tl = gsap.timeline({ paused: true });
    tl.to(paths, {
      scaleY: 0.75,
      rotation: () => gsap.utils.random(-0.5, 0.5, true),
      transformOrigin: "50% 50%",
      duration: 1,
      repeat: -1,
      yoyo: true,
      ease: "sine.inOut",
      repeatDelay: 1,
      stagger: { each: 10 },
    });

    this.timelines.set(ele, tl);
    return tl;
  }

  render(precreateAll = false) {
    if (!this.eles().length) return this;
    if (precreateAll) {
      this.eles().forEach((el) => this.createTimeline(el));
    }
    return this;
  }

  // play accepts: index, DOM element, jQuery element, or undefined => play all
  play(eleOrIndex) {
    // if called with no arg, ensure all timelines exist then restart all
    if (eleOrIndex === undefined) {
      this.eles().forEach((el) => {
        const tl = this.createTimeline(el);
        if (tl) tl.restart();
      });
      return this;
    }

    const ele = this._resolveElement(eleOrIndex);
    if (!ele) return this;

    const tl = this.createTimeline(ele);
    if (!tl) {
      console.warn("[Waves] no timeline for element", ele);
      return this;
    }

    // restart ensures it starts from beginning
    tl.restart();
    return this;
  }

  pause(eleOrIndex) {
    const ele = this._resolveElement(eleOrIndex);
    if (!ele) return this;
    const tl = this.timelines.get(ele);
    if (tl) tl.pause();
    return this;
  }
}

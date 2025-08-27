// resources/js/generalFunction.js
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";

// register plugin once
gsap.registerPlugin(ScrollTrigger);

function makeDraggable(elementId, containerId) {
    const element = document.getElementById(elementId);
    const container = document.getElementById(containerId);

    if (!element || !container) return;

    let isDragging = false;
    let offsetX, offsetY;

    element.addEventListener("mousedown", (e) => {
        isDragging = true;
        offsetX = e.clientX - element.offsetLeft;
        offsetY = e.clientY - element.offsetTop;
        element.style.position = "absolute";
        element.style.cursor = "grabbing";
    });

    document.addEventListener("mousemove", (e) => {
        if (isDragging) {
            const x = e.clientX - offsetX;
            const y = e.clientY - offsetY;

            // Prevent dragging outside container
            const rect = container.getBoundingClientRect();
            const elRect = element.getBoundingClientRect();

            const maxX = rect.width - elRect.width;
            const maxY = rect.height - elRect.height;

            element.style.left = Math.max(0, Math.min(x, maxX)) + "px";
            element.style.top = Math.max(0, Math.min(y, maxY)) + "px";
        }
    });

    document.addEventListener("mouseup", () => {
        isDragging = false;
        element.style.cursor = "grab";
    });
}

function makeRunawayText(containerId, className = "runaway", opts = {}) {
    const {
        speed = 2000,        // px per second
        nearMargin = 12,    // trigger distance to element (px)
        cooldownMs = 40,   // min time between triggers
    } = opts;

    const container = document.getElementById(containerId);
    const el = container?.querySelector(`.${className}`);
    if (!container || !el) return;

    // ensure layout
    if (getComputedStyle(container).position === "static") container.style.position = "relative";
    el.style.position = "absolute";

    // --- Center it initially ---
    function centerElement() {
        const cx = (container.clientWidth - el.offsetWidth) / 2;
        const cy = (container.clientHeight - el.offsetHeight) / 2;
        el.style.left = `${cx}px`;
        el.style.top = `${cy}px`;
    }
    centerElement();

    let tween = null;
    let lastTrigger = 0;

    // helpers
    const getPos = () => ({
        x: parseFloat(el.style.left || "0"),
        y: parseFloat(el.style.top || "0")
    });

    const getMax = () => ({
        x: Math.max(0, container.clientWidth - el.offsetWidth),
        y: Math.max(0, container.clientHeight - el.offsetHeight)
    });

    const distanceToRect = (px, py, r) => {
        const dx = Math.max(r.left - px, 0, px - r.right);
        const dy = Math.max(r.top - py, 0, py - r.bottom);
        return Math.hypot(dx, dy);
    };

    function fleeOnce(e) {
        const now = performance.now();
        if (now - lastTrigger < cooldownMs) return;

        const rect = el.getBoundingClientRect();
        const dist = distanceToRect(e.clientX, e.clientY, rect);
        if (dist > nearMargin) return; // only when "almost" reached

        // decide single axis based on nearest side (0°/90° only)
        const dxLeft = rect.left - e.clientX, dxRight = e.clientX - rect.right;
        const dyTop = rect.top - e.clientY, dyBottom = e.clientY - rect.bottom;
        const horizontalPressure = Math.max(dxLeft, dxRight);
        const verticalPressure = Math.max(dyTop, dyBottom);

        const { x, y } = getPos();
        const { x: maxX, y: maxY } = getMax();

        let target = { x, y }; // default stays
        if (horizontalPressure >= verticalPressure) {
            // move horizontally to the wall in the direction away from the cursor
            target.x = (dxLeft > dxRight) ? maxX : 0;
        } else {
            // move vertically to the wall in the direction away from the cursor
            target.y = (dyTop > dyBottom) ? maxY : 0;
        }

        // compute duration from distance / speed
        const distPixels = Math.hypot(target.x - x, target.y - y);
        const duration = Math.max(0.05, distPixels / Math.max(1, speed)); // avoid 0

        // kill any in-flight tween (allow mid-animation retarget)
        tween?.kill();

        // clear any GSAP transforms so they don’t offset left/top math
        gsap.set(el, { x: 0, y: 0 });

        // animate via left/top
        tween = gsap.to({}, {
            duration,
            onUpdate() {
                const p = this.progress();
                el.style.left = (x + (target.x - x) * p) + "px";
                el.style.top = (y + (target.y - y) * p) + "px";
            },
            onComplete() {
                // Which axis did we move?
                const movedAxis = (target.x !== x) ? "x" : "y";
                // Which wall did we hit? dir = +1 if to max (right/bottom), -1 if to 0 (left/top)
                const dir =
                    movedAxis === "x"
                        ? (target.x > x ? +1 : -1)
                        : (target.y > y ? +1 : -1);

                // Scale impact power by travel distance (nice touch; optional)
                const distPixels = Math.hypot(target.x - x, target.y - y);
                const power = Math.min(1.2, Math.max(0.5, distPixels / 220));

                impactCrash(el, { axis: movedAxis, dir, power });
            }
        });


        lastTrigger = now;
    }

    // keep inside on resize; do not animate further until next interaction
    const ro = new ResizeObserver(() => {
        const { x, y } = getPos();
        const { x: maxX, y: maxY } = getMax();
        el.style.left = Math.min(Math.max(0, x), maxX) + "px";
        el.style.top = Math.min(Math.max(0, y), maxY) + "px";
    });
    ro.observe(container);

    container.addEventListener("mousemove", fleeOnce, { passive: true });
    container.addEventListener("touchstart", (ev) => {
        const t = ev.touches[0];
        fleeOnce({ clientX: t.clientX, clientY: t.clientY });
    }, { passive: true });

    return {
        destroy() {
            tween?.kill();
            ro.disconnect();
            container.removeEventListener("mousemove", fleeOnce);
        }
    };
}

function impactCrash(el, { axis, dir = 1, power = 1 }) {
    const bump = 50 * power;                 // how far it "compresses"
    const rot = (axis === "x" ? 20 : 0) * dir * power;   // slight yaw on horizontal hits
    const tilt = (axis === "y" ? -20 : 0) * dir * power;  // slight pitch on vertical hits
    const origin =
        axis === "x"
            ? (dir > 0 ? "100% 50%" : "0% 50%")  // hit right/left edge
            : (dir > 0 ? "50% 100%" : "50% 0%"); // hit bottom/top edge

    const tl = gsap.timeline({ defaults: { ease: "power2.out" } });
    tl.set(el, { transformOrigin: origin, willChange: "transform, filter" })
        // impact: squash + slight pushback + flash
        .to(el, {
            duration: 0.04,
            x: axis === "x" ? -dir * bump : 0,
            y: axis === "y" ? -dir * bump : 0,
            scaleX: axis === "x" ? 0.92 : 1.06,
            scaleY: axis === "y" ? 0.92 : 1.06,
            rotation: rot + tilt,
            filter: "brightness(1.25)"
        })
        // rebound: spring back to normal
        .to(el, {
            duration: 0.28,
            x: 0, y: 0, scaleX: 1, scaleY: 1, rotation: 0, filter: "brightness(1)",
            ease: "elastic.out(1, 0.5)"
        })
        .set(el, { willChange: "auto" });

    return tl;
}

function initFadeScroll(containerSelector = ".scrollable-text", childSelector = ".fade-text") {
  const container = document.querySelector(containerSelector);
  if (!container) return;

  gsap.utils.toArray(`${containerSelector} ${childSelector}`).forEach((el) => {
    gsap.fromTo(el,
      { opacity: 0, y: 20 },
      {
        opacity: 1,
        y: 0,
        duration: 0.6,
        scrollTrigger: {
          trigger: el,
          container: containerSelector,
          start: "top 90%",
          end: "top 60%",
          toggleActions: "play none none reverse"
        }
      }
    );
  });
}



// ✅ Attach to window so it’s accessible globally
window.gsap = gsap;
window.initFadeScroll = initFadeScroll;
window.makeDraggable = makeDraggable;
window.makeRunawayText = makeRunawayText;

import { tsParticles } from "@tsparticles/engine";
import { loadLinksPreset } from "@tsparticles/preset-links";


document.addEventListener('DOMContentLoaded', async () => {
  await loadLinksPreset(tsParticles);

  await tsParticles.load({
    id: 'tsparticles', // can be any id; not required to exist in DOM when fullScreen is used
    options: {
      fullScreen: { enable: true, zIndex: 1 }, // sits behind your content if content z-index > 1
      background: { color: { value: 'blueviolet' } },
      fpsLimit: 120,
      particles: {
        number: { value: 80, density: { enable: true, area: 800 } },
        color: { value: '#ffffff' },
        shape: { type: 'circle' },
        opacity: { value: 0.5 },
        size: { value: { min: 1, max: 5 } },
        move: { enable: true, speed: 2, direction: 'none', outModes: 'out' },
      },
      interactivity: {
        events: { onHover: { enable: true, mode: 'repulse' }, onClick: { enable: true, mode: 'push' } },
        modes: { repulse: { distance: 100 }, push: { quantity: 4 } },
      },
    },
  });
});


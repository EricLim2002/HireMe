<!-- Back to Top Button -->
<button id="backToTop"
        type="button"
        class="back-to-top bouncing-text"
        aria-label="Back to top"
        style="bottom: 60px; right: 30px; opacity:0; visibility:hidden; transition:opacity .3s ease, visibility .3s ease;">
  ⬆ Top
</button>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', () => {
  const btn = document.getElementById('backToTop');
  const SHOW_AFTER = 200;
  let ticking = false;

  function toggleButton() {
    if (window.scrollY > SHOW_AFTER) {
      btn.style.opacity = '1';
      btn.style.visibility = 'visible';
    } else {
      btn.style.opacity = '0';
      btn.style.visibility = 'hidden';
    }
    ticking = false;
  }

  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(toggleButton);
      ticking = true;
    }
  }, { passive: true });

  // smooth scroll
  btn.addEventListener('click', () => {
    const reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    window.scrollTo({ top: 0, behavior: reduce ? 'auto' : 'smooth' });
  });

  // initialize state
  toggleButton();
});
</script>
@endpush

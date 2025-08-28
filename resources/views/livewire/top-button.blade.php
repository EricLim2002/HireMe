<div>
    <button id="backToTop" class="back-to-top bouncing-text" style="display:none;">
        ⬆ Top
    </button>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('backToTop');

            // Show/hide button on scroll
            window.addEventListener('scroll', function () {
                if (window.scrollY > 200) { // show after 200px scroll
                    btn.style.display = 'block';
                } else {
                    btn.style.display = 'none';
                }
            });

            // Scroll to top on click
            btn.addEventListener('click', function () {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });
        });
    </script>
</div>
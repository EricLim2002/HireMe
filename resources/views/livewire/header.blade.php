<div class="fixed top-0 left-0 w-full bg-white shadow-md z-50 text-sm border-bottom border-white">

    <header class="w-full">
        <div class="max-w-7xl mx-auto px-4 py-2 d-flex align-items-center position-relative navbar general-color">

            <!-- Drawer Button: absolutely positioned so nav stays centered -->
            <button class="hide-drawer-btn position-absolute start-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#drawerMenu" aria-controls="drawerMenu"
                style="background: transparent; border: none; color: white; font-size: 1.5rem; z-index:2;">
                ☰
            </button>
            <div class="dropdown position-absolute start-1">
                <a class="dropdown-toggle nav-link d-flex align-items-center" href="#" role="button"
                    id="languageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('web.general.language') }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    <li><a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'en') }}">English</a></li>
                    <li><a class="dropdown-item {{ app()->getLocale() == 'bm' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'bm') }}">Bahasa Melayu</a></li>
                    <li><a class="dropdown-item {{ app()->getLocale() == 'cn' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'cn') }}">中文</a></li>
                </ul>
            </div>
            <!-- Centered nav -->
            <nav class="d-flex mx-auto">
                <a href="/" class="nav-link">{{ __('web.navigation.home') }}</a>
                <a href="/about" class="nav-link">{{ __('web.navigation.about') }}</a>
                <a href="/contact" class="nav-link">{{ __('web.navigation.contact') }}</a>
                <a href="/showcase" class="nav-link">{{ __('web.navigation.showcase') }}</a>
                <a href="/documentation" class="nav-link">{{ __('web.navigation.documentation') }}</a>
            </nav>

            <!-- Right menu -->
            <div class="d-flex align-items-center position-absolute end-0 me-3 gap-2">
                <!-- Language Dropdown -->

                <!-- Theme Toggle Button -->
                <button id="theme-toggle"
                    class="btn btn-outline-light d-flex align-items-center justify-content-center me-2" type="button"
                    aria-pressed="false" title="Toggle dark mode" style="width:38px; height:38px;">
                    🌙
                </button>
            </div>


        </div>
    </header>


    <div class="offcanvas offcanvas-start" tabindex="-1" id="drawerMenu" aria-labelledby="drawerMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="drawerMenuLabel">Menu</h5>
            <!-- Removed the close button -->
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="/" class="nav-link">{{ __('web.navigation.home') }}</a></li>
                <li><a href="/about" class="nav-link">{{ __('web.navigation.about') }}</a></li>
                <li><a href="/contact" class="nav-link">{{ __('web.navigation.contact') }}</a></li>
                <li><a href="/showcase" class="nav-link">{{ __('web.navigation.showcase') }}</a></li>
            </ul>

            <hr>

            <!-- Language Switch inside Drawer -->
            <div class="dropdown">
                <a class="dropdown-toggle nav-link" href="#" role="button" data-bs-toggle="dropdown">
                    {{ __('web.general.language') }}
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'en') }}">English</a></li>
                    <li><a class="dropdown-item {{ app()->getLocale() == 'bm' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'bm') }}">Bahasa Melayu</a></li>
                    <li><a class="dropdown-item {{ app()->getLocale() == 'cn' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'cn') }}">中文</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const drawerEl = document.getElementById('drawerMenu');
            const drawer = new bootstrap.Offcanvas(drawerEl);
            const toggleBtn = document.querySelector('[data-bs-toggle="offcanvas"]');

            // Open on hover
            toggleBtn.addEventListener('mouseenter', () => {
                drawer.show();
            });

            // Close when mouse leaves the drawer
            drawerEl.addEventListener('mouseleave', () => {
                drawer.hide();
            });
        });

        (function () {
            const STORAGE_KEY = 'theme';
            const root = document.documentElement;
            const btn = document.getElementById('theme-toggle');

            function applyTheme(theme) {
                const isDark = theme === 'dark';
                root.classList.toggle('dark', isDark);
                root.setAttribute('data-bs-theme', isDark ? 'dark' : 'light');

                // only update icon, keep button transparent
                btn.textContent = isDark ? '☀️' : '🌙';
                btn.setAttribute('aria-pressed', String(isDark));
            }

            const saved = localStorage.getItem(STORAGE_KEY);
            if (saved === 'dark' || saved === 'light') {
                applyTheme(saved);
            } else {
                const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                applyTheme(prefersDark ? 'dark' : 'light');
            }

            btn.addEventListener('click', () => {
                const next = root.classList.contains('dark') ? 'light' : 'dark';
                localStorage.setItem(STORAGE_KEY, next);
                applyTheme(next);
            });
        })();
    </script>
</div>
<!-- Fixed header -->
<div class="fixed-top border-bottom">
    <header>
        <div class="container-fluid py-1 position-relative navbar general-color">

            <!-- Left: Drawer toggle (MOBILE ONLY) -->
            <button class="btn btn-link text-white position-absolute start-0 ps-3 d-md-none" type="button"
                data-bs-toggle="offcanvas" data-bs-target="#drawerMenu" aria-controls="drawerMenu"
                aria-label="Open menu">
                ☰
            </button>

            <!-- Optional language dropdown (desktop: keep near left if you want) -->
            <div class="dropdown position-absolute start-0 ps-5 d-none d-md-block">
                <a class="dropdown-toggle nav-link text-white" href="#" id="languageDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('web.general.language') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                    <li><a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'en') }}">English</a></li>
                    <li><a class="dropdown-item {{ app()->getLocale() == 'bm' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'bm') }}">Bahasa Melayu</a></li>
                    <li><a class="dropdown-item {{ app()->getLocale() == 'cn' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'cn') }}">中文</a></li>
                </ul>
            </div>

            <!-- Center: main nav (DESKTOP/TABLET ONLY) -->
            <nav class="d-none d-md-flex gap-3 justify-content-center mx-auto">
                <a href="/" class="nav-link text-white">{{ __('web.navigation.home') }}</a>
                <a href="/about" class="nav-link text-white">{{ __('web.navigation.about') }}</a>
                <a href="/contact" class="nav-link text-white">{{ __('web.navigation.contact') }}</a>
                <a href="/showcase" class="nav-link text-white">{{ __('web.navigation.showcase') }}</a>
                <a href="/documentation" class="nav-link text-white">{{ __('web.navigation.documentation') }}</a>
            </nav>

            <!-- Right: actions (show on all sizes) -->
            <div class="d-flex align-items-center position-absolute end-0 pe-3 gap-2">
                <!-- Theme toggle -->
                <button id="theme-toggle"
                    class="btn btn-outline-light d-inline-flex align-items-center justify-content-center" type="button"
                    aria-pressed="false" title="Toggle dark mode" style="width:38px;height:38px;">
                    🌙
                </button>
            </div>
        </div>
    </header>

    <!-- Offcanvas (MOBILE ONLY) -->
    <div class="offcanvas offcanvas-start d-md-none" tabindex="-1" id="drawerMenu" aria-labelledby="drawerMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="drawerMenuLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled mb-3">
                <li><a href="/" class="nav-link">{{ __('web.navigation.home') }}</a></li>
                <li><a href="/about" class="nav-link">{{ __('web.navigation.about') }}</a></li>
                <li><a href="/contact" class="nav-link">{{ __('web.navigation.contact') }}</a></li>
                <li><a href="/showcase" class="nav-link">{{ __('web.navigation.showcase') }}</a></li>
                <li><a href="/documentation" class="nav-link">{{ __('web.navigation.documentation') }}</a></li>
            </ul>

            <hr>

            <!-- Language switch (mobile) -->
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
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Theme boot + toggle (Bootstrap 5.3 theming)
    (function () {
        const STORAGE_KEY = 'theme';
        const root = document.documentElement;
        const btn = document.getElementById('theme-toggle');

        function applyTheme(theme) {
            const isDark = theme === 'dark';
            root.setAttribute('data-bs-theme', isDark ? 'dark' : 'light');
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
            const next = (root.getAttribute('data-bs-theme') === 'dark') ? 'light' : 'dark';
            localStorage.setItem(STORAGE_KEY, next);
            applyTheme(next);
        });
    })();

    // Remove hover-to-open entirely (drawer is mobile-only now)
</script>
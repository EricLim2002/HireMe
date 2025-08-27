<div>

    <header class="fixed top-0 left-0 w-full bg-white shadow-md z-50 text-sm">
        <div class="max-w-7xl mx-auto px-4 py-2 d-flex justify-content-between align-items-center navbar general-color">
            <!-- Left nav -->
            <button type="button" data-bs-toggle="offcanvas" data-bs-target="#drawerMenu" aria-controls="drawerMenu"
                style="background-color: transparent; border: none; color: white; font-size: 1.5rem; z-index:2;">
                ☰
            </button>
            <nav class="d-flex gap-2">
                <a href="/" class="nav-link">{{ __('web.navigation.home') }}</a>
                <a href="/about" class="nav-link">{{ __('web.navigation.about') }}</a>
                <a href="/contact" class="nav-link">{{ __('web.navigation.contact') }}</a>
                <a href="/showcase" class="nav-link">{{ __('web.navigation.showcase') }}</a>
            </nav>

            <!-- Right dropdown -->
            <div class="dropdown me-3"> <!-- 'me-3' adds margin-end so it's not stuck -->
                <a class="dropdown-toggle nav-link" href="#" role="button" id="languageDropdown"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    {{ __('web.general.language') }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'en') }}">English</a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() == 'bm' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'bm') }}">Bahasa Melayu</a>
                    </li>
                    <li>
                        <a class="dropdown-item {{ app()->getLocale() == 'cn' ? 'active' : '' }}"
                            href="{{ route('lang.switch', 'cn') }}">中文</a>
                    </li>
                </ul>
            </div>

        </div>

    </header>

    <div class="offcanvas offcanvas-start" tabindex="-1" id="drawerMenu" aria-labelledby="drawerMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="drawerMenuLabel">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="list-unstyled">
                <li><a href="/" class="nav-link">{{ __('web.navigation.home') }}</a></li>
                <li><a href="/about" class="nav-link">{{ __('web.navigation.about') }}</a></li>
                <li><a href="contact" class="nav-link">{{ __('web.navigation.contact') }}</a></li>
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
</div>
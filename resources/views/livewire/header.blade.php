<header class="fixed top-0 left-0 w-full bg-white shadow-md z-50 text-sm">
    <div class="max-w-7xl mx-auto px-4 py-2 d-flex justify-content-between align-items-center navbar general-color">
        <!-- Left nav -->
        <nav class="d-flex gap-2">
            <a href="/" class="nav-link">{{ __('web.navigation.home') }}</a>
            <a href="/about" class="nav-link">{{ __('web.navigation.about') }}</a>
            <a href="/experience" class="nav-link">{{ __('web.navigation.experience') }}</a>
            <a href="/showcase" class="nav-link">{{ __('web.navigation.showcase') }}</a>
        </nav>

        <!-- Right dropdown -->
        <div class="dropdown me-3"> <!-- 'me-3' adds margin-end so it's not stuck -->
            <a class="dropdown-toggle nav-link" href="#" role="button" id="languageDropdown" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ __('web.general.language') }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                <li>
                    <a class="dropdown-item {{ app()->getLocale() === 'en' ? 'active' : '' }}"
                        href="{{ route('lang.switch', 'en') }}">English</a>
                </li>
                <li>
                    <a class="dropdown-item {{ app()->getLocale() === 'ms' ? 'active' : '' }}"
                        href="{{ route('lang.switch', 'ms') }}">Bahasa Melayu</a>
                </li>
                <li>
                    <a class="dropdown-item {{ app()->getLocale() === 'zh' ? 'active' : '' }}"
                        href="{{ route('lang.switch', 'zh') }}">中文</a>
                </li>
            </ul>
        </div>

    </div>
</header>
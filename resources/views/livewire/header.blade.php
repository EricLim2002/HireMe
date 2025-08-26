<header class="fixed top-0 left-0 w-full bg-white shadow-md z-50 row">
    <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center navbar">
        <div class='d-flex col-12 w-full row d-flex'>
            <div class="col-8 d-flex justify-content-start">
                <nav>
                    <a href="/" class="m-1 col-3">{{ __('web.navigation.home') }}</a>
                    <a href="/about" class="m-1 col-3">{{ __('web.navigation.about') }}</a>
                    <a href="/showcase" class="m-1 col-3">{{ __('web.navigation.showcase') }}</a>
                </nav>
            </div>
            <div class="col-4 d-flex justify-content-end">
                <a href="{{ route('lang.switch', 'en') }}"
                    class="{{ app()->getLocale() === 'en' ? 'font-bold underline' : '' }} m-1">
                    English
                </a>
                <a href="{{ route('lang.switch', 'ms') }}"
                    class="{{ app()->getLocale() === 'ms' ? 'font-bold underline' : '' }}  m-1">
                    Bahasa Melayu
                </a>
                <a href="{{ route('lang.switch', 'zh') }}"
                    class="{{ app()->getLocale() === 'zh' ? 'font-bold underline' : '' }}  m-1">
                    中文
                </a>
            </div>
        </div>
    </div>
</header>
<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{
    public function handle($request, Closure $next)
    {
        $lang = Session::get('language_settings', 'en');
        $available = ["en", "bm", "cn"];

        if (! in_array($lang, $available)) {
            $lang = 'en'; // fallback
        }

        App::setLocale($lang);

        return $next($request);
    }
}

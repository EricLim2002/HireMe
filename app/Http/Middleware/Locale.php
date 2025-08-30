<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use App\Http\Helper\GeneralHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class Locale
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // Get language from session, default to 'en'
            $lang = Session::get('language_settings', 'en');

            // Allowed languages
            $available = ['en', 'bm', 'cn'];
            if (!in_array($lang, $available)) {
                $lang = 'en';
            }

            // Apply locale
            App::setLocale($lang);

            return $next($request);
        } catch (Exception $e) {
            GeneralHelper::saveTryCatch("Locale", 'middleware', $request, $e);
        }
    }
}

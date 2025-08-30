<?php

use App\Http\Controllers\FileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\GeneralController;
use App\Http\Middleware\TrackVisitor;

Route::middleware([TrackVisitor::class])->group(function () {
    Route::get('/lang/{locale}', function ($locale) {
        if (in_array($locale, ['en', 'bm', 'cn'])) {
            session(['language_settings' => $locale]);
        }
        return redirect()->back(); // force new request so Locale middleware runs
    })->name('lang.switch');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/contact', function () {
        return view('page.contactme');
    });

    Route::get('/documentation', function () {
        return view('page.documentation');
    });

    Route::get('/showcase', function () {
        return view('page.showcase');
    });

    Route::get('/about', function () {
        return view('page.aboutme');
    });
    Route::get('/certs', function () {
        $files = Storage::files('private/download'); // list certs
        return view('certs', ['files' => array_map('basename', $files)]);
    })->name('certs.index');

    Route::get('/preview/{encoded}', [FileController::class, 'preview'])
        ->name('preview');

    Route::get('/download/{encoded}', [FileController::class, 'download'])
        ->name('download');

    Route::get('/session-data', [GeneralController::class, 'getSessionData']);
    Route::get('/test-locale', function () {
        dd(App::getLocale(), Session::get('language_settings'));
    });
});
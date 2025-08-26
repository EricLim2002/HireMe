<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'bm', 'cn'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');

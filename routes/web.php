<?php

use Illuminate\Support\Facades\Route;


Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'bm', 'cn'])) {
        session(['locale' => $locale]);
    }
    return back();
})->name('lang.switch');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('aboutme');
});


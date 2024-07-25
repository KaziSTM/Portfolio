<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\View\Pages')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/about', About::class)->name('about');
});

<?php

use Illuminate\Support\Facades\Route;


Route::namespace('App\View\Pages')->group(function () {
    Route::get('/about', About::class)->name('about');
});


Route::livewire('/', 'pages::home')->name('home');

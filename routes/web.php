<?php

use App\View\Pages\Home;
use Illuminate\Support\Facades\Route;


Route::namespace('App\View\Pages')->group(function () {
    Route::get('/', Home::class)->name('home');
});

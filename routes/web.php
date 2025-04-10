<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/findStays', function () {
    return view('partials.findStays.mainFindStay');
})->name('findStays');

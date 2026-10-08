<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/article', function () {
    return view('pages.article');
})->name('articles.index');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact.index');

Route::get('/experience', function () {
    return view('pages.experience');
})->name('experiences.index');

if (App::hasDebugModeEnabled()) {
    Route::view('/test/components', 'tests.components')->name('tests.components');
}

<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
});
Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/article', function () {
    return view('pages.article');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('/experience', function () {
    return view('pages.experience');
});

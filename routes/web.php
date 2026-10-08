<?php

use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::get('/about', function () {
    return view('pages.about');
})->name('about');

Route::get('/podcast', function () {
    return view('pages.podcasts');
})->name('podcasts.index');

Route::get('/blog', function () {
    return view('pages.article');
})->name('articles.index');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact.index');

Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,1')
    ->name('contact.store');

Route::get('/experiences', function () {
    return view('pages.experience');
})->name('experiences.index');

Route::get('/experiences/{id}', function ($id) {
    return view('pages.experienceDetail', ['id' => $id]);
})->name('experiences.show');

if (App::hasDebugModeEnabled()) {
    Route::view('/test/components', 'tests.components')->name('tests.components');
}

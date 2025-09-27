<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;
use Illuminate\Support\Facades\Route;


Route::get('/' , HomeController::class)->name('home');
Route::resource('/music', MusicController::class)->name('index','music');

Route::inertia('/videos','Videos')->name('videos');
route::inertia('/news', 'News')->name('news');
route::inertia('/terms', 'Terms')->name('terms');
route::inertia('/privacy', 'Privacy')->name('privacy');
route::inertia('/disclaimer', 'Disclaimer')->name('disclaimer');
route::inertia('/aboutus', 'Aboutus')->name('aboutus');
route::inertia('/contactus', 'Contactus')->name('contactus');
route::inertia('/music/download/{trackName}', 'DownloadTrack')->name('downloadTrack');
route::inertia('/video/{videoName}', 'ViewVideo')->name('viewVideo');
route::inertia('/news/article/{newsTitle}', 'ReadArticle')->name('readNews');

Route::fallback(function(){
    return inertia('NotFound');
});
<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;


Route::get('/' , HomeController::class)->name('home');
Route::get('/music', [MusicController::class,'index'])->name('music');
Route::get('/videos', [VideosController::class,'index'])->name('videos');
Route::get('/news', [NewsController::class,'index'])->name('news');

Route::get('/music/{track}', [MusicController::class,'show'])->name('DownloadTrack');
route::get('/video/{video}', [VideosController::class,'show'])->name('viewVideo');

route::inertia('/terms', 'Terms')->name('terms');
route::inertia('/privacy', 'Privacy')->name('privacy');
route::inertia('/disclaimer', 'Disclaimer')->name('disclaimer');
route::inertia('/aboutus', 'Aboutus')->name('aboutus');
route::inertia('/contactus', 'Contactus')->name('contactus');
route::inertia('/video/{videoName}', 'ViewVideo')->name('viewVideo');
route::inertia('/news/article/{newsTitle}', 'ReadArticle')->name('readNews');

Route::fallback(function(){
    return inertia('NotFound');
});
<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;

Route::get('/' , HomeController::class)->name('home');
Route::get('/music', [MusicController::class,'index'])->name('music');
Route::get('/music/{track}', [MusicController::class,'show'])->name('DownloadTrack');
Route::get('/muisc/{filename}', [MusicController::class, 'download'])->name('Download');
Route::get('/videos', [VideosController::class,'index'])->name('videos');
Route::get('/video/{video}', [VideosController::class,'show'])->name('viewVideo');
Route::get('/news', [NewsController::class,'index'])->name('news');
Route::get('/news/{article}', [NewsController::class,'show'])->name('readNews');
Route::post('/comment', [NewsController::class,'storeComment'])->name('Comment');
Route::post('/contactus', [ContactController::class,'store'])->name('contact');
Route::post('/subscribe', SubscribeController::class)->name('subscribe');
Route::get('/search', SearchController::class)->name('search');

Route::inertia('/terms', 'Terms')->name('terms');
Route::inertia('/privacy', 'Privacy')->name('privacy');
Route::inertia('/disclaimer', 'Disclaimer')->name('disclaimer');
Route::inertia('/aboutus', 'Aboutus')->name('aboutus');
Route::inertia('/contactus', 'Contactus')->name('contactus');
Route::inertia('/video/{videoName}', 'ViewVideo')->name('viewVideo');

Route::fallback(function(){
    return inertia('NotFound');
});


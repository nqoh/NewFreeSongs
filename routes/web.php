<?php

use Illuminate\Support\Facades\Route;


Route::inertia('/','Welcome')->name('home');
Route::inertia('/music','Music')->name('music');
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
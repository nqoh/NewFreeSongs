<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/','Welcome')->name('page.welcome');
Route::inertia('/music','Music')->name('page.music');
Route::inertia('/videos','Video')->name('page.video');
route::inertia('/news', 'News')->name('page.news');
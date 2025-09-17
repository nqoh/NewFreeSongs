<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/','Welcome')->name('pages.welcome');
Route::inertia('/music','Music')->name('page.music');
Route::inertia('/videos','Video')->name('page.video');
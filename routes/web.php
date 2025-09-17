<?php

use Illuminate\Support\Facades\Route;

Route::inertia('/','Welcome')->name('page.welcome');
Route::inertia('/music','Music')->name('page.music');
Route::inertia('/videos','Video')->name('page.video');
route::inertia('/news', 'News')->name('page.news');
route::inertia('/terms', 'Terms')->name('page.terms');
route::inertia('/privacy', 'Privacy')->name('page.privacy');
route::inertia('/disclaimer', 'Disclaimer')->name('page.disclaimer');
route::inertia('/aboutus', 'Aboutus')->name('page.about');
route::inertia('/contactus', 'Contactus')->name('page.contactus');
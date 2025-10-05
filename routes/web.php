<?php

use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SubscribeController;
use App\Http\Controllers\VideosController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){

    Route::get('/' , HomeController::class)->name('home');

    Route::controller(MusicController::class)->group(function(){
        Route::get('/music', 'index')->name('music');
        Route::get('/music/{track}', 'show')->name('DownloadTrack');
        Route::get('/muisc/{filename}', 'download')->name('Download');
     });
   
    Route::controller(VideosController::class)->group(function(){
        Route::get('/videos', 'index')->name('videos');
        Route::get('/video/{video}', 'show')->name('viewVideo');
    });
    
    Route::controller(NewsController::class)->group(function(){
        Route::get('/news', 'index')->name('news');
        Route::get('/news/{article}','show')->name('readNews');
        Route::post('/comment','storeComment')->name('Comment');
    });

    Route::post('/contactus', [ContactController::class,'store'])->name('contact');
    Route::post('/subscribe', SubscribeController::class)->name('subscribe');
    Route::get('/search', SearchController::class)->name('search');

    Route::inertia('/terms', 'Terms')->name('terms');
    Route::inertia('/privacy', 'Privacy')->name('privacy');
    Route::inertia('/disclaimer', 'Disclaimer')->name('disclaimer');
    Route::inertia('/aboutus', 'Aboutus')->name('aboutus');
    Route::inertia('/contactus', 'Contactus')->name('contactus');
    Route::inertia('/video/{videoName}', 'ViewVideo')->name('viewVideo');
});


Route::middleware('guest')->prefix('kontrol')->group(function(){

    Route::inertia('/', 'Admin/Auth/Login')->name('Login');

    Route::controller(AuthController::class)->group(function(){
        Route::post('/', 'Login')->name('Login');
    });
});

Route::middleware('auth')->prefix('kontrol')->group(function(){

      Route::inertia('/deshbord','Admin/Deshboard')->name('Deshboard');
      Route::get('/logout',[AuthController::class, 'logout'])->name('Logout');
      Route::get('/table', TableController::class)->name('Edit');
      Route::inertia('/register','Admin/Auth/Register')->name('Register');
      Route::post('/AddNewAdmin',[AuthController::class,'Register'])->name('AddNewAdmin');

      Route::controller(MusicController::class)->group(function(){
        Route::post('/music', 'store')->name('StoreMusic');
        Route::patch('/music', 'update')->name('UpdateMusic');
        Route::delete('/muisc', 'destroy')->name('DeleteMusic');
      });

      Route::controller(VideosController::class)->group(function(){
        Route::post('/video', 'store')->name('StoreVideo');
        Route::patch('/video', 'update')->name('UpdateVideo');
        Route::delete('/video', 'destroy')->name('DeleteVideo');
      });

      Route::controller(NewsController::class)->group(function(){
        Route::post('/news', 'store')->name('StoreNews');
        Route::patch('/news', 'update')->name('UpdateNews');
        Route::delete('/news', 'destroy')->name('DeleteNews');
      });

});


Route::fallback(function(){
    return inertia('NotFound');
});
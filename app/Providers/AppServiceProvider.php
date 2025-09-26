<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
       Relation::morphMap([
        'Video' => 'App\Models\Videos',
        'News'  => 'App\Models\News',
        'Music' => 'App\Models\Music'
       ]);

       JsonResource::withoutWrapping();
    }
}

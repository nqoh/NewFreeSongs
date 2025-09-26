<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\News;
use App\Models\Videos;
use Illuminate\Http\Request;
use App\Http\Resources\MusicResource;
use App\Http\Resources\newsResource;
use App\Http\Resources\videoResource;
use Inertia\Inertia;

class HomeController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {

       $data = [];

       for($i=0 ; $i < 3 ; $i++){
            $music = new MusicResource(Music::inRandomOrder()->first());
            $video = new videoResource(Videos::inRandomOrder()->first());
            $news = new newsResource(News::with('comments')->inRandomOrder()->first());
            $data[] = [$music,$video,$news];
        }

       return  inertia('Welcome', ['data'=>$data]);
    }
}

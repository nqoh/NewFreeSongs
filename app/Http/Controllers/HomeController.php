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
       $music_id = [];
       $videos_id = [];
       $news_id = [];

       for($i=0 ; $i < 3 ; $i++){
            if($i == 0 ){
              $music = new MusicResource(Music::orderBy('today_visits','DESC')->first());
              $video = new videoResource(Videos::orderBy('today_visits','DESC')->first());
              $news = new newsResource(News::with('comments')->orderBy('today_visits','DESC')->first());
            }else{
              $music = new MusicResource(Music::whereNotIn('id',$music_id)->orderBy('today_visits','DESC')->first());
              $video = new videoResource(Videos::whereNotIn('id',$videos_id)->orderBy('today_visits','DESC')->first());
              $news = new newsResource(News::with('comments')->whereNotIn('id',$news_id)->orderBy('today_visits','DESC')->first());
            }
            $data[] = [$music,$video,$news];
            $music_id[] = $data[$i][0]['id'];
            $videos_id[] = $data[$i][1]['id'];
            $news_id[] = $data[$i][2]['id'];
        }
         return  inertia('Welcome', ['data'=>$data]);
    }
}

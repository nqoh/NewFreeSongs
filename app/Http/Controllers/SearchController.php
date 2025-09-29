<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Music;
use App\Models\News;
use App\Models\Videos;
use App\Http\Resources\MusicResource;
use App\Http\Resources\newsResource;
use App\Http\Resources\videoResource;


class SearchController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if(request()->has('query')){

            $query = $request->query('query');
            $page = request('page', 1);
            $perPage = 10;

            $music = MusicResource::collection(Music::where('title','like',"%{$query}%")->get());

            $videos = videoResource::collection(Videos::where('title','like',"%{$query}%")->get());

            $news = newsResource::collection(News::where('title','like',"%{$query}%")->get());

            $result = collect()
                      ->merge($music)
                      ->merge($videos)
                      ->merge($news)
                      ->sortBy('title')->values();

            $data = new LengthAwarePaginator(
                    $result->forPage($page, $perPage)->values(),
                    $result->count(),
                    $perPage,
                    $page,
                    [
                        'path' => request()->url(),
                        'query' => request()->query()
                    ]
                 );

            return inertia('Search',['Data'=>$data, 'Query'=>$query]);
        }
        return inertia('NotFound');
    }
}

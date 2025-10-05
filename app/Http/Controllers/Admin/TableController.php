<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\MusicResource;
use App\Http\Resources\videoResource;
use App\Http\Resources\NewsResource;
use App\Models\Music;
use App\Models\Videos;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TableController extends Controller
{
    public function __invoke(Request $request)
    {
            $query = $request->query('query');
            $page = request('page', 1);
            $perPage = 10;

            $music  = MusicResource::collection(Music::where('title','like',"%{$query}%")->get());

            $videos = videoResource::collection(Videos::where('title','like',"%{$query}%")->get());

            $news   = newsResource::collection(News::where('title','like',"%{$query}%")->get());

            $result = collect()
                      ->merge($music)
                      ->merge($videos)
                      ->merge($news)
                      ->sortBy('id')->values();

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

            return inertia('Admin/Table',['Data'=>$data, 'Query'=>$query]);
        
    }
}

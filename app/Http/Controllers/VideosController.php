<?php

namespace App\Http\Controllers;

use App\Http\Resources\videoResource;
use App\Models\Videos;
use App\DailyVisits;
use App\Http\Requests\VideoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    use DailyVisits;

    public function index()
    {
        $videos = videoResource::collection(Videos::orderBy('daily_visits','DESC')->paginate(10));
        return inertia('Videos',['Videos' => $videos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $image = request('image');
        $imageName= time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$imageName);

        $input = public_path('images/'.time().$imageName);
        exec("magick convert {$input} -resize 364x350 {$input}");

        Videos::create([
            'user_id'=> Auth::id(),
            'title' => request('title'),
            'image' => $imageName,
            'description' => request('description'),
            'endpoint' => request('endpoint')
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $video)
    {
        $video = Videos::where('title', $video)->first();

        if($video){

           $this->visits($request, $video,"Videos");

           $suggestions = videoResource::collection(Videos::inRandomOrder()->take(3)->get()); 
           $video = new videoResource($video);
           return inertia('ViewVideo',['Video'=> $video, 'suggestions'=> $suggestions]);
           
        }
        return inertia('NotFound');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Videos $videos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Videos $videos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videos $videos)
    {
        //
    }
}

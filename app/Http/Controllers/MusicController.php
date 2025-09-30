<?php

namespace App\Http\Controllers;

use App\DailyVisits;
use App\Models\Music;
use Illuminate\Http\Request;
use App\Http\Resources\MusicResource;


class MusicController  extends Controller
{
    use DailyVisits;

    public function index()
    {
        if(request()->has('genre')){
            $music = MusicResource::collection(
                 Music::when(request('genre'),function($query){
                   $query->where('genre', request('genre')); 
                    })->orderBy('daily_visits','DESC')->paginate(10)->withQueryString()
                 );
            return inertia('Music', ['Music'=> $music, 'Genre'=>request('genre')]);
         }
         
         $music = MusicResource::collection(Music::orderBy('daily_visits','DESC')->paginate(10));
         return inertia('Music', ['Music'=> $music]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $track)
    {
       
         $music = Music::where('title', $track)->first();

        if($music){

         $this->visits($request, $music,"Music");   
         $suggestions = MusicResource::collection(Music::inRandomOrder()->take(3)->get()); 
         $track = new MusicResource($music);
         return inertia('DownloadTrack', ['Track'=> $track,'suggestions'=> $suggestions]);
         
        }
        return inertia('NotFound');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Music $music)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Music $music)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Music $music)
    {
        //
    }
}

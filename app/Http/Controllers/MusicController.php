<?php

namespace App\Http\Controllers;

use App\Models\Music;
use Illuminate\Http\Request;
use App\Http\Resources\MusicResource;
use Illuminate\Support\Facades\Route;

class MusicController  extends Controller
{
    public function index()
    {
        $music = MusicResource::collection(Music::inRandomOrder()->paginate(10));
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
    public function show($track)
    {
        $music = Music::where('title', $track)->first();
        if($music){
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

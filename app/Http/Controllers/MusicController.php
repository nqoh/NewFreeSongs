<?php

namespace App\Http\Controllers;

use App\DailyVisits;
use App\Http\Requests\MusicRequest;
use App\Models\Music;
use Illuminate\Http\Request;
use App\Http\Resources\MusicResource;
use Illuminate\Support\Facades\Auth;
use getid3_writetags;

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
    public function download($filename)
    {
      $path  = public_path("musicfiles/$filename").'.mp3';
      if(!file_exists($path)){
         return inertia('NotFound');
      }
      return response()->download($path,basename($path),[
          'Pragma' => 'public',
          'Expires' => 0,
          'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
          'Cache-Control' => 'private'. false,
          'Content-type' => 'audio/mpeg/force-download',
          'Content-Disposition' => 'attachment; filename='.basename($path),
          'Content-Transfer-Encoding' => 'binary',
          'Content-Length' => filesize($path)
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MusicRequest $request)
    {
         $music = request('music');
         $image = request('image');

         if(file_exists(public_path('musicfiles/'.$music->getClientOriginalName()))){
            return back()->with('musicExists','Music file alread exists');
         }else{

         $music->move(public_path('musicfiles'), $music->getClientOriginalName());
         $image->move(public_path('images'),time().'.'.$image->getClientOriginalExtension());

         $input = public_path('images/'.time().'.'.$image->getClientOriginalExtension());
         exec("magick convert {$input} -resize 364x350 {$input}");

         require_once base_path('vendor/james-heinrich/getid3/getid3/getid3.php');
         require_once base_path('vendor/james-heinrich/getid3/getid3/write.php');

         $tagwriter = new getid3_writetags;
         $tagwriter->filename = public_path('/musicfiles/'.$music->getClientOriginalName());

         $tagwriter->tagformats = ['id3v1', 'id3v2.3'];
         $tagwriter->overwrite_tags = true;
         $tagwriter->remove_other_tags = true;
         $tagwriter->tag_encoding = 'UTF-8';

         $tagData = [
            'title'  => [pathinfo($music->getClientOriginalName(),PATHINFO_FILENAME).' | NewFreeSongs.com'],
            'year'   => [date('Y')],
            'artist' => ['NewFreeSongs.com'],
            'album'  => ['NewFreeSongs.com'],
            'album_artist'=> ['NewFreeSongs.com'],
            'encoder'=> ['NewFreeSongs.com'],
            'encodedby'=> ['NewFreeSongs.com'],
            'author'=> ['NewFreeSongs.com'],
            'copyright'=> ['NewFreeSongs.com'],
            'author_url'=> ['https://newfreesongs.com'],
            'genre'  => [''.request('genre').''],
            'comment'=> ['NewFreeSongs.com'],
        ];

    if (public_path('/assets/images/log.png')) {
        $imageFile = public_path('/assets/images/log.png');
        $imageData = file_get_contents($imageFile);
        $imageMime = 'image/png'; // e.g. image/jpeg or image/png

        $tagData['attached_picture'][0] = [
            'data'          => $imageData,
            'picturetypeid' => 3, // 3 = Cover (front)
            'description'   => 'NewFreeSongs.com',
            'mime'          => $imageMime,
        ];
    }
 
     $tagwriter->tag_data = array_filter($tagData);
     $tagwriter->WriteTags();
            // Tags written successfully    
       Music::create([
           'user_id'=> Auth::id(),
           'title' => pathinfo($music->getClientOriginalName(),PATHINFO_FILENAME),
           'description' => request('description'),
           'image' =>  time().'.'.$image->getClientOriginalExtension(),
           'genre' => request('genre')
         ]);

         return back();
         }
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

<?php

namespace App\Http\Controllers;

use App\Http\Resources\videoResource;
use App\Models\Videos;
use App\ResizeImage;
use App\DailyVisits;
use App\Http\Requests\UpdateVideoRequest;
use App\Http\Requests\VideoRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideosController extends Controller
{
    use DailyVisits;
    use ResizeImage;

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
        $newImageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$newImageName);

        $this->reisze($newImageName);

        Videos::create([
            'user_id'=> Auth::id(),
            'title' => request('title'),
            'image' => $newImageName,
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

           $suggestions = videoResource::collection(
            Videos::whereNotIn('id',[$video->id])->inRandomOrder()->take(3)->get()
        ); 
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
    public function update(UpdateVideoRequest $request,)
    {
         $music = Videos::where('id', request('id'))->first();
         $image = request('image');
        if($image){
            $OldPathImage = public_path('images/'.$music->image);
            if(File::exists($OldPathImage)){
                unlink($OldPathImage);
            }

            $newImageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'),$newImageName);

            $this->reisze($newImageName);

            $music->update([
                'image' => $newImageName,
              ]);
          }
           $music->update([
              'description'=>request('description'),
              'endpoint'=>request('endpoint'),
              'title'=>request('title'),
            ]);

           return back()->with('Updated' ,'Video updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Videos $video)
    {
        $video->delete();
        return redirect()->route('Edit');
        // return back()->with('Deleted' ,'video Destroyed');
    }
}

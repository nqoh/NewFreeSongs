<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\newsResource;
use App\Models\News;
use App\DailyVisits;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\ResizeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    use DailyVisits;
    use ResizeImage;
    public function index()
    {
        $news = newsResource::collection(News::orderBy('daily_visits','DESC')->paginate(10));
        return inertia('News',['News'=> $news]);
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

    public function store(NewsRequest $request)
    {
        $image = request('image');

        $newImageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$newImageName);

        $this->reisze($newImageName);

        News::create([
            'user_id'=> Auth::id(),
            'title' => request('title'),
            'image' => $newImageName,
            'description' => request('description'),
        ]);

        return back();
    } 

    public function storeComment(CommentRequest $request)
    {
          News::find(request('id'))->comments()->create([
            'name'=> request('name'),
            'message' => request('message')
          ]);

          return back()->with('comment','Your comment was successfuly!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $article)
    {
         
        $article = News::where('title', $article)->first();

        if($article){

           $this->visits($request, $article,"News");
           
           $article = new newsResource($article);
           return inertia('ReadArticle',['Article' => $article]);

         }
          return inertia('NotFound');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNewsRequest $request)
    {
        $music = News::where('id', request('id'))->first();
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
             'title'=>request('title'),
           ]);

          return back()->with('Updated' ,'News updated');
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('Edit');
        // return back()->with('Deleted' ,'News Destroyed');
    }
}

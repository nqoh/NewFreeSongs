<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\newsResource;
use App\Models\News;
use App\DailyVisits;
use App\Http\Requests\NewsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    use DailyVisits;

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
        $imageName= time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$imageName);

        $input = public_path('images/'.time().$imageName);
        exec("magick convert {$input} -resize 364x350 {$input}");

        News::create([
            'user_id'=> Auth::id(),
            'title' => request('title'),
            'image' => $imageName,
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
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}

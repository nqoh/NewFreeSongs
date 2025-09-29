<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Resources\newsResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = newsResource::collection(News::inRandomOrder()->paginate(10));
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
    public function storeComment(CommentRequest $request)
    {
          News::find($request->id)->comments()->create([
            'name'=> $request->name,
            'message' => $request->message
          ]);

          return back()->with('comment','Your comment was successfuly!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $article)
    {
         
        $article = News::where('title', $article)->first();

         if(!$request->cookie('news'.$article->id))
         {
            cookie()->queue('news'.$article->id,'news'.$article->id , 60 * 24);
            return "not seet";
         }


        if($article){
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

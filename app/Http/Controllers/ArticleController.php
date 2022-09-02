<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();

        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $article = Article::Create([
            'title' => $request->title,
            'content' => $request->content,
            'vote' => 0,

        ]);

        // return redirect(route('article.index'));

        return response()->json($article);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);

        return response()->json($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('article.view_votes', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (isset($request->upvote)) {
            $article = Article::findOrFail($id);

            $vote_count = $article->vote + 1;

            $article->vote = $article->vote + 1;
            $article->save();

            return response()->json(['vote_count' => $vote_count]);
        }

        if (isset($request->downvote)) {
            $article = Article::findOrFail($id);

            $vote_count = $article->vote - 1;

            $article->vote = $article->vote - 1;
            $article->save();

            return response()->json(['vote_count' => $vote_count]);
        }


        $article = Article::findOrFail($id);
        $article->title = $request->title_update;
        $article->content = $request->content_update;
        $article->save();
        return response()->json($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return response()->json(['messgae' => 'Article Deleted']);
    }
}

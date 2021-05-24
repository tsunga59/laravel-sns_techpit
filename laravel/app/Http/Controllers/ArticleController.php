<?php

namespace App\Http\Controllers;

use App\Article;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all()->sortByDesc('created_at');
        
        return view('articles.index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->user_id = $request->user()->id;
        // $article->title = $request->title;
        // $article->body = $request->body;
        $article->fill($request->all());

        $article->save();

        return redirect()->route('articles.index');
    }

    public function show($id)
    {

    }

    public function edit($id)
    {

    }

    public function update(ArticleRequest $request)
    {
        
    }

    public function destroy($id)
    {

    }
    
}

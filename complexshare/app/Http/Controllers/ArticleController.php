<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;

class ArticleController extends Controller
{
    public function index()
    {

        $articles = Article::orderBy('created_at', 'desc')->paginate(10);

        return view('articles.index', ['articles' => $articles]);
    }


    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {

        $article = new Article;
        $article->user_id = $request->user_id;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        return redirect()->route('top');
    }
    public function __construct()
    {
      $this->middleware('auth', array('except' => 'index'));
    }


    public function show($id) {
        $article = Article::findOrFail($id); 
  
        $like = $article->likes()->where('user_id', Auth::user()->id)->first();
  
        return view('articles.show')->with(array('article' => $article, 'like' => $like));
      }



    public function edit($article_id)
    {
        $article = Article::findOrFail($article_id);

        return view('articles.edit', ['article' => $article,]);
    }

    public function update($article_id, Request $request)
    {
        $params = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:2000',
        ]);

        $article = Article::findOrFail($article_id);
        $article->fill($params)->save();

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy($article_id)
    {

        $article = Article::findOrFail($article_id);

        DB::transaction(function () use ($article) {
            $article->comments()->delete();
            $article->delete();
        });

        return redirect()->route('top');
    }
}

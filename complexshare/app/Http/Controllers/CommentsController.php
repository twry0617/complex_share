<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class CommentsController extends Controller
{
    public function store(Request $request){

        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'article_id' => 'required|exists:articles,id',
            'body' => 'required|max:2000',
        ]);

        $article = Article::findOrFail($params['article_id']);
        $article->comments()->create($params);

        return redirect()->route('articles.show' ,['article' => $article]);
    }
}

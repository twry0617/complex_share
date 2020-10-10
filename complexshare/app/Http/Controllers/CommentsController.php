<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Entities\Article;
use App\Entities\User;
use App\Entities\Comment;

class CommentsController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {

        $params = $request->validate([
            'user_id' => 'required|exists:users,id',
            'article_id' => 'required|exists:articles,id',
            'body' => 'required|max:2000',
        ]);

        $article = Article::findOrFail($params['article_id']);
        $article->comments()->create($params);

        return redirect()->route('articles.show', ['article' => $article]);
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return redirect()->route('articles.index');
    }
}

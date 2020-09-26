<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Entities\Like;
use Auth;
use App\Entities\Article;

class LikesController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @param [type] $articleId
     * @return void
     */
    public function store($articleId)
    {
        Like::create(
            array(
                'user_id' => Auth::user()->id,
                'article_id' => $articleId
            )
        );

        $article = Article::findOrFail($articleId);

        return redirect()->action('ArticleController@show', $article->id);
    }
    /**
     * Undocumented function
     *
     * @param [type] $articleId
     * @param [type] $likeId
     * @return void
     */
    public function destroy($articleId, $likeId)
    {
        $article = Article::findOrFail($articleId);

        $article->like_by()->findOrFail($likeId)->delete();

        return redirect()->action('ArticleController@show', $article->id);
    }
}

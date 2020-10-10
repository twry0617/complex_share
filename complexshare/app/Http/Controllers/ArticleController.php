<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\Entities\Article;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Entities\User;

/**
 * Undocumented class
 */
class ArticleController extends Controller
{

    /**
     * Undocumented function
     */
    public function __construct()
    {
        $this->middleware('auth', array('except' => 'index'));
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);


        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function create()
    {
        return view('articles.create');
    }
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(ArticleRequest $request)
    {

        $article = new Article;
        $article->fill($request->all())->save();

        return redirect()->route('articles.index');
    }
    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     */
    public function show(Article $article)
    {

        $like = $article->likes()->where('user_id', Auth::user()->id)->first();

        return view('articles.show')->with(array('article' => $article, 'like' => $like));
    }


    /**
     * Undocumented function
     *
     * @param [type] $article_id
     * @return void
     */
    public function edit(Article $article)
    {
        //$this->authorize('edit', $article);
        return view('articles.edit', ['article' => $article]);
    }
    /**
     * Undocumented function
     *
     * @param [type] $article_id
     * @param Request $request
     * @return void
     */
    public function update(Article $article, ArticleRequest $request)
    {
        $article->fill($request->all())->save();

        return redirect()->route('articles.show', ['article' => $article]);
    }
    /**
     * Undocumented function
     *
     * @param [type] $article_id
     * @return void
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);
        $article->delete();

        return redirect()->route('articles.index');
    }
}

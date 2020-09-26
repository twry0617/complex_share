<?php

namespace App\Http\Controllers;

use App\Entities\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Entities\User;
use App\Entities\Like;
use App\Entities\Mypage;



class MypageController extends Controller

{
    public function index()
    {
        //$user_id = Auth::id();

        $user = Auth::user();
        //$user = Auth::user()->with([
            //'articles' => function ($query) {
                //$query->orderBy('created_at', 'desc');
            //},
           // 'articles',
           // 'articles.likes',
            //'articles.user'
        //])->get()->find($user_id);

        $articles = Article::all();

        return view('auth.mypage', compact('user', 'articles'));
    }
}

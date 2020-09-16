<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Like;



class MypageController extends Controller

{
    public function index(User $user, Like $like)
    {
        $users = $user->all();
        

        return view('auth.mypage', ['likes' => $likes], ['users' => $users]);
    }
}

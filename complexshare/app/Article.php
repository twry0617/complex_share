<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\like;

class Article extends Model
{
    protected $fillable = ['title', 'body', 'user_id'];

    public function users()
    {
        return $this->belongsto('App\User');

    }

    public function comments(){

        return $this->hasmany('App\Comment');
    }

    public function likes(){
        return $this->hasmany('App\like');
    }

    public function like_by(){
        return Like::where('user_id', Auth::user()->id)->first();
    }


}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Article;
use App\User;

class Comment extends Model
{
    protected $fillable = [
        'body', 'user_id', 'article_id'
    ];

    public function article(){

        return $this->belongsTo('App\Article');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}

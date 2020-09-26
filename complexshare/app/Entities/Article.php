<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Entities\Like;



class Article extends Model

{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = ['title', 'body', 'user_id'];
    /**
     * Undocumented function
     *
     * @return void
     */
    public function users()
    {
        return $this->belongsto('App\Entities\User');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function comments()
    {

        return $this->hasmany('App\Entities\Comment');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function likes()
    {
        return $this->hasmany('App\Entities\like');
    }
    /**
     * 
     *
     * @return void
     */
    public function like_by()
    {
        return Like::where('user_id', Auth::user()->id)->first();
    }
}

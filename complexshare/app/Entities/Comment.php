<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Article;
use App\Entities\User;

class Comment extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'body', 'user_id', 'article_id'
    ];
    /**
     * Undocumented function
     *
     * @return void
     */
    public function article()
    {

        return $this->belongsTo('App\Entities\Article');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\Entities\User');
    }
}

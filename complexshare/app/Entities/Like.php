<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use kanazaca\CounterCache\CounterCache;


class Like extends Model
{
    use CounterCache;
    public $counterCacheOptions = [
        'article' => [
            'field' => 'likes_count',
            'foreignKey' => 'article_id'
        ]
    ];
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'article_id'];
    /**
     * Undocumented function
     *
     * @return void
     */
    public function Article()
    {
        return $this->belongsTo('App\Entities\Article');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function User()
    {
        return $this->belongsTo(User::class);
    }
}

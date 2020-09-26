<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * Undocumented function
     *
     * @return void
     */
    public function likes()
    {
        return $this->hasmany(Like::class);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function articles()
    {
        return $this->hasmany('App\Entities\Article');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany('App\Entities\Comment');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function chatMessages()
    {
        return $this->hasMany('App\Entities\ChatMessage');
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function chatRoonUsers()
    {
        return $this->hasMany('App\Entities\ChatRoomUsers');
    }
}

<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Mypage extends Model
{
    /**
     * Undocumented variable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'id'
    ];
}

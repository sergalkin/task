<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
\Carbon\Carbon::setToStringFormat('H:i d.m.Y');

class Comment extends Model
{
    protected $hidden = [
        'remember_token'
    ];

    protected $fillable = [
        'user_name', 'user_comment', 'created_at', 'updated_at'
    ];
    protected $dates = ['created_at', 'updated_at'];

}

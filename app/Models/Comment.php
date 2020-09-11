<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id',
        'description',
        'user_id'

    ];

    public function post()
    {
        return $this->belongsto('App\Models\Post');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }


}

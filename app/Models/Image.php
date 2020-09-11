<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'name',
        'post_id',
    ];

    public function post()
    {
        return $this->belongsto('App\Models\Post');
    }
}

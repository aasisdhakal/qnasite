<?php

namespace App;

use http\Env\Request;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}

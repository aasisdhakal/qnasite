<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Like extends Model
{

    use SoftDeletes;

    protected $guarded=['post_id','user_id','deleted_at'];


    public function posts()
    {

        return $this->hasMany('App\Post');
    }

}

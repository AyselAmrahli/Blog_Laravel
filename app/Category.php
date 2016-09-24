<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    //relation with post
    public function posts(){
      return $this->hasMany('App\Post');
    }
}

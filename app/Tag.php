<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //relation with posts /ManyToMany/
    public function posts(){
      return $this->belongsToMany('App\Post');
    }
}

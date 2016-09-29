<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //relation with category /ManyToOne/
    public function category(){
      return $this->belongsTo('App\Category');
    }


    //relation with tags /ManyToMany/
    public function tags(){
      return $this->belongsToMany('App\Tag','post_tag');
    }


}

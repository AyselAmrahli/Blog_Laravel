<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Post;

class BlogController extends Controller
{
   public function getIndex(){
     $posts = Post::paginate(5);
     return view('blog.index')->withPosts($posts);
   }


    public function getSingle($slug){
      //fetch data from database
      $post = Post::where('slug','=',$slug)->first();

      //return view

      return view('blog.single')->withPost($post);
    }
}

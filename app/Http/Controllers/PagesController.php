<?php

namespace App\Http\Controllers;
use App\Post;
class PagesController extends Controller {

public function getIndex(){
  $posts = Post::orderBy('created_at','desc')->limit(4)->get();
return view('pages.welcome')->withPosts($posts);

}

public function getAbout(){
$ad = 'Aysel';
$soyad = 'Emrahli';
$adSoyad = $ad."  ".$soyad;
$email = 'aysel.emrahli@code.edu.az';

$data = [];
$data['ad'] = $ad;
$data['email'] = $email;
$data['adSoyad'] = $adSoyad;
return view('pages.about')->withData($data);

}

public function getContact(){
    return view('pages.contact');
}

}

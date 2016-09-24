@extends('layout')

@section('content')
@section('title','| Homepage')
  <div class="row">
    <div class="col-md-12">
      <div class="jumbotron">
        <h1>Welcome to my First Blog</h1>
        <p class="lead">Thank you for visiting.This is my test blog site with laravel</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
      </div>
    </div>
  </div>     <!-- end of row -->
<div class="row">
  <div class="col-md-8">
    <!-- <div class="jumbotron"> -->
    @foreach($posts as $post)
    <div class="post">
      <h3>{{$post->title}}</h3>
      <p>{{substr($post->body,0,300)}}{{strlen($post->body)>300 ? "..." : ""}}</p>
       <a href="{{ url('blog/'.$post->slug)}}" class="btn btn-primary">Read More</a>
    </div>
    <hr>
    @endforeach
    </div>
<!-- </div> -->
  <div class="col-md-3 col-md-offset-1">
    <h3>Sidebar</h3>
  </div>
</div>

@endsection

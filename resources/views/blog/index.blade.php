@extends('layout')

@section('title','| Blog')

@section('content')

<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>Blog</h1>
  </div>
</div>
@foreach($posts as $post)
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <h1>{{$post->title}}</h1>
    <p>Published At: {{ date('M j,Y h:ia',strtotime($post->created_at)) }}</p>
    <p>{{ substr($post->body,0,250) }}{{ strlen($post->body)>250 ? '...' : ''}}</p>
    {!! Html::linkRoute('blog.single','Read More',array($post->slug),array('class'=>'btn btn-primary'))  !!}
      <hr>
  </div>
</div>

@endforeach
<div class="row">
  <div class="text-center">
    {{ $posts->links()}}
  </div>
</div>
@endsection

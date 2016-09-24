@extends('layout')

@section('title','| View Posts')
@section('stylesheets')

{!! Html::style('css/style.css') !!}


@section('content')

<div class="row">
  <div class="col-md-10">
      <h1>All posts</h1>
  </div>
<div class="col-md-2">

  <a href="{{ route('posts.create')  }}" class="btn btn-lg btn-primary btn-hr-margin">Create new post</a>
</div>
<div class="col-md-12">

  <hr>
</div>
<div class="col-md-12">

  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created at</th>

      </tr>

    </thead>
    <tbody>
      @foreach($posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>{{substr($post->body,0,50)}}{{strlen($post->body) > 50 ? "...":""}}</td>
        <td>{{date('M j,Y',strtotime($post->created_at))}}</td>
        <td>{!!Html::linkRoute('posts.show','View',array($post->id),array('class'=>'btn btn-info'))!!}&nbsp{!!Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-default'))  !!}</td>

        <!-- <a href="{{ route('posts.show',$post->id) }}" class="btn btn-info">view</a> -->
        <!-- <a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">edit</a> -->

      </tr>
      @endforeach
    </tbody>
  </table>
<div class="text-center">
  {{ $posts->links() }}
</div>

</div>
</div>


@endsection

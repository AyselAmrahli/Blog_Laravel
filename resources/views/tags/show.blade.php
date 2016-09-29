@extends('layout')

@section('title',"Laravel || $tag->name")

  @section('content')

   <div class="row">
     <div class="col-md-6">
       <h1>{{$tag->name}} Tag  <small>{{ $tag->posts()->count()}} Posts</small></h1>
     </div>
     <div class="col-md-6">
       <a href="{{route('tags.edit',$tag->id)}}" class="btn btn-primary" style="margin-top:20px">Edit</a>
     </div>
   </div>
<div class="row">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Tags</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @foreach($tag->posts as $post)
      <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td>@foreach($post->tags as $tag)

            <div class="label label-default" style="margin-left:4px;">
                {{$tag->name}}
            </div>


            @endforeach
        </td>
        <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-sm btn-default">View</a></td>
      </tr>
      @endforeach

    </tbody>
  </table>
</div>


@endsection

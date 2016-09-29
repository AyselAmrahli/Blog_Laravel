@extends('layout')

@section('title','| Blog Tags')

@section('stylesheets')
{{ Html::style('css/style.css')}}
@section('content')
<div class="row">
  <div class="col-md-6">
    <h1>Tags</h1>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Tags</th>
        </tr>
      </thead>
      <tbody>
        @foreach($tags as $tag)
        <tr>
          <th>{{$tag->id}}</th>
          <td><a href="{{ route('tags.show',$tag->id)}}">{{$tag->name}}</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-center">
      {{ $tags->links() }}
    </div>
  </div>


<div class="col-md-5 col-md-offset-1">
  <div class="well">
    <h2>New Tag</h2>
    {!! Form::open(['route'=>'tags.store','method'=>'POST'])  !!}
        {{ Form::label('name','Name')}}
        {{ Form::text('name',null,array('class'=>'form-control'))}}

        {{ Form::submit('Create',array('class'=>'btn btn-primary btn-hr-margin'))}}

    {!! Form::close() !!}
  </div>
</div>
</div>


@endsection

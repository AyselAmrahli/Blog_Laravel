@extends('layout')

@section('title','| Edit Tag')

@section('content')

<div class="row">
  <div class="col-md-6">
    {{ Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT'])}}

    {{ Form::label('name','Tag Name:')}}
    {{ Form::text('name',null,array('class'=>'form-control'))}}

    {{ Form::submit('Save Changes',array('class'=>'btn btn-success','style'=>'margin-top:15px'))}}
    {{ Form::close()}}
  </div>
</div>

@endsection

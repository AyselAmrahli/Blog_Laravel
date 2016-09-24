@extends('layout')


@section('title','| Login Page')
{!! Html::style('css/style.css')  !!}

@section('content')

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open()}}
      {{ Form::label('email','Email:')}}
      {{ Form::email('email',null,array('class'=>'form-control'))}}

      {{ Form::label('password','Password:',array('class'=>'label-margin'))}}
      {{ Form::password('password',array('class'=>'form-control'))}}

      {{ Form::checkbox('remember')}}{{Form::label('remember','Remember Me')}}
      <br>
      {{ Form::submit('Login',array('class'=>'btn btn-primary btn-block'))}}
      <a href="{{url('password/reset')}}">Forgot my Password</a>
    {{ Form::close()}}
  </div>
</div>

@endsection

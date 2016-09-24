@extends('layout')

@section('title','| Forgot my password')
@section('stylesheets')
{!! Html::style('css/style.css') !!}
@section('content')

<div class="row">
  <div class="col-md-6 col-md-offset-3">


  <div class="panel panel-default">
    <div class="panel-heading">Reset Password</div>
    <div class="panel-body">
      {{ Form::open(['url'=>'password/reset','method'=>'POST'])  }}

      {{ Form::hidden('token',$token)}}


      {{ Form::label('email','Email address:')}}
      {{ Form::email('email',$email,array('class'=>'form-control')) }}

      {{ Form::label('password','Password:')}}
      {{ Form::password('password',array('class'=>'form-control'))}}

      {{ Form::label('password_confirmation','Password Confirmation:')}}
      {{ Form::password('password_confirmation',array('class'=>'form-control'))}}

      {{ Form::submit('Reset Password',array('class'=>'btn btn-primary btn-hr-margin ')) }}
      {{ Form::close()}}
    </div>
  </div>
  </div>
</div>

@endsection

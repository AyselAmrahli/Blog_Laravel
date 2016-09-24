@extends('layout')


@section('title','| Register Page')
 {!! Html::style('css/style.css')  !!}
@section('content')

<div class="row">
  <div class="col-md-6 col-md-offset-3">
    {{ Form::open()}}

      {{ Form::label('name','Name:')}}
      {{ Form::text('name',null,array('class'=>'form-control'))}}

      {{ Form::label('email','Email:',array('class'=>'label-margin'))}}
      {{ Form::email('email',null,array('class'=>'form-control'))}}

      {{ Form::label('password','Password:',array('class'=>'label-margin'))}}
      {{ Form::password('password',array('class'=>'form-control'))}}

      {{ Form::label('password_confirmation','Confirm Password:',array('class'=>'label-margin'))}}
      {{ Form::password('password_confirmation',array('class'=>'form-control'))}}

      {{ Form::submit('Register',array('class'=>'btn btn-primary btn-block btn-hr-margin'))}}



    {{ Form::close()}}
  </div>
</div>

@endsection

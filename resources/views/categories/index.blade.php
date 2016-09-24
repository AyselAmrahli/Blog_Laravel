@extends('layout')

@section('title','| Blog Categories')

@section('stylesheets')
{{ Html::style('css/style.css')}}
@section('content')
<div class="row">
  <div class="col-md-6">
    <h1>Categories</h1>
    <table class="table">
      <thead>
        <tr>
          <th>#</th>
          <th>Categories</th>
        </tr>
      </thead>
      <tbody>
        @foreach($categories as $category)
        <tr>
          <th>{{$category->id}}</th>
          <td>{{$category->name}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <div class="text-center">
      {{ $categories->links() }}
    </div>
  </div>


<div class="col-md-5 col-md-offset-1">
  <div class="well">
    <h2>New Category</h2>
    {!! Form::open(['route'=>'categories.store','method'=>'POST'])  !!}
        {{ Form::label('name','Name')}}
        {{ Form::text('name',null,array('class'=>'form-control'))}}

        {{ Form::submit('Create',array('class'=>'btn btn-primary btn-hr-margin'))}}

    {!! Form::close() !!}
  </div>
</div>
</div>


@endsection

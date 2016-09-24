@extends ('layout')

@section('title','| View Posts')

@section('content')
<div class="row">
<div class="col-md-8">
 <h1>{{ $post->title }}</h1>
 <p class="lead">{{ $post->body }}</p>
        @foreach( $post->tags as $tag)
            <div class="label label-default">{{ $tag->name}}</div>
        @endforeach
</div>



<div class="col-md-4">
  <div class="well">
    <dl class="dl-horizontal">
      <label>Slug:</label>
      <p><a href="{{url('blog/'.$post->slug)}}">{{ url($post->slug ) }}</a></p>
    </dl>
    <dl class="dl-horizontal">
      <label>Category:</label>
      <p>{{$post->category->name}}</p>
    </dl>
    <dl class="dl-horizontal">
      <label>Created At:</label>
      <p>{{ date('M j,Y h:ia',strtotime($post->created_at))  }}</p>
    </dl>
    <dl class="dl-horizontal">
      <label>Last Updated:</label>
      <p>{{ date('M j,Y h:ia',strtotime($post->updated_at))   }}</p>
    </dl>
    <hr>
    <div class="row">
      <div class="col-md-6">
        {!! Html::linkRoute('posts.edit','Edit',array($post->id),array('class'=>'btn btn-primary btn-block')) !!}
      </div>
      <div class="col-md-6">
        {{ Form::open(array('route'=>['posts.destroy',$post->id],'method'=>'DELETE'))}}
        <!-- {!! Html::linkRoute('posts.destroy','Delete',array($post->id),array('class'=>'btn btn-danger btn-block')) !!} -->
        {{ Form::submit('Delete',array('class'=>'btn btn-danger btn-block'))}}
        {{ Form::close()}}
      </div>

    </div>
    <hr>
    <div class="row">
      <div class="col-md-12">
        <!-- <a href="{{ route('posts.index')}}" class="btn btn-default btn-block"><< See All the posts</a> -->
        {!! Html::linkRoute('posts.index','See All Posts',array(),array('class'=>'btn btn-default btn-block')) !!}
      </div>
    </div>
  </div>

</div>





</div>






@endsection

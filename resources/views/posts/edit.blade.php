@extends ('layout')

@section('title','| View Posts')
@section('stylesheets')
{{ Html::style('css/style.css')  }}
{{ Html::style('css/select2.min.css')  }}

@section('content')
<div class="row">

  {{ Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT'])  }}
<div class="col-md-8">
{{ Form::label('title','Title:')}}
{{ Form::text('title',null,array('class'=>'form-control input-lg'))}}

{{ Form::label('slug','Slug:',array('class'=>'label-margin'))}}
{{ Form::text('slug',null,array('class'=>'form-control'))}}

{{ Form::label('category_id','Category:',array('class'=>'label-margin'))}}
{{ Form::select('category_id',$categories,null,array('class'=>'form-control'))}}

{{ Form::label('tags[]','Tags:')}}
{{ Form::select('tags[]',$tags,null,array('class'=>'form-control select2-multi','multiple'=>'multiple'))}}

{{ Form::label('body','Body:',array('class'=>'label-margin'))}}
{{ Form::textarea('body',null,array('class'=>'form-control'))}}
</div>

<div class="col-md-4">
  <div class="well">
    <dl class="dl-horizontal">
      <dt>Created At:</dt>
      <dd>{{ date('M j,Y h:ia',strtotime($post->created_at))  }}</dd>
    </dl>
    <dl class="dl-horizontal">
      <dt>Last Updated:</dt>
      <dd>{{ date('M j,Y h:ia',strtotime($post->updated_at))   }}</dd>
    </dl>
    <hr>
    <div class="row">
      <div class="col-md-6">
        {!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
      </div>
      <div class="col-md-6">
        {{ Form::submit('Save changes',array('class'=>'btn btn-success btn-block'))}}

      </div>
    </div>
  </div>

</div>




{{  Form::close() }}
</div>

@section('scripts')
{!! Html::script('js/select2.min.js')   !!}
<script type="text/javascript">
  $('.select2-multi').select2();
  $('.select2-multi').select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger('change');
</script>
@endsection
@endsection

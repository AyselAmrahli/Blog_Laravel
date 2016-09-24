<!-- Checking Session success  -->
@if(Session::has('success'))

<div class="row">
  <div class="alert alert-success" role="alert">

    <strong>Success:</strong> {{ Session::get('success') }}

  </div>
</div>


@endif


<!-- Errors -->
@if(count($errors) > 0)

<div class="row">
  <div class="alert alert-danger" role="alert">
   <strong>Errors:</strong>

    @foreach($errors->all() as $error)

     {{ $error }}

    @endforeach
  </div>
</div>

@endif

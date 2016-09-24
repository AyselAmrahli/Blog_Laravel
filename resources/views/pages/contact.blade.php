@extends('layout')
@section('content')

@section('title','| Contactpage')
  <div class="row">
    <div class="col-md-12">
      <h1>Contact me</h1>
      <hr>
        <form>
          <div class="form-group">
            <label for="">Email:</label>
            <input id="email" name="email" placeholder="enter your email" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Subject:</label>
            <input id="subject" name="subject" placeholder="enter your subject" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Message:</label>
            <textarea id="message" name="message" class="form-control" placeholder="type your message here..."></textarea>
          </div>
          <input type="submit" name="submit" value="Send message" class="btn btn-success">
        </form>
    </div>
  </div>
@endsection

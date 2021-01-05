@extends('layout/navbar')


@section('title')
Vote to Event
@endsection
@section('content')
<div style="margin-left:15%">
  <div class="w3-container">
<div class="container">    
      <div class="container">
  <h2>Vote Form</h2>
  <b>Event Name</b>
  <div> {{$eventName}}</div>
  
  <b>Description</b>
  <div> {{$description}}</div>
  
  <b>Picture</b>
  <div> {{$eventPicture}}</div>
  <br>

    <form method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="radio">
        <label for="vote">
          <b>Vote:</b>
          <input type="radio" id="vote" name="val" value='1' checked> <a href="#" class="far fa-thumbs-up"></a>

          <input type="radio" id="vote" name="val" value='2' checked> <a href="#" class="far fa-thumbs-down"></a>
        </label>
      </div>
      
      <hr>
      <hr>
      <input type="submit" class="btn btn-primary" name="submit" value="Vote">
          <a href="{{route('user.viewEvents')}}" class="btn btn-dark">Back</a>
  </form>
</div>
</div>
</div>
</div>
@endsection

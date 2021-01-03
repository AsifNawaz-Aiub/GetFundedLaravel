@extends('layout/navbar')


@section('title')
Comment to Event
@endsection
@section('content')
<div style="margin-left:15%">
	<div class="w3-container">
<div class="container">    
      <div class="container">
	  <h2>Comment Form</h2>
  <b>Event Name</b>
  <div> {{$eventName}}</div>
  
  <b>Description</b>
  <div> {{$description}}</div>
  
  <b>Picture</b>
  <div> {{$eventPicture}}</div>
  <br>
	  <form method="post">
	    <div class="form-group">
	      <label for="Comment">Comment:</label>
	      <input type="text" class="form-control" id="donate" placeholder="comment..." name="comment">
	    </div>
	    <input type="submit" class="btn btn-primary" name="submit" value="Comment">
          <a href="{{route('user.viewEvents')}}" class="btn btn-dark">Back</a>
	  </form>
      </div>
	</div>
</div>

</div>
@endsection

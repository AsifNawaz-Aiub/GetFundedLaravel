@extends('layout/navbar')


@section('title')
Report to Event
@endsection
@section('content')
<div style="margin-left:15%">
	<div class="w3-container">
<div class="container">    
      <div class="container">
	  <h2>Report Form</h2>
	  <b>Event Name</b>
  <div> {{$eventName}}</div>
  
  <b>Description</b>
  <div> {{$description}}</div>
  
  <b>Picture</b>
  <div> {{$eventPicture}}</div>
  <br>
	  <form method="post">
	  	<input type="hidden" name="_token" value="{{csrf_token()}}">
	    <div class="form-group">
	      <label for="report">Report:</label>
	      <input type="text" class="form-control" id="message" placeholder="Report..." name="message">
	    </div>
	    <input type="submit" class="btn btn-primary" name="submit" value="Report">
          <a href="{{route('user.viewEvents')}}" class="btn btn-dark">Back</a>
	  </form>
      </div>
	</div>
</div>
</div>
@endsection

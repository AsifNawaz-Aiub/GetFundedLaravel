@extends('layout/navbar')


@section('title')
Create Event
@endsection



@section('content')
        <div style="margin-left:15%">
		<form method="post" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{csrf_token()}}">
			<div class="w3-container">
    
      <div class="container">
	  <h2>Create Event Form</h2>
	  <form method="post">
	    <div class="form-group">
	      <label for="eventName">EventName:</label>
	      <input type="text" class="form-control" id="eventName" placeholder="eventName..." name="eventName" value="{{old('eventName')}}">
	    </div>
	    <div class="form-group">
	      <label for="eventName">Description:</label>
	      <input type="text" class="form-control" id="description" placeholder="description..." name="description" value="{{old('description')}}">
	    </div>
	    <div class="form-group">
	      <label for="eventName">CategoryId:</label><br>
			<input type="radio" name="categoryId" value="0"> Study 
			<input type="radio" name="categoryId" value="1"> Health
			<input type="radio" name="categoryId" value="2"> Social
	    </div>
	    <div class="form-group">
	      <label for="eventName">GoalAmount:</label>
	      <input type="text" class="form-control" id="goalAmount" placeholder="goalAmount..." name="goalAmount" value="{{old('goalAmount')}}">
	    </div>
	    <div class="form-group">
	      <label for="eventName">GoalDate:</label>
	      <input type="date" class="form-control" id="goalDate" placeholder="goalDate..." name="goalDate" value="{{old('goalDate')}}">
	    </div>
	    <div class="form-group">
	      <label for="Picture">Picture:</label>
	      <input type="file" class="picture" id="eventPicture"  name="eventPicture">
        </div>
        <input type="submit" name="submit" class="btn btn-dark" value="Confirm">

	  </form>
      </div>
	</div>
</div>

		@foreach($errors->all() as $err)
			{{$err}} <br>
		@endforeach

@endsection


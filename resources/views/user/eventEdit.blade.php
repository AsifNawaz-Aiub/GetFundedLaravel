@extends('layout/navbar')


@section('title')
Event Edit
@endsection
@section('content')
<div style="margin-left:15%">
  <div class="container">
  <h2>Edit Event Form</h2>
  <form method="post" >

      <input type="hidden" name="_token" value="{{csrf_token()}}">

      <div class="form-group">
    <label for="exampleInputEmail1">Event Name:</label>
    <input type="text" name="eventName" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$eventName}}" placeholder="enter event name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" name="description" value="{{$description}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="enter description">
  </div>
   <div class="form-group">
        <label for="eventName">CategoryId:</label><br>
      <input type="radio" name="categoryId" value="0"> Study 
      <input type="radio" name="categoryId" value="1"> Health
      <input type="radio" name="categoryId" value="2"> Social
  </div>
  
  <div class="form-group">
    <label for="exampleInputEmail1">Goal Amount</label>
    <input type="text"  name="goalAmount" class="form-control" value="{{$goalAmount}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter goal amount">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Goal Date</label>
    <input type="date" name="goalDate" value="{{$goalDate}}" class="form-control" id="exampleInputPassword1" >
  </div>
  

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('user.myEvent')}}" class="btn btn-dark">Back</a>
    
    </form>
</div>

</div>
@endsection

<form>
  
</form>



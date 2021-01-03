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
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$eventName}}" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Description</label>
    <input type="text" value="{{$description}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Category Id</label>
    <input type="text" value="{{$categoryId}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Goal Amount</label>
    <input type="text" class="form-control" value="{{$goalAmount}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Goal Date</label>
    <input type="text" value="{{$goalDate}}" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Event Picture</label>
    <input type="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <a href="{{route('user.myEvent')}}" class="btn btn-dark">Back</a>
    
    </form>
</div>

</div>
@endsection

<form>
  
</form>



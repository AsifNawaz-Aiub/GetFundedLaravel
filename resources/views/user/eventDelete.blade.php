@extends('layout/navbar')


@section('title')
Event Delete
@endsection
@section('content')
<div style="margin-left:15%">
  <div class="w3-container w3-light-grey">
<nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="/user/viewEvents">Events</a>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    </form>
  </nav>  
</div>



<div class="w3-container">
<div class="container"> 
<form method="post">
  <table class="table table-hover">
        <tr>
          <td>Event Name :</td>
          <td>{{$eventName}}</td>
        </tr>
         <tr>
          <td>Description :</td>
          <td>{{$description}}</td>
        </tr>
         <tr>
          <td>Category Id :</td>
          <td>{{$categoryId}}</td>
        </tr>
         <tr>
          <td>Goal Amount :</td>
          <td>{{$goalAmount}}</td>
        </tr>
         <tr>
          <td>Goal Date :</td>
          <td>{{$goalDate}}</td>
        </tr>
         <tr>
          <td>Picture :</td>
          <td><img src="{{$eventPicture}}" height="128px"></td>
        </tr>
      </table>
      <div>
        <h3>Are you sure?</h3>
       <button type="submit" class="btn btn-primary">Confirm</button>
       <a href="{{route('user.myEvent')}}" class="btn btn-dark">Back</a>
      </div>
</form>   
    
  </div>
</div>

</div>
@endsection

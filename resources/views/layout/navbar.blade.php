@extends('layout/main')



@section('navbar')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<style type="text/css">
	*{
		font-size: 20px;
		font-family: "Times New Roman", Times, serif; 
	}
</style>

<div class="w3-sidebar w3-dark-grey w3-bar-block" style="width:15%">
  <h3 class="w3-bar-item">User</h3>
  <a href="{{route('user.index')}}" class="w3-bar-item w3-button">Home</a>
  <a href="{{route('user.viewEvents')}}" class="w3-bar-item w3-button">View Events</a>
  <a href="{{route('user.createEvent')}}" class="w3-bar-item w3-button">Create Event</a>
  <a href="{{route('user.myEvent')}}" class="w3-bar-item w3-button">My Event</a>
  <a href="{{route('user.eventManager')}}" class="w3-bar-item w3-button">Event Manager</a>
  <a href="{{route('user.message')}}" class="w3-bar-item w3-button">Message</a>
  <a href="/logout" class="w3-bar-item w3-button">logout</a>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 
@endsection
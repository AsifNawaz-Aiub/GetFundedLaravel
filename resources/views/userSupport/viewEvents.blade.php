<!DOCTYPE html>
<html>
<title>View Events</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/css/userSupport.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<section>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Get Funded</a>
  <form class="form-inline" >
    <input class="form-control mr-sm-2" name="search" placeholder="Search" id="eventName">
  </form>
</nav>
</section>
<section>
<div class="sidebar">
  <a href="{{route('userSupport.index')}}" class="w3-bar-item w3-button">Home</a>
  <a href="{{route('userSupport.allUser')}}" class="w3-bar-item w3-button">Users</a>
  <a style="background-color: lightgray" href="{{route('userSupport.viewEvents')}}" class="w3-bar-item w3-button">Events</a>
  <a href="{{route('userSupport.message')}}" class="w3-bar-item w3-button">Message</a>
  <a href="{{route('userSupport.myProfile')}}" class="w3-bar-item w3-button">My Profile</a>
  <a href="/logout" class="w3-bar-item w3-button">logout</a>
</div>
<div  class="w3-container">
	
</div>
<div style="margin-left:15%; margin-top: 2%; ">
  <div class="w3-container">
  	<input class="btn-sm btn-dark btn-block" type="button" name="click" id="AppEvents" value="See All Approved Events">
	    <div class="container" id="allEvents">
      <br>
      <br>    
			<table class="table table-hover" id="events">
			</table>
		</div>

	</div>
</div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


<script>
$( document ).ready(function() {
  
  // GET REQUEST
  $("#AppEvents").click(function(event){
        event.preventDefault();
        console.log("Clicked");
    ajaxGet();
  });
  
  // DO GET
  function ajaxGet(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type     : "GET",
      url      : "/userSupport/view",
      data     : {_token: CSRF_TOKEN},
      datatype : 'json',
            
      success: function(result){
        $('#allEvents table').empty();
        $.each(JSON.parse(result), function(i, result){
          $('#allEvents #events').append(
          "<tr>"+
          "<td rowspan='4' height='150px'><img height='150' src='/img/"+result.eventPicture+"'></td>"+
          "<td colspan='3'>" + result.description + "</td>" +
          "</tr>"+
          "<tr>"+
          "<td>ID:" + result.id + "</td>"+
          "<td>Creator Id:" + result.creatorId + "</td>" +
          "<td>Name:" + result.eventName + "</td>" +
          "</tr>"+
          "<tr>"+
          "<td>Category Id:" + result.categoryId + "</td>" +
          "<td>Goal Amount:" + result.goalAmount + "</td>" +
          "<td>Goal Date:" + result.goalDate + "</td>" +
          "</tr>"+
          "<tr>"+
          "<td colspan='2'>" + result.createdAt + "</td>"+
          "<td align='right'>"+
          "<a class='btn btn-dark' href='/userSupport/eventDonation/"+result.id+"'>Donation</a>"+
          "</td>"+
          "</tr>"
          )
        });
        console.log("Success: ", result);
      },
      error : function(e) {
        $("#getfeed").html("<strong>Error</strong>");
        console.log("ERROR: ", e);
      }
    }); 
  }
})
</script>
</html>

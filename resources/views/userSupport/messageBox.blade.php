<!DOCTYPE html>
<html>

<head>
  <title>Message Box</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/css/userSupport.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<section>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Get Funded</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
  </form>
</nav>
</section>
<section>
<div class="sidebar">
  <a href="{{route('userSupport.userSupport')}}" class="w3-bar-item w3-button">Home</a>
  <a href="{{route('userSupport.allUser')}}" class="w3-bar-item w3-button">Users</a>
  <a href="{{route('userSupport.viewEvents')}}" class="w3-bar-item w3-button">Events</a>
  <a style="background-color: lightgray" href="{{route('userSupport.message')}}" class="w3-bar-item w3-button">Message</a>
  <a href="{{route('userSupport.myProfile')}}" class="w3-bar-item w3-button">My Profile</a>
  <a style="color: red" href="/logout" class="w3-bar-item w3-button">logout</a>
</div>

<div style="margin-left:15%">
  <div class="w3-container">
    <div class="container">
      
      <input class="btn-sm btn-dark btn-block" type="button" name="click" id="AppEvents" value="Open Chat...">
      <div class="container" id="allEvents">
      <br>
      <br>    
      <table class="table table-hover" id="events">
       
      </table>

    </div>
    <form method="post"> 
      <input type="hidden" id="userId" name="userId" value="{{$userId}}" >
      <input class="form-control" type="text" name="messageText">
      <input class="btn btn-info" type="submit" name="submit" value="Send...">
      </form>
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
        var userId = $("#userId").val();
    ajaxGet(userId);
  });
  
  
  // DO GET
  function ajaxGet(userId){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      type     : "GET",
      url      : "/userSupport/messageView/"+userId,
      data     : {_token: CSRF_TOKEN},
      datatype : 'json',
            
      success: function(result){
        $('#allEvents table').empty();
        $.each(JSON.parse(result), function(i, result){
          $('#allEvents #events').append(
          
          "<tr>"+
          "<td>" +result.createdAt+" </td>"+
          "<td>" + result.senderId + "</td>" +
          "<td>" + result.messageText + "</td>" +
          "<td>" +
            "<a class='btn btn-danger' href='/userSupport/deleteMessage/" +result.id+ "'>Delete</a>"+
            "<a class='btn btn-info' href='/userSupport/pinMessage/" +result.id+ "'>Pin</a>"+ 
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




@extends('layout/navbar')


@section('title')
Message to User-support
@endsection
@section('content')
<div style="margin-left:15%">

<div class="w3-container">
    <div class="container">
      <form method="post"> 
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <div class="container" id="allEvents">
      <br>
      <br>    
      <table class="table table-hover">
        <tr>
          <th>Created At</th>
          <th>Sender Id</th>
          <th>Message Text</th>
        </tr>
        <tr>
        	<td colspan="3"><input class="btn-sm btn-dark " type="button" name="click" id="AppEvents" value="Open Chat..."></td>
        </tr>
        <tbody id="events">
          
        </tbody>
        <tr>
          <td colspan="2"><input class="form-control" type="text" name="messageToUs"></td>
          <td><input class="btn btn-info" type="submit" name="submit" value="Send messages...">
            <a href="{{route('user.message')}}" class="btn btn-dark">Back</a>
          </td>

        </tr>
      </table>
      </form>
    </div>
  </div>
</div>


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
      url      : "/user/viewMessage/:id",
      data     : {_token: CSRF_TOKEN},
      datatype : 'json',
            
      success: function(result){
        $('#allEvents table').empty();
        $.each(JSON.parse(result), function(i, result){
          $('#allEvents #events').append(
          "<tr>"+
          "<td>"+result.createdAt+"'></td>"+
          "<td>" + result.senderId + "</td>" +
          "<td>" + result.messageText + "</td>" +
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

@endsection

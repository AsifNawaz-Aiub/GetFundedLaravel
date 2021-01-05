@extends('layout/navbar')


@section('title')
Message 
@endsection
@section('content')
<div style="margin-left:15%">
<form method="post">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="w3-container w3-light-grey">
<nav class="navbar navbar-light bg-light justify-content-between">
	  <a class="navbar-brand" href="/user/viewEvents">Message</a>
	 
	</nav>  
</div>


<div class="w3-container" align="center">
	<input class="btn btn-success" type="button" name="click" id="load" value="Chat with UserSupport">
    <div class="container" id="allEvents">    
	  <table class="table table-hover" id="events" >

	  </table>
	  </form>
	  </div>
</div>
</div>
	





<script type="text/javascript">
$( document ).ready(function() {
	
	// GET REQUEST
	$("#load").click(function(event){
        event.preventDefault();
		ajaxGet();
	});
	
	// DO GET
	function ajaxGet(){
	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
			type     : "GET",
            url      : "/user/view",
            data     : {_token: CSRF_TOKEN},
            datatype : 'json',
            
			success: function(result){
				$('#allEvents table').empty();
				$.each(JSON.parse(result), function(i, result){
					$('#allEvents #events').append(

				      "<tr>"+
			          "<td rowspan='3' height='150px' width='150px'><img height='150px' src='/img/"+result.image+"'></td>"+
			          "<td colspan='2'>" + result.email + "</td>" +
			          "</tr>"+
			          "<tr>"+
			          "<td>ID:" + result.id + "</td>"+
			          "<td>Name:" + result.name + "</td>" +
			          "</tr>"+
			          "<tr>"+
			          "<td align='right' colspan='2'>"+
			          "<a class='btn btn-success' href='/messageToUserSupport/"+result.id+"')}}'>Chat</a>"+
			          "</td>"+
			          "</tr>"

                )
				});
				console.log("Success: ", result);
			},
			error : function(e) {
				$("#load").html("<strong>Error</strong>");
				console.log("ERROR: ", e);
			}
		});	
	}
})
</script>


@endsection

@extends('layout/navbar')


@section('title')
My Events
@endsection
@section('content')
<div style="margin-left:15%">
<div class="w3-container w3-light-grey">
<nav class="navbar navbar-light bg-light justify-content-between">
	  <a class="navbar-brand" href="/user/viewEvents">My Events</a>
	  <form class="form-inline">
	    <input class="form-control mr-sm-2" id="search" type="search" placeholder="Search" aria-label="Search">
	  </form>
	</nav>  
</div>



<div class="w3-container">
<div class="container">
<form method="post">   
	  <table  class="table table-hover">
		<tr>
			<th>Id</th>
	        <th>Event Name</th>
	        <th>Event Picture</th>
	        <th>Description</th>
	        <th>Goal Amount</th>
	        <th>Goal Date</th>
	        <th>Action</th>
		</tr>

		@for($i=0; $i < count($events); $i++)

			<tr>
				<td>{{$events[$i]['id']}}</td>
				<td>{{$events[$i]['eventName']}}</td>
				<td>{{$events[$i]['eventPicture']}}</td>
				<td>{{$events[$i]['description']}}</td>
				<td>{{$events[$i]['goalAmount']}}</td>
				<td>{{$events[$i]['goalDate']}}</td>
				<td width="200px">
				  	<a class="btn btn-primary" href="{{route('user.eventEdit', $events[$i]['id'])}}">Edit</a> 
			  		<a class="btn btn-dark" href="{{route('user.eventDelete', $events[$i]['id'])}}">Delete</a>  
			  		<a class="btn btn-info" href="{{route('user.eventDonate', $events[$i]['id'])}}">Donation</a>
			  		<a class="btn btn-danger" href="{{route('user.approveDonation', $events[$i]['id'])}}">Approve</a>  
			    </td>
					
			</tr>

		@endfor


	</table>
	  </form> 
	</div>
</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
       $('#search').keyup(function(){
            search_table($(this).val());
       });
       function search_table(value){
            $('#events #rows').each(function(){
                 var found = 'false'; 

                 $(this).each(function(){
                      if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                      {
                           found = 'true';
                      }
                 });
                 if(found == 'true')
                 {
                      $(this).show();
                 }
                 else
                 {
                      $(this).hide();
                 }
            });
       }
  });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection


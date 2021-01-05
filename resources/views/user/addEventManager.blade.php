@extends('layout/navbar')


@section('title')
Add Event Manager
@endsection
@section('content')
<div style="margin-left:15%">
	<div class="w3-container w3-light-grey">
<nav class="navbar navbar-light bg-light justify-content-between">
	  <a class="navbar-brand" href="/user/viewEvents">Events</a>
	  <form class="form-inline">
	    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
	  </form>
	</nav>  
</div>



<div class="w3-container">
<div class="container">    
	  <form method="post">
	  	<input type="hidden" name="_token" value="{{csrf_token()}}">
	  	<table class="table table-hover" id="events">
	  	
	      <tr>
	        <th>Id</th>
	        <th>Name</th>
	        <th>Picture</th>
	        <th>User Name</th>
	        <th>Email</th>
	        <th>User Type</th>
	      </tr>


		@for($i=0; $i < count($user); $i++)

			<tr id="rows">
				<td>{{$user[$i]['id']}}</td>
				<td>{{$user[$i]['name']}}</td>
				<td height="128px" width="200px"><img width="200px" height="128px" src="/img/{{$user[$i]['image']}}"></td>
				<td>{{$user[$i]['userName']}}</td>
				<td>{{$user[$i]['email']}}</td>
				<td>{{$user[$i]['userType']}}</td>
				
			</tr>

		@endfor
		<tr>
			<td>
				<a href="{{route('user.myEvent')}}" class="btn btn-dark">Back</a>
			</td>
			<td></td>
			<td></td>
			<td></td>
			<td><input class="form-control" type="text" name="userId" placeholder="Enter a user id..."></td>
			<td>
				<input class="btn btn-success" type="submit" name="submit" value="Add">
			</td>
		</tr>

	  </table>
	  </form>
	</div>
	<a id="dlink"  style="display:none;"></a>
	<input class="btn btn-success" type="button" onclick="tableToExcel('events', 'users', 'allViewEvent.xls')" value="Excel">
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
@endsection

@extends('layout/navbar')


@section('title')
Approve Donation
@endsection
@section('content')
<div style="margin-left:15%">
<div class="w3-container">
<div class="container">    
	  <form method="post">
	  	<input type="hidden" name="_token" value="{{csrf_token()}}">
	  <table  class="table table-hover">
		<tr>
			<th>Id</th>
	      	<th>Amount</th>
	        <th>Donor Id</th>
	        <th>Donation Message</th>
	        <th>Created At</th>
	        <th>Action</th>
		</tr>

		@for($i=0; $i < count($approval); $i++)

			<tr>
				<td>{{$approval[$i]['id']}}</td>
				<td>{{$approval[$i]['amount']}}</td>
				<td>{{$approval[$i]['donorId']}}</td>
				<td>{{$approval[$i]['donationMessage']}}</td>
				<td>{{$approval[$i]['createdAt']}}</td>
				<td>
				  <a class="btn btn-success" href="{{route('user.acceptpage', $approval[$i]['id'])}}">Accept</a>
			    </td>
					
			</tr>

		@endfor


	</table>
	    <a href="{{route('user.eventManager')}}" class="btn btn-dark">Back</a>
	  </form>
	</div>
</div>

</div>


@endsection

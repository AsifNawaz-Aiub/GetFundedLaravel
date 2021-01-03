@extends('layout/navbar')

@section('title')
Donate To Event
@endsection
@section('content')
<div style="margin-left:15%">
	<div class="w3-container">
<div class="container">    
	  <form method="post">
	  <table class="table table-hover">
	    <tr>
	      <th>Id</th>
	      <th>Amount</th>
	      <th>Donor Id</th>
	      <th>Event Id</th>
	      <th>Donation Message</th>
	      <th>Created At</th>
	    </tr>

		@for($i=0; $i < count($donateEvent); $i++) 
			<tr>
				<td>{{$donateEvent[$i]['id']}}</td>
				<td>{{$donateEvent[$i]['amount']}}</td>
				<td>{{$donateEvent[$i]['donorId']}}</td>
				<td>{{$donateEvent[$i]['eventId']}}</td>
				<td>{{$donateEvent[$i]['donationMessage']}}</td>
				<td>{{$donateEvent[$i]['createdAt']}}</td>					
			</tr>

		@endfor

			
	  	<tr>
	  		<td colspan="2">
	  			<input class="form-control mr-sm-2" name="amount" type="text" placeholder="Amount..." aria-label="Search">
	  		</td>
	  		<td colspan="2">
	  			<input class="form-control mr-sm-2" name="donationMessage" type="text" placeholder="Message..." aria-label="Search">
	  		</td>
	  		<td>
	  			<input type="submit" class="btn btn-primary" name="submit" value="Confirm">
	  			<a href="{{route('user.viewEvents')}}" class="btn btn-dark">Back</a>

	  		</td>
	  	</tr>
	  	
	  </table>
	  </form>
	</div>
</div>

</div>
@endsection

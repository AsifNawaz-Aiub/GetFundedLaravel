@extends('layout/navbar')


@section('title')
Event Donate
@endsection
@section('content')
<div style="margin-left:15%">
	<div class="w3-container">
<div class="container">    
	  <form method="post">
	  	<input type="hidden" name="_token" value="{{csrf_token()}}">
	  <table class="table table-hover">
	    <tr>
	      <th>Id</th>
	      <th>Amount</th>
	      <th>Donor Id</th>
	      <th>Donation Message</th>
	      <th>Created At</th>
	    </tr>

		@for($i=0; $i < count($eventDonate); $i++)

			<tr>
				<td>{{$eventDonate[$i]['id']}}</td>
				<td>{{$eventDonate[$i]['amount']}}</td>
				<td>{{$eventDonate[$i]['donorId']}}</td>
				<td>{{$eventDonate[$i]['donationMessage']}}</td>
				<td>{{$eventDonate[$i]['createdAt']}}</td>					
			</tr>

		@endfor

	  </table>
	   <a href="{{route('user.myEvent')}}" class="btn btn-dark">Back</a>
	  </form>
	</div>
</div>

</div>

@endsection

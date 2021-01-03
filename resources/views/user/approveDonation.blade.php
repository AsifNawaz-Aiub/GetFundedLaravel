@extends('layout/navbar')


@section('title')
Approve Donation
@endsection
@section('content')
<div style="margin-left:15%">
<div class="w3-container">
<div class="container">    
	  <form method="post">
	  <table  class="table table-hover">
		<tr>
			<th>Id</th>
	      	<th>Amount</th>
	        <th>Donor Id</th>
	        <th>Donation Message</th>
	        <th>Created At</th>
	        <th>Action</th>
		</tr>

		@for($i=0; $i < count($donation); $i++)

			<tr>
				<td>{{$donation[$i]['id']}}</td>
				<td>{{$donation[$i]['amount']}}</td>
				<td>{{$donation[$i]['donorId']}}</td>
				<td>{{$donation[$i]['donationMessage']}}</td>
				<td>{{$donation[$i]['createdAt']}}</td>
				<td>
				  <input class="btn btn-success" type="submit" name="submit" value="Approve">
			    </td>
					
			</tr>

		@endfor


	</table>
	    <a href="{{route('user.myEvent')}}" class="btn btn-dark">Back</a>
	  </form>
	</div>
</div>

</div>


@endsection

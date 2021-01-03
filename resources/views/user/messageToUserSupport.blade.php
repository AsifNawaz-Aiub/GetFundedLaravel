@extends('layout/navbar')


@section('title')
Message to User-support
@endsection
@section('content')
<div style="margin-left:15%">
	<div class="w3-container">
<div class="container">    
	  <form method="post">
	  <table class="table table-hover">
	  	 <tr>
	      <th>Sender Id</th>
	      <th>Message</th>
	      <th>Created At</th>

	  </tr>

		<% for(var i=0; i< msgToUserlist.length; i++ ){ 
		 %>
		<tr>
			<td><%= msgToUserlist[i].senderId %></td>
			<td><%= msgToUserlist[i].messageText %></td>
			<td width="350px" height="50px"><%= msgToUserlist[i].createdAt%></td>
		</tr>
		<% } %>
	  	<tr>
	  		<td colspan="3">
	  			<input class="form-control mr-sm-2" name="messageToUs" type="text" placeholder="Message..." aria-label="Search">
	  		</td>
	  		<td>
	  			<input type="submit" class="btn btn-primary" name="submit" value="Send">
	  		    <a href="/user/message" class="btn btn-success">Back</a>

	  		</td>
	  	</tr>
	  	
	  </table>
	  </form>
	</div>
</div>

</div>

@endsection

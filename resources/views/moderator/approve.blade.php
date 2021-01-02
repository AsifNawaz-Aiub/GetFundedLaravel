<!DOCTYPE html>
<html>
<head>
	<title>Approve Event</title>
	
	<style>
		fieldset {
		  background-color: #eeeeee;
		}
		
		legend {
		  background-color: gray;
		  color: white;
		  padding: 5px 10px;
		}
		
		input {
		  margin: 5px;
		}
		</style>
</head>
<body>

	<h2 style="text-align: center; background-color: #4caf50">Approve Event</h2>
	<form method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
		<fieldset>
			<legend>Approve User</legend>
			<table>
				<tr>
					<td>Event Name:</td>
					<td>{{$eventName}} </td>
				</tr>
				<tr>
					<td>Creator Id :</td>
					<td>{{$creatorId}} </td>
				</tr>
				<tr>
					<td>Description :</td>
					<td>{{$description}}</td>
                </tr>
                <tr>
					<td>Category Id :</td>
					<td>{{$categoryId}} </td>
				</tr>
				<tr>
					<td>Goal Amount :</td>
					<td>{{$goalAmount}} </td>
				</tr>
				<tr>
					<td>Goal Date :</td>
					<td>{{$goalAmount}}</td>
                </tr>

                <tr>
					<td>Status :</td>
					<td>{{$isApproved}}</td>
				</tr>
				<tr>
					<td>Created At :</td>
					<td> {{$createdAt}} </td>
                </tr>
                <tr>
					<td>Updated At :</td>
					<td> {{$updatedAt}} </td>
                </tr>
				
			</table>
			<div>
				<h3>Are you sure?</h3>
				<input type="submit" name="submit" value="Confirm" style="  border: 2px solid green; border-radius: 4px;">
			</div>
		</fieldset>
	</form>
</body>
</html>
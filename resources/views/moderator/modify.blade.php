<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
</head>
<body>

<div class="container">
  <h2 style="text-align: center; background-color: #4caf50; padding-top: 10px; padding-bottom: 10px;">Modify Event Form</h2>
  <form method="POST">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
      <label for="eventName">Event Name :</label>
      <input type="text" class="form-control" id="eventName" name="eventName" value="{{$eventName}}">
    </div>
    <div class="form-group">
      <label for="description">Description :</label>
      <input type="text" class="form-control" id="description"  name="description" value="{{$description}}">
    </div>
    <div class="form-group">
      <label for="categoryId">Category Id :</label>
      <input type="text" class="form-control" id="categoryId"  name="categoryId" value="{{$categoryId}} ">
    </div>
    <div class="form-group">
      <label for="goalAmount">Goal Amount :</label>
      <input type="text" class="form-control" id="goalAmount"  name="goalAmount" value="{{$goalAmount}} ">
    </div>
   
    <button type="submit" name="modify" class="btn btn-primary">Modify</button>
  </form>
@foreach($errors->all() as $err)
{{$err}} <br>
@endforeach
</div>

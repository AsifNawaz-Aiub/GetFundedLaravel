<!DOCTYPE html>
<html>
<title>Edit Profile</title>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/css/userSupport.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

#dd {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="card">
  <img src="/abc/img/{{$image}}" id="img" style="width:100%">
  <br>
  <p class="title">Name</p>
  <input class="form-control" type="text" name="name" placeholder="name" value="{{$name}}">
  <br>
  <p class="title">User Name</p>
  <input class="form-control" type="text" name="userName" placeholder="userName" value="{{$userName}}">
  <br>
  <p class="title">Email</p>
  <input class="form-control" type="email" name="email" placeholder="email" value="{{$email}}">
  <br>
  <p class="title">Password</p>
  <input class="form-control" type="password" name="password" placeholder="password" value="{{$password}}">
  <br class="title">
  <p class="title">Image</p>
  <input class="form-control" type="file" name="image" id="file" onchange="ShowImg()">

  <div style="margin: 24px 0;">
    
  </div>
  <p><input type="submit" name="submit" value="Done" id="dd" ></p>
  <a id="dd" href="{{route('userSupport.myProfile')}}">Back</a>
</div>
</form>
<script type="text/javascript">
  function ShowImg(){
  var file = document.getElementById('file'); 
  document.getElementById('img').src = window.URL.createObjectURL(file.files[0]);
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
=======
<!DOCTYPE html>
<html>
<title>Edit Profile</title>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/abc/css/userSupport.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 400px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

#dd {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<input type="hidden" name="_token" value="{{csrf_token()}}">
<div class="card">
  <img src="/abc/img/{{$image}}" id="img" style="width:100%">
  <br>
  <p class="title">Name</p>
  <input class="form-control" type="text" name="name" placeholder="name" value="{{$name}}">
  <br>
  <p class="title">User Name</p>
  <input class="form-control" type="text" name="userName" placeholder="userName" value="{{$userName}}">
  <br>
  <p class="title">Email</p>
  <input class="form-control" type="email" name="email" placeholder="email" value="{{$email}}">
  <br>
  <p class="title">Password</p>
  <input class="form-control" type="password" name="password" placeholder="password" value="{{$password}}">
  <br class="title">
  <p class="title">Image</p>
  <input class="form-control" type="file" name="image" id="file" onchange="ShowImg()">

  <div style="margin: 24px 0;">
    
  </div>
  <p><input type="submit" name="submit" value="Done" id="dd" ></p>
  <a id="dd" href="{{route('userSupport.myProfile')}}">Back</a>
</div>
</form>
<script type="text/javascript">
  function ShowImg(){
  var file = document.getElementById('file'); 
  document.getElementById('img').src = window.URL.createObjectURL(file.files[0]);
}
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<title>My Profile</title>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 315px;
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
  width: 300px;
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

<h2 style="text-align:center">My Profile</h2>

<div class="card">
  <img src="{{$image}}" style="width:100%">
  <h1>{{$name}}</h1>
  <p class="title">{{$email}}</p>
  <div style="margin: 24px 0;">
    <a href="https://github.com/AbdullahIsha"><i class="fa fa-github"></i></a> 
    <a href="https://twitter.com/shahria72632736"><i class="fa fa-twitter"></i></a>  
    <a href="https://www.linkedin.com/in/shahariar-isha-b49ba0175/"><i class="fa fa-linkedin"></i></a>  
    <a href="https://www.facebook.com/shahriar.isha"><i class="fa fa-facebook"></i></a> 
  </div>
  <a href="{{route('userSupport.editProfile')}}" id="dd">Edit</a><hr>
  <a href="{{route('userSupport.index')}}" id="dd">Home</a>
</div>

</body>
</html>
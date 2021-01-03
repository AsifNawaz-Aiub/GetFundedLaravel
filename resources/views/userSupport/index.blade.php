

<!DOCTYPE html>
<html>
<title>Event Donation</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style type="text/css">
#card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  width: 315px;
  margin: auto;
  text-align: center;
  font-family: arial;
  float: right;
  background-color: lightgray;
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
body {
  margin: 0;
  font-family: "Lato", sans-serif;
}

.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}

@media screen and (max-width: 800px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
</style>
</head>
<body>
<section>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Get Funded</a>
  <form class="form-inline">
    
  </form>
</nav>
</section>
<section>

<div class="sidebar">
  <a style="background-color: lightgray" href="{{route('userSupport.index')}}" class="w3-bar-item w3-button">Home</a>
  <a href="{{route('userSupport.allUser')}}" class="w3-bar-item w3-button">Users</a>
  <a href="/userSupport/viewEvents" class="w3-bar-item w3-button">Events</a>
  <a href="/userSupport/message" class="w3-bar-item w3-button">Message</a>
  <a href="{{route('userSupport.myProfile')}}" class="w3-bar-item w3-button">My Profile</a>
  <a style="color: red" href="/logout" class="w3-bar-item w3-button">logout</a>
</div>
<div style="margin-left:15%">
  <div class="content">
  <h2>Welcome To User Support Page...</h2>
  <div id="card">
    <h3 id="dd">Notification</h3>
    <p><%= success %></p>
      
  </div>
  
  
</div>
  
  </div>
</section>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
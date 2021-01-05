<!DOCTYPE html>
<html>
<head>
<title>All User</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/css/userSupport.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>
<body>
<section>
<nav class="navbar navbar-light bg-light justify-content-between">
  <a class="navbar-brand">Get Funded</a>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
  </form>
</nav>
</section>
<section>
<div class="sidebar">
  <a href="{{route('userSupport.index')}}" class="w3-bar-item w3-button">Home</a>
  <a style="background-color: lightgray" href="{{route('userSupport.allUser')}}" class="w3-bar-item w3-button">Users</a>
  <a href="{{route('userSupport.viewEvents')}}" class="w3-bar-item w3-button">Events</a>
  <a href="{{route('userSupport.message')}}" class="w3-bar-item w3-button">Message</a>
  <a href="{{route('userSupport.myProfile')}}" class="w3-bar-item w3-button">My Profile</a>
  <a style="color: red" href="/logout" class="w3-bar-item w3-button">logout</a>
</div>
<div style="margin-left:15%; ">
  <div class="w3-container">
	    <div class="container" id="card">    
			<table class="table table-hover" id="events" style="margin-top: 20%">
			  <tr>
          <td>Id</td>
          <td>name</td>
          <td>Email</td>
          <td>Action</td>
        </tr>

        @for($i=0; $i < count($userlist); $i++)
          <tr id="rows">
            <td>{{$userlist[$i]['id']}}</td>
            <td>{{$userlist[$i]['name']}}</td>
            <td>{{$userlist[$i]['email']}}</td>
            <td>
              <a class="btn btn-dark" href="{{route('userSupport.userEvents', $userlist[$i]['id'])}}">Events </a>
              <a class="btn btn-info" href="{{route('userSupport.userDetails', $userlist[$i]['id'])}}">Details </a> 
            </td>
          </tr>

        @endfor
			</table>
			<a id="dlink"  style="display:none;"></a>

      <input class="btn-sm btn-success btn-block" type="button" onclick="tableToExcel('events', 'users', 'allUsers.xls')" value="Export to Excel">
		</div>
	</div>

</section>


<script>
  $(document).ready(function(){
       $('#search').keyup(function(){
            search_table($(this).val());
       });
       function search_table(value){
            $('#events #rows').each(function(){
                 var found = 'false'; 

                 $(this).each(function(){
                      if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                      {
                           found = 'true';
                      }
                 });
                 if(found == 'true')
                 {
                      $(this).show();
                 }
                 else
                 {
                      $(this).hide();
                 }
            });
       }
  });
  var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
        , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
        , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
        , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        return function (table, name, filename) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }

            document.getElementById("dlink").href = uri + base64(format(template, ctx));
            document.getElementById("dlink").download = filename;
            document.getElementById("dlink").click();

        }
    })()
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

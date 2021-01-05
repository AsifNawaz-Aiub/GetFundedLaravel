@extends('layout/navbar')


@section('title')
View Event
@endsection
@section('content')
<div style="margin-left:15%">
	<div class="w3-container w3-light-grey">
<nav class="navbar navbar-light bg-light justify-content-between">
	  <a class="navbar-brand" href="/user/viewEvents">Events</a>
	  <form class="form-inline">
	    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" id="search">
	  </form>
	</nav>  
</div>



<div class="w3-container">
<div class="container">    
	  <table class="table table-hover" id="events">
	      <tr>
	        <th>Id</th>
	        <th>Event Name</th>
	        <th>Event Picture</th>
	        <th>Description</th>
	        <th>Category Id</th>
	        <th>Goal Amount</th>
	        <th>Goal Date</th>
	        <th>Action</th>
	      </tr>


		@for($i=0; $i < count($events); $i++)

			<tr id="rows">
				<td>{{$events[$i]['id']}}</td>
				<td>{{$events[$i]['eventName']}}</td>
				<td height="128px" width="200px"><img width="200px" height="128px" src="/img/{{$events[$i]['eventPicture']}}"></td>
				<td>{{$events[$i]['description']}}</td>
				<td>{{$events[$i]['categoryId']}}</td>
				<td>{{$events[$i]['goalAmount']}}</td>
				<td>{{$events[$i]['goalDate']}}</td>
				<td width="100px">
			  		<a class="btn btn-info" href="{{route('user.donateToEvent', $events[$i]['id'])}}">Donate</a>
			  		<a class="btn btn-dark" href="{{route('user.voteToEvent', $events[$i]['id'])}}">Vote</a>
			  		<a class="btn btn-success" href="{{route('user.commentToEvent', $events[$i]['id'])}}">Comment</a>
			  		<a class="btn btn-danger" href="{{route('user.reportToEvent', $events[$i]['id'])}}">Report</a>
		  	    </td>
			</tr>

		@endfor

	  </table>
	</div>
	<a id="dlink"  style="display:none;"></a>
	<input class="btn btn-success" type="button" onclick="tableToExcel('events', 'users', 'allViewEvent.xls')" value="Excel">
</div>

</div>

<script type="text/javascript">
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
@endsection

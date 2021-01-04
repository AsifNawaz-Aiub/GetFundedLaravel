<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
      table {
        border-collapse: collapse;
        width: 100%;
      }

      th,
      td {
        text-align: left;
        padding: 8px;
      }

      tr:nth-child(even) {
        background-color: #f2f2f2;
      }

      th {
        background-color: #4caf50;
        color: white;
        text-align: center;
      }
      tr:hover {
        background-color: #add8e6;
      }

      .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 8px 16px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}

.button1 {
  background-color: white; 
  color: black; 
  border: 2px solid #4CAF50;
}

.button1:hover {
  background-color: #4CAF50;
  color: white;
}

.button2 {
  background-color: white; 
  color: black; 
  border: 2px solid #008CBA;
}

.button2:hover {
  background-color: #008CBA;
  color: white;
}

.button3 {
  background-color: white; 
  color: black; 
  border: 2px solid #f44336;
}

.button3:hover {
  background-color: #f44336;
  color: white;
}

.button4 {
  background-color: white;
  color: black;
  border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
  background-color: white;
  color: black;
  border: 2px solid #555555;
}

.button5:hover {
  background-color: #555555;
  color: white;
}
    </style>
  
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <title>Moderator Home</title>
  </head>
  <body>
    <div
      class="w3-sidebar w3-bar-block w3-light-grey w3-card"
      style="width: 230px"
    >
      <h5 class="w3-bar-item">Menu</h5>
      <button 
        class="w3-bar-item w3-button tablink"
        onclick="openTab(event, 'Profile')"
        id="defaultOpen"
      >
        Profile
      </button>
      <button
        class="w3-bar-item w3-button tablink"
        onclick="openTab(event, 'Events')"
      >
        Events
      </button>

      <button
        class="w3-bar-item w3-button tablink"
        onclick="openTab(event, 'Contact')"
      >
        Contact
      </button>
      <button
        class="w3-bar-item w3-button tablink" id="gFeedaj"
        onclick="openTab(event, 'Feed')"
      >
        Feed
      </button>
      <button
      class="w3-bar-item w3-button tablink" id="loadreport"
      onclick="openTab(event, 'report')"
    >
      Reports
    </button>

      <a
      class="w3-bar-item w3-button tablink"
     href="/logout"
    >
      Logout
    </a>
    </div>
    <div style="margin-left: 230px">
       

      <div class="w3-container tab" id="Events" style="display: none">
        <div>
          <h2 style=" padding-left: 20px; text-align: center; background-color: #4caf50; padding-right: 20px; ">
          Get Funded
        </h2>
      </div>
       
        <div style="float: right; padding-top: 15px; "  >
          <input type="text" id="search" placeholder="Search here">
         
        </div>
       <div style="float: left;" > <h2 style=" padding-left: 20px; text-align: center; background-color: #4caf50; padding-right: 20px; ">
        Moderator Panel
      </h2></div>
        

        <h2 style="text-align: center">Events</h2>

        

        <table border="1" id="events_table" >
          <tr>
            <th>Id</th>
            <th>Event Name</th>
            <th>Creator Id</th>
            <th>Description</th>
            <th>Goal Amount</th>
            <th>Goal Date</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Action</th>
          </tr>

          @for($i=0; $i < count($events); $i++)
            
          <tr id="rows">
            <td>{{$events[$i]['id']}}</td>
            <td>{{$events[$i]['eventName']}}</td>
        
            <td>{{$events[$i]['creatorId']}}</td>

            <td>{{$events[$i]['description']}}</td>
            
            <td>{{$events[$i]['goalAmount']}}</td>
         
            <td>{{$events[$i]['goalDate']}}</td>
          
            <td>{{$events[$i]['isApproved']}}</td>

            <td>{{$events[$i]['createdAt']}}</td>
            <td>{{$events[$i]['updatedAt']}}</td>

      
            <td>
              @if($events[$i]['isApproved']==0 )
              <a href="{{route('event.approve', $events[$i]['id'])}}"class="w3-bar-item w3-button tablink">Approve</a>
              <a href="{{route('event.decline', $events[$i]['id'])}}"class="w3-bar-item w3-button tablink">Decline</a>
              <a href="{{route('event.modify', $events[$i]['id'])}}"class="w3-bar-item w3-button tablink">Modify</a>
              @else

              <a href="{{route('event.modify', $events[$i]['id'])}}" class="w3-bar-item w3-button tablink">Modify</a>
              @endif
            </td>
          </tr>
          @endfor
        </table>
        <a id="dlink"  style="display:none;"></a>

      <input type="button" onclick="tableToExcel('events_table', 'Events', 'EventTable.xls')" value="Export to Excel" class="button button1">
      </div>
      
      <div class="w3-container tab" id="Profile" style="display: none">
        <h2 style="text-align: center; background-color: #4caf50">
          Moderator Panel
        </h2>

        <h2 style="text-align: center">Profile</h2>
        <table style="width: 50%;">
        <tr> <td> <label>ID :</td> <td>  {{$users['id']}}  </label> </td></tr>
        <tr><td> <label>Name :</td><td>   {{$users['name']}}  </label> </td></tr>
        <tr> <td> <label>User Name :</td><td>   {{$users['userName']}} </label> </td></tr>
        <tr><td> <label>Email :</td><td> {{$users['email']}}   </label> </td></tr>
        </table>

        <h4>Notifications :</h4> 
        <p style="color: #4CAF50;" >success </p>



      </div>
      <div class="w3-container tab" id="Contact" style="display: none">
        <h2 style="text-align: center; background-color: #4caf50">Contact</h2>
        <br>
        <form action="">
          <input type="text" name="rid" placeholder="Load Chats by Reciever ID"  id="ridtext" required style=" width: 100%;padding: 12px 20px;margin: 8px 0;box-sizing: border-box;border: 2px solid green;border-radius: 4px;" >
          <input type="submit" value="Load Chats" id="loadinbox" class="button button1">
  
         </form>
        <fieldset style="width: 40%;">
          <legend> Inbox </legend>
          <fieldset id="msgdiv" >
             

         </fieldset>

       </fieldset>
       
        <br>
        <br>
        <br>
        
        
       




      </div>


      <div class="w3-container tab" id="report" style="display: none">
        <h2 style="text-align: center; background-color: #4caf50">Reports</h2>
        <br>

      

       <table id="excelTable">

       </table>
       <a id="dlink2"  style="display:none;"></a>

       <input type="button" onclick="tableToExcel2('excelTable', 'Reports', 'Reports.xls')" value="Download Report" class="button button1">
       </div>
      </div>


      <div class="w3-container tab" id="Feed" style="display: none">
        <div style="float: right; padding-top: 15px; "  >
          <input type="text" id="searchFeed" placeholder="Search here">
         
        </div>
        
       <div style="float: left;"> <h2 style=" padding-left: 230px; text-align: center; background-color: #4caf50; padding-right: 20px; ">
        Get Funded Feed
      </h2>
    
    </div>
       <br>
       <br>
       <br>
       <br>
      
        <!-- <form method="post">
          <% for(var i=0; i< EventList.length; i++ ){ %>
          <fieldset id="events_table2">
        <legend  >Event ID -- <%=EventList[i].id %>  </legend>
        <table>
          <tr>
            <td>Event Name:</td>
            <td><%=EventList[i].eventName %></td>
          </tr>
          <tr>
            <td id="rows2">Creator Id :</td>
            <td><%=EventList[i].creatorId %></td>
          </tr>
          <tr>
            <td>Description :</td>
            <td><%=EventList[i].description%></td>
                  </tr>
                  <tr>
            <td>Category Id :</td>
            <td><%=EventList[i].categoryId %></td>
          </tr>
          <tr>
            <td>Goal Amount :</td>
            <td><%=EventList[i].goalAmount %></td>
          </tr>
          <tr>
            <td>Goal Date :</td>
            <td><%=EventList[i].goalDate.toDateString() %></td>
                  </tr>
  
          
          <tr>
            <td>Created At :</td>
            <td><%=EventList[i].createdAt.toDateString() %></td>
                  </tr>
                  
          
        </table>
        <div>
         
          <input type="button" name="upvote-<%=EventList[i].id %>" value="Up Vote">
          <input type="button" name="downvote-<%=EventList[i].id %>" value="Down Vote">
          <input type="button" name="donate-<%=EventList[i].id %>" value="Donate">
          <input type="button" name="report-<%=EventList[i].id %>" value="Report">
        </div>
          </fieldset>
          <% } %>
    </form> -->
   <!-- <input type="button" value="Click" id="ajaxB" > -->

     <div id="getfeed" style="margin-left: 230px;" >
     
      <table class="getfeeds" id="gf" > 
        
     
      

      </table>
     
     </div>





      </div>
    </div>
    
  </body>

  <script>
    function openTab(evt, TabName) {
      var i, x, tablinks;
      x = document.getElementsByClassName("tab");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < x.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" w3-green", "");
      }
      document.getElementById(TabName).style.display = "block";
      evt.currentTarget.className += " w3-green";
     // document.getElementById('bid').id = 'defaultOpen';
    }
    
    document.getElementById("defaultOpen").click();
  </script>



<script>  
  $(document).ready(function(){  
       $('#search').keyup(function(){  
            search_table($(this).val());  
       });  
       function search_table(value){  
            $('#events_table #rows').each(function(){  
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
</script> 

<script>
$( document ).ready(function() {
	
	// GET REQUEST
	$("#gFeedaj").click(function(event){
        event.preventDefault();
        console.log("Clicked");
		ajaxGet();
  });
  $("#loadreport").click(function(event){
        event.preventDefault();
        console.log("Clicked");
		ajaxGet3();
  });


  $("#loadinbox").click(function(event){
      var receiverId = $("#ridtext").val();
      event.preventDefault();
          console.log("Clicked");
      if(receiverId){ajaxGet2(receiverId);} else{ alert("Fill The Box Please"); }
    });
	
	// DO GET
	function ajaxGet3(){
   
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
			      type : "GET",
            url : "/moderator/report",
            data: {_token: CSRF_TOKEN},
            datatype : 'json',
            
			success: function(result){
				$('#excelTable').empty();
        var custList = "";
        console.log("Ajjjjjjjjjjjaxxxxxxxx");
       
				$.each(JSON.parse(result), function(i, result){
					$('#excelTable').append(
          
          " <tr> <th>Event ID</th> <th>Total Donations </th></tr> <tr> <td style='text-align: center' >"+
          result.eventId+"</td><td style='text-align: center'>" + result.sumfund + "</td> </tr>"
          
          
          )
				});
				console.log("Success: ", result);
			},
			error : function(e) {
				$("#excelTable").html("<strong>Error</strong>");
				console.log("ERROR: ", e);
			}
		});	
  }

  function ajaxGet(){
   
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
   $.ajax({
           type : "GET",
           url : "/moderator/feed",
           data: {_token: CSRF_TOKEN},
           datatype : 'json',
           
     success: function(result){
       $('#getfeed table').empty();
       var custList = "";
       console.log("Ajjjjjjjjjjjaxxxxxxxx");
      
       $.each(JSON.parse(result), function(i, result){
         $('#getfeed .getfeeds').append(
           
         " <tr> <th>Event Name</th> <th>ID</th><th>Creator ID</th><th>Description</th><th>Category ID</th> <th>Goal Amount</th><th>Goal Date</th><th>Created At</th><th>Action</th> </tr> <tr> <td>"+
         result.eventName+"</td>" + " <td>" + result.id + "</td>"+ " <td>" + result.creatorId + "</td>" + " <td>" + result.description + "</td>" + " <td>" + result.categoryId + "</td>" +" <td>" + result.goalAmount + "</td>" +" <td>" + result.goalDate + "</td>" +" <td>" + result.createdAt + "</td> <td><a href='/moderator/donate/"+result.id+"'class='w3-bar-item w3-button tablink' >Donate</a> </td> </tr> <br> <br> "
         
         
         
         )
       });
       console.log("Success: ", result);
     },
     error : function(e) {
       $("#getfeed").html("<strong>Error</strong>");
       console.log("ERROR: ", e);
     }
   });	
 }
  
      // DO GET
      function ajaxGet2(receiverId){
      console.log("----------------");
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $.ajax({
              type : "GET",
              url : "/api/"+receiverId,
              data: {_token: CSRF_TOKEN},
              datatype : 'json',
              
        success: function(data){
          $('#msgdiv').empty();
          var custList = "";
          console.log("Ajjjjjjjjjjjaxxxxxxxx");
          console.log(data);
          $.each(JSON.parse(data), function(i,data){
            $('#msgdiv').append(
             "<div style='"+data.side+"'  > "+data.messageText+" </div> <br>"
            
            )
          });
          console.log("Success: ", data);
        }
       
      });	
    }


  
})


  </script>




</html>


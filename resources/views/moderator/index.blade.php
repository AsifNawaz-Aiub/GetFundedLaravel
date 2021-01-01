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
            <th>Action</th>
          </tr>

          <% for(var i=0; i< EventList.length; i++ ){ %>
            
          <tr id="rows">
            <td><%= EventList[i].id %></td>
            <td><%= EventList[i].eventName %></td>
            <td><%= EventList[i].creatorId %></td>
            <td><%= EventList[i].description %></td>
            <td><%= EventList[i].goalAmount %></td>
            <td><%= EventList[i].goalDate.toDateString() %></td>
            <td><%= EventList[i].isApproved %></td>
            <td><%= EventList[i].createdAt.toDateString() %></td>
            <td>
              <% if(EventList[i].isApproved==0 ){ %>
              <a href="/moderator/approve/<%=EventList[i].id%>"class="w3-bar-item w3-button tablink" >Approve</a>
              <a href="/moderator/decline/<%=EventList[i].id%>"class="w3-bar-item w3-button tablink">Decline</a>
              <a href="/moderator/modify/<%=EventList[i].id%>"class="w3-bar-item w3-button tablink">Modify</a>
              <% } else { %>

              <a href="/moderator/modify/<%=EventList[i].id%> " class="w3-bar-item w3-button tablink">Modify</a>
              <% } %>
            </td>
          </tr>
          <% } %>
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
      <tr> <td> <label>ID :</td> <td><%= userData[0].id  %>  </label> </td></tr>
       <tr><td> <label>Name :</td><td> <%= userData[0].name  %>  </label> </td></tr>
      <tr> <td> <label>User Name :</td><td> <%= userData[0].userName  %>  </label> </td></tr>
       <tr><td> <label>Email :</td><td> <%= userData[0].email  %>  </label> </td></tr>
        </table>

        <h4>Notifications :</h4> 
        <p style="color: #4CAF50;" ><%= success  %> </p>



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

</html>
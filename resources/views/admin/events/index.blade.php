<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <title>Events</title>
  </head>
  <body>
    <div class="d-flex">
        @include('admin.partials.nav')
        <div class="main px-4 py-3 w-100" >
            <h2>Events</h2>
            <p class="text-success">
              {{session('msg')}}
            </p>
            <p class="text-danger">
              {{session('error')}}
            </p>
            <div class="input-group mb-3 w-25">
                <input type="text" class="form-control" placeholder="Search table" id="search">
            </div>
            <table class="table table-striped table-hover" id="eventTable">
              <a id="dlink"  style="display:none;"></a>
              <caption><input class="btn btn-link" type="button" onclick="tableToExcel('eventTable', 'eventTable', 'eventTable.xls')" value="Export to Excel"></caption>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Event Name</th>
                        <th>Creator ID</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Goal Amount</th>
                        <th>Goal Date</th>
                        <th>Approval Status</th>
                        <th>Created At</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($eventList as $event)
                            <tr id="data-row">
                                <td>{{ $event->id }}</td>
                                <td><a href="/admin/events/view/{{ $event->id }}">{{ $event->eventName }}</a></td>
                                <td>{{ $event->creatorId }} <a class="btn btn-outline-dark mb-1" href="/admin/messages/{{$event->creatorId}}" role="button">Message</a></td>
                                <td>{{ $event->description }}</td>
                                <td>{{ $event->categoryId }}</td>
                                <td>BDT {{ $event->goalAmount }}</td>
                                <td>{{ date('d M Y', strtotime($event->goalDate))  }}</td>
                                <td>{{ ($event->isApproved ? "Approved" : "Not approved") }}</td>
                                <td>{{ date('d M Y h:i:s a', strtotime($event->createdAt)) }}</td>
                                <td>{{date('d M Y h:i:s a', strtotime($event->updatedAt))}}</td>
                                <td>
                                    <a class="btn btn-outline-dark mb-1" role="button" onclick="
                                        if (confirm('Are you sure you want to approve this event?')) {
                                            // Save it!
                                            window.location.href = '/admin/events/approve/{{$event->id}}';
                                            // console.log('Thing was saved to the database.');
                                          } else {
                                            // Do nothing!
                                            // console.log('Thing was not saved to the database.');
                                          }">Approve</a>
                                    <a class="btn btn-outline-dark mb-1" role="button" onclick="
                                    if (confirm('Are you sure you want to decline this event?')) {
                                        // Save it!
                                        window.location.href = '/admin/events/decline/{{$event->id}}';
                                        // console.log('Thing was saved to the database.');
                                      } else {
                                        // Do nothing!
                                        // console.log('Thing was not saved to the database.');
                                      }">Decline</a>
                                    <a class="btn btn-outline-dark mb-1" href="/admin/events/edit/{{$event->id}}" role="button">Modify</a>
                                    <a class="btn btn-outline-danger mb-1" role="button" onclick="
                                    if (confirm('Are you sure you want to delete this event?')) {
                                        // Save it!
                                        window.location.href = '/admin/events/delete/{{$event->id}}';
                                        // console.log('Thing was saved to the database.');
                                      } else {
                                        // Do nothing!
                                        // console.log('Thing was not saved to the database.');
                                      }">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>

    </div>
  </body>
  <script>  
    $(document).ready(function(){  
         $('#search').keyup(function(){  
              search_table($(this).val());  
         });  
         function search_table(value){  
              $('#eventTable #data-row').each(function(){  
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

      //download table
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
</html>

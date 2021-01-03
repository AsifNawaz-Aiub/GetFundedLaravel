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
    <title>Moderators</title>
  </head>
  <body>
    <div class="d-flex">
        @include('admin.partials.nav')
        <div class="main px-4 py-3 w-100" >
            <h2>Moderators</h2>
            <p class="text-success">
              {{session('msg')}}
            </p>
            <p class="text-danger">
              {{session('error')}}
            </p>
            <div class="input-group mb-3 w-25">
                <input type="search" class="form-control" placeholder="Search table" id="search">
            </div>
            <table class="table table-striped table-hover" id="moderatorTable">
              <a id="dlink"  style="display:none;"></a>
              <caption><input class="btn btn-link" type="button" onclick="tableToExcel('moderatorTable', 'moderatorTable', 'moderatorTable.xls')" value="Export to Excel"></caption>
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Last Updated</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach($moderatorList as $moderator)
                            <tr id="data-row">
                                <td>{{$moderator->id}}</td>
                                <td>{{$moderator->name}}</td>
                                <td>{{$moderator->userName}}</td>
                                <td>{{$moderator->email}}</td>
                                <td>{{date('d M Y h:i:s a', strtotime($moderator->createdAt))}}</td>
                                <td>{{date('d M Y h:i:s a', strtotime($moderator->updatedAt))}}</td>
                                <td>
                                    <a class="btn btn-outline-dark" href="/admin/moderators/edit/{{$moderator->id}}" role="button">Edit</a>
                                    <a class="btn btn-outline-dark" href="/admin/messages/{{$moderator->id}}" role="button">Send Message</a>
                                    <a class="btn btn-outline-danger" role="button" onclick="
                                    if (confirm('Are you sure you want to delete this moderator?')) {
                                        // Save it!
                                        window.location.href = '/admin/moderators/delete/{{$moderator->id}}';
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
            <a class="btn btn-outline-dark" href="moderators/add/" role="button">Add Moderator</a>
        </div>
    </div>

    </div>
  </body>
  <script>  
  //search
    $(document).ready(function(){  
         $('#search').keyup(function(){  
              search_table($(this).val());  
         });  
         function search_table(value){  
              $('#moderatorTable #data-row').each(function(){  
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

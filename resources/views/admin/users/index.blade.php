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
    <title>Users</title>
  </head>
  <body>
    <div class="d-flex">
        @include('admin.partials.nav')
        <div class="main px-4 py-3 w-100" >
            <h2>Users</h2>
            <p class="text-success">
              {{session('msg')}}
            </p>
            <p class="text-danger">
              {{session('error')}}
            </p>
            <div class="input-group mb-3 w-25">
                <input type="search" class="form-control" placeholder="Search table" id="search">
            </div>
            <table class="table table-striped table-hover" id="userTable">
              <a id="dlink"  style="display:none;"></a>
              <caption><input class="btn btn-link" type="button" onclick="tableToExcel('userTable', 'userTable', 'userTable.xls')" value="Export to Excel"></caption>
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
                        @foreach($userList as $user)
                            <tr id="data-row">
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->userName}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{date('d M Y h:i:s a', strtotime($user->createdAt))}}</td>
                                <td>{{date('d M Y h:i:s a', strtotime($user->updatedAt))}}</td>
                                <td>
                                    <a class="btn btn-outline-dark" href="/admin/users/edit/{{$user->id}}" role="button">Edit</a>
                                    <a class="btn btn-outline-dark" href="/admin/messages/{{$user->id}}" role="button">Send Message</a>
                                    <a class="btn btn-outline-danger" role="button" onclick="
                                    if (confirm('Are you sure you want to delete this user?')) {
                                        // Save it!
                                        window.location.href = '/admin/users/delete/{{$user->id}}';
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
            <a class="btn btn-outline-dark" href="users/add/" role="button">Add User</a>
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
              $('#userTable #data-row').each(function(){  
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

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
    <title>Admin Panel</title>
  </head>
  <body>
    <div class="d-flex">
      @include('admin.partials.nav')
      <div class="main px-4 py-3 w-100">
        <h2>Welcome, Admin</h2>
        <h6 class="mt-4"><-- Click a tab to open</h6>
      </div>
    </div>
  </body>
</html>

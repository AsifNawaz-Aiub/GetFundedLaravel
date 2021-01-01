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
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}">
    <title>Login</title>
  </head>
  <body>
    <div class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">GetFunded</a>
    </div>
    <div class="row justify-content-center">
      <div class="col col-sm-7 col-lg-5 col-xl-3 mt-5 mb-5" id="login-box">
        <h3>Login</h3>
        <br />
        <p class="text-success"><%= alert %></p>
        <p class="text-danger">
          <% if (error){%>
            <%=error[0].msg%>
          <%}%>
        </p>
        <form method="post" action="/login">
          <input
            class="form-control"
            type="text"
            placeholder="Email / Username"
            name="uid"
          /><br />
          <input
            class="form-control"
            type="password"
            placeholder="Password"
            name="password"
          /><br />
          <button class="btn-lg btn-dark btn-block" type="submit">Login</button
          ><br />
        </form>
        <div class="text-center">
          <a href="/signup">Create an account!</a>
        </div>
      </div>
    </div>
  </body>
</html>

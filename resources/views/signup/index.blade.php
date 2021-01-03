<!DOCTYPE html>
<html>
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
    <title>Signup</title>
  </head>
  <body>
  <div class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">GetFunded</a>
    </div>
    <div class="row justify-content-center">
      <div class="col col-sm-7 col-lg-5 col-xl-3 mt-5 mb-5" id="login-box">
        <h3>Signup</h3>
        <br />
        <p class="text-success">
          {{session('msg')}}
        </p>
        <p class="text-danger">
          {{session('error')}}
        </p>
        @if (count($errors) > 0)
          <p class="text-danger">
            @foreach ($errors->all() as $error)
              {{ $error }}<br>
            @endforeach
          </p>
        @endif
        <form method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input
            class="form-control"
            type="text"
            placeholder="Full Name"
            name="name"
            autocomplete="off"
          /><br />
          <input
            class="form-control"
            type="text"
            placeholder="Username"
            autocomplete="off"
            name="username"
          /><br />
          <input
            class="form-control"
            type="email"
            placeholder="Email"
            autocomplete="off"
            name="email"
          /><br />
          <input
            class="form-control"
            type="password"
            placeholder="Password"
            name="password"
            autocomplete="new-password"
            id="password"
          /><br />
          <input
            class="form-control"
            type="password"
            placeholder="Confirm Password"
            name="password_confirmation"
            autocomplete="off"
            id="confirmPassword"
          /><br />
          <button class="btn-lg btn-dark btn-block" type="submit">
            Create Account</button
          ><br />
        </form>
        <div class="text-center">
          <a href="/login">Already have an account? Log in!</a>
        </div>
      </div>
    </div>
  </body>
  <!-- Password match check -->
  <!-- <script>
    var password = document.getElementById("password"),
      confirm_password = document.getElementById("confirmPassword");

    function validatePassword() {
      if (password.value != confirmPassword.value) {
        confirmPassword.setCustomValidity("Passwords Don't Match");
      } else {
        confirmPassword.setCustomValidity("");
      }
    }

    password.onchange = validatePassword;
    confirmPassword.onkeyup = validatePassword;
  </script> -->
</html>


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
    <link href="{{ asset('/css/bootstrap-social.css') }}" rel="stylesheet" >
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
        <div class="social-buttons d-flex flex-column justify-content-center">
          <div class="d-flex flex-row justify-content-center">
            <p>or login with</p>
          </div>
          <div class="d-flex flex-row justify-content-around">
            <button type="button" class="btn btn-outline-primary w-25 mx-1" onclick="location.href = '/login/facebook';">Facebook</button>
            <button type="button" class="btn btn-outline-danger w-25 mx-1" onclick="location.href = '/login/google';">Google</button>
            <button type="button" class="btn btn-outline-dark w-25 mx-1" onclick="location.href = '/login/github';">Github</button>
            <button type="button" class="btn btn-outline-primary w-25 mx-1" onclick="location.href = '/login/twitter';">Twitter</button>
          </div>
        </div>
        <div class="text-center mt-3">
          <a href="/signup">Don't have an account? Sign up!</a>
        </div>
      </div>
    </div>
  </body>
</html>

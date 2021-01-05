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
    <title>Edit Moderator</title>
  </head>
  <body>
    <div class="d-flex">
      @include('admin.partials.nav')
      <div class="main px-4 py-3 w-100">
        <h2>Edit Moderator</h2>
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
        <form class="w-50 mt-3" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}" />
          <input type="hidden" value="{{$moderator->id}}" name="id">
          <div class="form-group">
            <label for="name">Name</label>
            <input
              type="text"
              name="name"
              class="form-control"
              id="name"
              placeholder="Enter Name"
              value="{{$moderator->name}}""
            />
          </div>
          <div class="form-group">
            <label for="userName">Username</label>
            <input
              type="text"
              name="userName"
              class="form-control"
              id="userName"
              placeholder="Enter Username"
              value="{{$moderator->userName}}"
            />
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email"
            name="email" class="form-control" id="email" placeholder="Enter email"
            value="{{$moderator->email}}">
          </div>
          <button type="submit" class="btn btn-outline-dark">Edit Moderator</button>
        </form>
      </div>
    </div>
  </body>
</html>
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
    <title>Edit Event</title>
  </head>
  <body>
    <div class="d-flex">
    @include('admin.partials.nav')
      <div class="main px-4 py-3 w-100">
        <h2>Edit Event</h2>
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
        <form class="w-50 mt-3" action="/admin/events/edit" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" value="{{$event->id}}" name="id">
            <input type="hidden" value="{{$event->categoryId}}" name="categoryId">
          <div class="form-group">
            <label for="eventName">Event Name</label>
            <input
              type="text"
              name="eventName"
              class="form-control"
              id="eventName"
              placeholder="Enter Event Name"
              value="{{$event->eventName}}"
            />
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <input
              type="text"
              name="description"
              class="form-control"
              id="description"
              placeholder="Enter description"
              value="{{$event->description}}"
            />
          </div>
          <div class="form-group">
            <label for="goalAmount">Goal Amount</label>
            <input
              type="text"
              name="goalAmount"
              class="form-control"
              id="goalAmount"
              placeholder="Enter Goal Amount"
              value="{{$event->goalAmount}}"
            />
          </div>
          <div class="form-group">
            <label for="goalDate">Goal Date</label>
            <input
              type="date"
              name="goalDate"
              class="form-control"
              id="goalDate"
              placeholder="Enter Goal Date"
              value="{{ $event->goalDate }}"
            />
          </div>
          <button type="submit" class="btn btn-outline-dark">Edit Event</button>
        </form>
      </div>
    </div>
  </body>
</html>

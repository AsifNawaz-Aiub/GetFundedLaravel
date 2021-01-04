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
    <title>Donate</title>
  </head>
  <body>
    <div class="d-flex">
      @include('admin.partials.nav')
      <div class="main px-4 py-3 w-100">
        <h2>Donate to {{$event->eventName}}</h2>
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
          <input type="hidden" name="eventId" value="{{$event->id}}" />
          <div class="input-group mb-3 w-50">
            <!-- <label for="amount">Enter Amount</label><br> -->
            <input
              type="number"
              name="amount"
              class="form-control"
              placeholder="Amount"
            />
            <div class="input-group-append">
              <span class="input-group-text" id="basic-addon2">BDT</span>
            </div>
          </div>
          <div class="form-group">
            <textarea
              class="form-control"
              name="message"
              placeholder="Leave a message with your donation"
              value=""
              rows="3"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-success">Donate</button>
        </form>
      </div>
    </div>
  </body>
</html>

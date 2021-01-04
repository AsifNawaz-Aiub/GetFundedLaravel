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
    
      <div class="main px-4 py-3 w-100">
        <h2>Donate to {{$eventName}}</h2>
        <form class="w-50 mt-3" method="post">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="eventId" value="{{$id}}" />
          <div class="input-group mb-3 w-50">
            <!-- <label for="amount">Enter Amount</label><br> -->
            <input
              type="number"
              name="amount"
              class="form-control"
              placeholder="Amount"
              required
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
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <title>Event details</title>
  </head>
  <body>
    <div class="d-flex">
    @include('admin.partials.nav')
      <div class="main px-4 py-3 w-100">
        <h2 class="border-bottom">{{ $event->eventName }} </h2>
        <p class="text-success">
          {{session('msg')}}
        </p>
        <p class="text-danger">
          {{session('error')}}
        </p>
        <div class="mb-3">
          <h4><strong>Description:</strong> {{ $event->description }}</h4>
          <p class="m-0"><strong>Goal Amount:</strong> {{ $event->goalAmount }} BDT</p>
          <p class="m-0"><strong>Goal Date:</strong> {{ date('M d, Y', strtotime($event->goalDate)) }}</p>
          <button class="btn btn-outline-primary my-3" type="button" data-toggle="collapse" data-target="#donationTable" aria-expanded="false" aria-controls="collapseExample">
            View Donations
          </button>
          <div class="collapse" id="donationTable">
            <table class="table table-striped table-hover" id="eventTable">
              <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Amount</th>
                    <th>Donor ID</th>
                    <!-- <th>Event ID</th> -->
                    <th>Message</th>
                    <th>Created At</th>
                    <th>Last Updated</th>
                </tr>
             </thead>
             <tbody>
              @foreach ($donationList as $donation)
                <tr>
                  <td>{{$donation->id}}</td>
                  <td>{{$donation->amount}}</td>
                  <td>{{$donation->donorId}} <a class="btn btn-outline-dark mb-1" href="/admin/messages/{{$donation->donorId  }}" role="button">Message</a></td>
                  <!-- <td>{{$donation->eventId}}</td> -->
                  <td>{{$donation->donationMessage}}</td>
                  <td>{{$donation->createdAt}}</td>
                  <td>{{$donation->updatedAt}}</td>
                </tr>
              @endforeach
             </tbody>
            </table>
          </div>
          <h6 class="mb-4">Amount collected: {{$donationSum}} BDT</h6>
          <h3 class="border-bottom">Actions</h3>
          <a class="btn btn-outline-success mb-2" href="/admin/events/donate/{{$event->id}}" role="button">Donate to this Event</a>
          <!-- <h6 class="mb-2">Approval Status: {{$event->isApproved   ? "Approved" : "Not approved" }}</h6>
          <a class="btn btn-outline-success" role="button" onclick="
            if (confirm('Are you sure you want to approve this event?')) {
                // Save it!
                window.location.href = '/admin/events/approve/{{$event->id}}?return=eventView';
                // console.log('Thing was saved to the database.');
              } else {
                // Do nothing!
                // console.log('Thing was not saved to the database.');
              }">Approve</a>
          <a class="btn btn-outline-danger" role="button" onclick="
            if (confirm('Are you sure you want to decline this event?')) {
                // Save it!
                window.location.href = '/admin/events/decline/{{$event->id}}?return=eventView';
                // console.log('Thing was saved to the database.');
              } else {
                // Do nothing!
                // console.log('Thing was not saved to the database.');
              }">Decline</a> -->
        </div>
        <h4>Created by: {{$creator->userName}}</h4>
        <a class="btn btn-outline-dark" href="/admin/messages/{{$creator->id}}" role="button">Send Message</a>
      </div>
    </div>
  </body>
</html>

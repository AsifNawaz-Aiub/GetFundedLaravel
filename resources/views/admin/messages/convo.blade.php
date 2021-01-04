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
    <title>Messages</title>
    
  </head>
  <body>
    <div class="d-flex">
        @include('admin.partials.nav')
        <div class="main px-4 py-3 w-100" >
            <div class="chatbox card">
                <div class="card-header">
                    <h2>{{$receiver->userName}}</h2>
                  </div>
                <div class="card-body">
                    @foreach ($messages as $message)
                        <div class="msgContainer">
                            <div class="card-text px-3 py-2 {{$message->side}}" style="max-width:300px; border: 1px solid black; border-radius: 20px;">{{$message->messageText}}</div><br>
                        </div>
                        <br>
                    @endforeach
                </div>
                <div class="card-footer">
                    <form>
                        <input type="hidden" id="csrf" name="_token" value="{{ csrf_token() }}" />
                        <input type="hidden" id="senderId" value="{{$senderId}}">
                        <input type="hidden" id="receiverId" value="{{$receiver->id}}">
                        <div class="input-group">
                            <input type="text" class="form-control" id="messageText" placeholder="Type your message here...">
                            <div class="input-group-append">
                              <button class="btn btn-outline-primary" id="sendButton" type="button">Send</button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
  </body>
  <script src="{{ asset('js/sendMessage.js')}}"></script>
</html>

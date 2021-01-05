@extends('layout/navbar')


@section('title')

@endsection
@section('content')
<div style="margin-left:15%">
  <div class="w3-container w3-light-grey">
<nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand" href="/user/viewEvents">Events</a>
    
  </nav>  
</div>



<div class="w3-container">
<div class="container"> 
<form method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  
      <div>
        <h3>Are you sure want to accept?</h3>
       <button type="submit" class="btn btn-primary">Confirm</button>
       <a href="{{route('user.myEvent')}}" class="btn btn-dark">Back</a>
      </div>
</form>   
    
  </div>
</div>

</div>
@endsection

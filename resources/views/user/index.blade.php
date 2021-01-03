@extends('layout/navbar')


@section('title')
Home Page
@endsection
@section('content')
<div style="margin-left:15%">
	<h1>Welcome home! {{$username}}</h1>
</div>
@endsection
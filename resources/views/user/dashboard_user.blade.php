@extends('user.master.master_dashboard')
@section('content') 
<h1>Welcome to Your Dashboard
    @if(session()->has('name'))
    {{ session('name') }}
@endif 
</h1>



@endsection
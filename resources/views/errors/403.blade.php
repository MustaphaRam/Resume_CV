@extends('layouts.masterPage')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2 text-center">
            <h2>this page not authorized</h2>
            <a href="{{ url('/cvs')}}">Back Off</a>
        </div>
    </div>
</div>
@endsection
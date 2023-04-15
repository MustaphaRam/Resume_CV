@extends('layouts/masterPage')
<head>
    <title>{{ $title}}</title>
</head>

@section('content')
<div class="container">
    <h2>Create cv</h2>
    <div class="row">
    <div class="pull-right">
            <a href="{{url('/cvs')}}"><button class="btn btn-success" style="float:right"><i class="fa fa-eye" aria-hidden="true"></i> List cv</button></a>
            </div>
        <div class="col-md-12">
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::get('fail'))
            <div class="alert alert-danger">
                {{Session::get('fail')}}
            </div>
            @endif
            <form action="{{url('cvs/store')}}" method="post" >
                <div class="form-group" style="width:700px">
                    @csrf
                    <label for="">Title</label>
                    <input type="text" name="title" class="form-control" autofocus palaceholder="enter title" value="{{ old('title')}}">
                    <span style="color:red;">@error('title'){{ $message }} @enderror</span><br/>
                    <!--  -->
                    <label for="">Presentation</label>
                    <textarea type="text-area" name="presentation" class="form-control" palaceholder="enter presentation" rows="5">{{ old('presentation')}}</textarea>
                    <span style="color:red;">@error('presentation'){{ $message }} @enderror</span><br/>
                    <!--  -->
                    <input type="submit" class="btn btn-primary" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
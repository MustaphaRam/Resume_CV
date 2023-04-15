@extends('layouts/masterPage')
@section('content')
<head>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>

<div class="container rounded bg-white mt-4 mb-4" style="min-height: 750px;">
    <div class="container p-3 m-2">
        <div class="row">
            <h2>Cvs</h2>
                <div class="content col-md-2 border rounded p-3 m-2">
                    <a href="/" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#myModal" alt="Download">
                        <svg xmlns="http://www.w3.org/2000/svg" width="100px" height="100px" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16">
                            <path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/>
                            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/>
                        </svg>
                        <span class="bottom"><h3>Create</h3></span>
                    </a>
                </div>
                @foreach($cvs as $item)
                    <div class="content col-md-2 border rounded p-3 m-2">
                        <span><button type="button" class="btn-close float-end"></button></span>
                        <div class="up">
                            <a href="{{url('cv/contact')}}" class="btn btn-default">
                                <div class="row">
                                    <span>{{ $item->title }}</span><br>
                                </div>
                            </a>
                        </div>
                        <div class="bottom">
                            <span class="float-start">{{ date("d-m-Y", strtotime($item->created_at)) }}</span>
                            <a href="#" class="float-end">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-file-earmark-arrow-down" viewBox="0 0 16 16">
                                    <path d="M8.5 6.5a.5.5 0 0 0-1 0v3.793L6.354 9.146a.5.5 0 1 0-.708.708l2 2a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 10.293V6.5z"/>
                                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
        </div>
        
        <div class="modal flex-column align-items-center" id="myModal" style="background-color: rgba(0, 0, 0, 0.55);">
            <div class="modal-dialog">
                <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Create cv</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <form action="{{url('cv/create')}}" method="post" >
                        <div class="form-group">
                            @csrf
                            <label for="">Title</label>
                            <input type="text" name="title" class="form-control" autofocus palaceholder="enter title" value="{{ old('title')}}">
                            <span style="color:red;">@error('title'){{ $message }} @enderror</span><br/>
                            @error('presentation'){{ $message }} @enderror
                        </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" value="Create">
                </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
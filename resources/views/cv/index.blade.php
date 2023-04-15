@extends('layouts/masterPage')
<head>
    <title>{{ $title}}</title>
</head>

@section('content')
<div class="container">
    <h2>List cv</h2>
        <div class="row">
            <div class="pull-right">
            <a href="{{url('cvs/create')}}"><button class="btn btn-success" style="float:right"><i class="fa fa-eye" aria-hidden="true"></i> Add cv</button></a>
            </div>
            <div class="container">
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
            </div>
            <div class="table-responsive col-md-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-md-1">Id</th>
                            <th class="col-md-2">Title</th>
                            <th class="col-md-6">Presentaion</th>
                            <th class="col-md-1">Date</th>
                            <th class="col-md-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($listcv as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->presentation }}</td>
                            <td>{{ date("d/m/Y", strtotime($item->created_at)) }}</td>
                            <td>
                                <a href="{{ url('cvs/'.$item->id.'/details') }}"><button class="btn btn-info btn-sm">Details</button></a>
                                <a href="{{ url('cvs/'.$item->id.'/edit') }}"><button class="btn btn-primary btn-sm"> Edit</button></a>
                                <form action="{{url('cvs/'.$item->id)}}" method="POST" style="display:inline;">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(&quot;Confirm delete?&quot;)"> Delete</button>
                                </form>    
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
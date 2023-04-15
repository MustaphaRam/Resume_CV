@extends('layouts.masterPage')
<head>
    <title>{{ $title}}</title>
    <script src="{{asset('js/vue.js')}}"> </script>
    <script> src="https://unpkg.com/axios/dist/axios.min.js"</script>
    <script>
        /* window.Laravel = { json_encode([
            'csrfToken' => csrf_token(),
            'idCv'      => $id,
            'url'       => url('/')
        ]) }; */
    </script>
</head>
@section('content')
<div class="container">
    <div class="row">
        <div id="app">
            @{{ message }}
        </div>
        <div class="pull-right">
            <a href="{{url('/cvs')}}"><button class="btn btn-success" style="float:right"><i class="fa fa-eye" aria-hidden="true"></i> List cv</button></a>
        </div>
        <div class="col-md-10">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Title</h3>
                </div>
                <div class="panel-body">{{ $cv->title}}</div>
            </div>
            <hr/>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Presentaion</h3>
                </div>
                <div class="panel-body">{{ $cv->presentation}}</div>
            </div>
        </div>

        <!-- <div>
            <ul class="list-group">
                <li class="list-group-item" v-for="cv in cvs">
                    <h2>@{{ cv.id }}</h2>
                    <h2>@{{ cv.title }}</h2>
                    <h3>@{{ cv.presentation }}</h3>
                    <span>@{{ cv.created_at }}</span>

                </li>
            </ul>
        </div> -->
    </div>
</div>
@endsection

@section('javascript')
            
            <script>
                var app = new Vue({
                    el: '#app',
                    data: { message: 'Hello Vue sam!',
                            cvs: [] },
                    methods : { getcv : function(){
                        axios.get(window.Laravel.url+'/getcv'+window.Laravel.idCv)
                        .then(response => { this.cvs = response.data, console.table(response.data);})
                        .catch(error => {console.log('errors : ',error);})
                        }
                    },
                        /* mounted:function(){ this.getcv();}  */
                        mounted:function(){ this.getcv();}
                });
            </script>

@endsection

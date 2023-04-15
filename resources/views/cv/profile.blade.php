@extends('layouts/masterPage')
<head>
    <script> src="{{ asset('js/jquery-3.6.0.min.js') }}" </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
@section('content')

<div class="container">
    <h2>Profile</h2>
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
            <form action="{{url('cv/store')}}" method="post" enctype="multipart/form-data" style="width:700px" >
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Upload Image</label>
                        <input type="file" name="image_profile" class="form-control" accept=".png, .jpg, .jpeg, .svg, .bmp" onchange="fileCheck(this, event)">
                        <span style="color:red;">@error('image_profile'){{ $message }} @enderror</span><br/>
                    </div>
                    <div class="form-group col-md-6" style="margin-bottom: 15px;text-align: center;">
                        <img id="Dimage" class="img-thumbnail" width="150" height="100" alt="Image Principale" >
                    </div>
                    <script>
                        function fileCheck(obj, event) {
                        var fileExtension = ['jpeg', 'jpg', 'png', 'svg', 'bmp'];
                        let str = obj.value.split('.');
                        if (fileExtension.indexOf(str[1].toLowerCase()) == -1) {
                            alert("Le fichier que vous avez choisi est incorrect !\ns'il vous plaît sélectionner une image ");
                            obj.value = null;
                        }

                        else {
                            var img = document.getElementById("Dimage");
                            img.src = URL.createObjectURL(event.target.files[0]);
                        }
                    }
                </script>

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Name *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        <span style="color:red;">@error('name'){{ $message }} @enderror</span><br/>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Last Name *</label>
                        <input type="text" name="lastname" class="form-control" value="{{  old('lastname') }}">
                        <span style="color:red;">@error('lastname'){{ $message }} @enderror</span><br/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Date Birth *</label>
                        <input type="date" name="date_birth" class="form-control" value="{{ old('date_birth') }}">
                        <span style="color:red;">@error('date_birth'){{ $message }} @enderror</span><br/>
                    </div>
                    
                    <div class="form-group col-md-6">
                        <label for="">Gender *</label>
                        <div class="row" style="padding: 4px 15px;">
                            <div class="col-md-3">
                            <!-- onchange="change(event)" -->
                                <label for="M" class="form-check-label">
                                    <input type="radio" name="gender"  id="M" class="form-check-input" value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> Male
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label for="F" class="form-check-label">
                                    <input type="radio" name="gender"  id="F" class="form-check-input" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> Female
                                </label>
                            </div>
                        </div>
                        <span style="color:red;">@error('gender'){{ $message }} @enderror</span><br/>
                    </div>
                </div>
                
                <script>
                    var gender = document.getElementsByName("gender");
                    var select = document.getElementsByName("situation_family");

                    //onchange gender
                    gender.forEach(g => g.addEventListener("click", function change(event) {
                        let radio = event.target;
                        let id = radio.id;
                        if(radio.checked && radio.id=="M"){
                            console.log("m "+id);
                            var data = ["","Celibate", "Divorced","Married", "Widower"];
                        }
                        else{
                            console.log("f "+id);
                            var data = ["","Single","Divorced", "Married", "widow"];
                        }
                        select[0].innerHTML="";
                        for(var item of data){
                            $('#select').append('<option value="' + item + '">' + item + '</option>');
                        }
                    }));
	            </script>

                <div class="row">
                <div class="form-group col-md-6">
                        <label for="">Situation Family *</label>
                        <select class="form-select" id="select" name="situation_family" {{ old('situation_family') }}>
                        </select>
                        <!-- <input type="option" name="situation_family" class="form-control" palaceholder="enter title" value="{{ old('situation_family') }}"> -->
                        <span style="color:red;">@error('situation_family'){{ $message }} @enderror</span><br/>
                    </div>                  
                <script>
                    var gender = document.getElementsByName("gender");
                    var dataM = ["","Celibate", "Divorced","Married", "Widower"];
                    var dataF = ["","Single","Divorced", "Married", "widow"];

                    //onload
                    if(gender[1].checked==true){
                        data = dataF;
                    }
                    else {
                        data = dataM;
                    }
                    for(var item of data){
                        $('#select').append('<option value="' + item + '">' + item + '</option>');
                        }
                 </script>

                    <div class="form-group col-md-6">
                        <label for="">Country *</label>
                        <select class="form-select" name="country" aria-label="Default select example">
                            <option selected></option>
                            @foreach ($countries as $contry)
                                        <option value="{{ $contry }}" >{{ $contry }}</option>
                            @endforeach
                        </select>
                        <!-- {{$contry == "$contry" ? 'selected' : ''}} -->
                        <!-- <input type="option" name="country" class="form-control" palaceholder="enter title" value="{{ old('country') }}"> -->
                        <span style="color:red;">@error('country'){{ $message }} @enderror</span><br/>
                    </div>
                </div>
                
                <div class="form-group col-md-6">
                    <label for="">Hobbies </label>
                    <input type="text" name="hobbies" class="form-control" placeholder="for exmple: Sport, Cinema, Cooking, Music" value="{{ old('hobbies') }}">
                    <span style="color:red;">@error('hobbies'){{ $message }} @enderror</span><br/>
                </div>

                <div class="form-group">
                    <label for="">Profile</label>
                    <textarea type="text-area" name="my_profile" class="form-control" placeholder="talk about your self" rows="5">{{ old('my_profile') }}</textarea>
                    <span style="color:red;">@error('my_profile'){{ $message }} @enderror</span><br/>
                    <!--  -->
                    <input type="submit" class="btn btn-primary" value="Next">
                </div>
            </form>

            <?php
?>
        </div>
    </div>
</div>
@endsection
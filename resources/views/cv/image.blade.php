@extends('layouts/masterPage')

@section('content')
<head>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <script> src="{{ asset('js/jquery-3.6.0.min.js') }}" </script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        function fileCheck(obj, event) {
            var fileExtension = ['jpeg', 'jpg', 'png', 'svg', 'bmp','svgz', 'bmp', 'tiff', 'webp', 'tif'];
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
</head>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="bd-clipboard"></div>
            <form action="{{url('cv/profile/update')}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <span id="btnfile" class="border px-3 p-1 add-button" onclick="document.getElementById('getFile').click()">Chosse Image
                    <input type="file" name="image_profile" id="getFile" accept=".png, .jpg, .jpeg, .svg,.svgz, .bmp, .tiff, .webp, .tif" onchange="fileCheck(this, event)" class="form-control form-control-sm" hidden/>
                </span>
                <span style="color:red;">@error('image_profile'){{ $message }} @enderror</span>
                <img class="rounded-circle mt-5" alt="image profile" id="Dimage" width="150px" src="{{ asset('images/'. $profile->image_profile) }}">
                <span class="font-weight-bold">{{ $user->name}}</span><span class="text-black-50">{{ $user->email}}</span>
            </div>
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
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
                
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <label class="labels">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $profile->name}}">
                            <span style="color:red;">@error('name'){{ $message }} @enderror</span>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Last Name</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $profile->lastname }} ">
                            <span style="color:red;">@error('lastname'){{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="labels">Date Birth</label><input type="date" name="date_birth" class="form-control" value="{{ $profile->date_birth}}">
                            <span style="color:red;">@error('date_birth'){{ $message }} @enderror</span><br/>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Gender</label>
                            <div class="row" style="padding: 4px 15px;">
                                <div class="col-md-5">
                                    <label for="M" class="form-check-label">
                                        <input type="radio" name="gender"  id="M" class="form-check-input" value="male" {{ $profile->gender == 'male' ? 'checked' : '' }} > Male
                                    </label>
                                </div>
                                <div class="col-md-6">
                                    <label for="F" class="form-check-label">
                                        <input type="radio" name="gender"  id="F" class="form-check-input" value="female" {{ $profile->gender == 'female' ? 'checked' : '' }}> Female
                                    </label>
                                </div>
                            </div>
                            <span style="color:red;">@error('gender'){{ $message }} @enderror</span><br/>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Situation Family</label>
                            <select class="form-control" id="select" name="situation_family" >
                                    <option selected value="{{ $profile->situation_family}}">{{ $profile->situation_family}}</option>
                            </select>
                            <span style="color:red;">@error('situation_family'){{ $message }} @enderror</span><br/>
                        </div>
                        <div class="col-md-6">
                            <label class="labels">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ $profile->country}}">
                            <span style="color:red;">@error('country'){{ $message }} @enderror</span><br/>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Hobbies</label>
                            <input type="text" name="hobbies" class="form-control" value="{{ $profile->hobbies}}" placeholder="for exmple: Sport, Cinema, Cooking, Music">
                            <span style="color:red;">@error('hobbies'){{ $message }} @enderror</span><br/>
                        </div>
                        <div class="col-md-12">
                            <label class="labels">Profile</label>
                            <textarea name="my_profile" class="form-control" rows="5">{{ $profile->my_profile}}</textarea>
                            <span style="color:red;">@error('my_profile'){{ $message }} @enderror</span>
                        </div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save Profile</button></div>
                </form>

                <script>
                    var gender = document.getElementsByName("gender");
                    var select = document.getElementsByName("situation_family");
                    //onchange gender
                    gender.forEach(g => g.addEventListener("click", function change(event) {
                        let radio = event.target;
                        let id = radio.id;
                        if(radio.checked && radio.id=="M") var data = ["","Celibate", "Divorced","Married", "Widower"];
                        else var data = ["","Single","Divorced", "Married", "widow"];
                        select[0].innerHTML="";
                        for(var item of data){
                            $('#select').append('<option value="' + item + '">' + item + '</option>');
                        }
                    }));
                    //onload
                    if(gender[1].checked) data = ["","Single","Divorced", "Married", "widow"];
                    else data = ["","Celibate", "Divorced","Married", "Widower"];
                    for(var item of data){
                        $('#select').append('<option value="' + item + '">' + item + '</option>');
                    }
                </script>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3"><h4 class="text-right">Contact</h4></div>
                <div class="col-md-12"><label class="labels">Address</label><input type="text" name="address" class="form-control" value=""><span style="color:red;">@error('address'){{ $message }} @enderror</span></div><br>
                <div class="col-md-12"><label class="labels">City</label><input type="text" name="city" class="form-control" value=""><span style="color:red;">@error('city'){{ $message }} @enderror</span></div><br>
                <div class="col-md-12"><label class="labels">Phone 1</label><input type="text" name="phone1" class="form-control" value=""><span style="color:red;">@error('phone1'){{ $message }} @enderror</span></div>
                <div class="col-md-12"><label class="labels">Phone 2</label><input type="text" name="phone2" class="form-control" value=""><span style="color:red;">@error('phone2'){{ $message }} @enderror</span></div><br>
                <div class="col-md-12"><label class="labels">Email</label><input type="text" name="email" class="form-control" value=""><span style="color:red;">@error('email'){{ $message }} @enderror</span></div><br>
                <div class="col-md-12"><label class="labels">Linkedin</label><input type="text" name="linkedin" class="form-control" value=""><span style="color:red;">@error('linkedin'){{ $message }} @enderror</span></div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection
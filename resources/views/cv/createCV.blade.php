@extends('layouts/masterPage')
@section('content')
<head>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"> </script>
    <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{ asset('js/scriptcreate.js') }}"></script>
</head>
<div class="container rounded bg-white mt-4 mb-4">
    <div class="row">
        <div class="col-md-6 section-left">
            <div class="col-md-12 mb-3 mt-2">
                <div class="menu">
                    <div class="progress iMg">
                        <div class="progress-bar progress-bar-striped" id="progressbar" role="progressbar" style="width: 8%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="jHmzai" onclick="display(8)"><div class="dpzdms">PROFILE</div><div></div></div>
                    <div class="jHmzai" onclick="display(22)"><div class="dpzdms">CONTACT</div><div></div></div>
                    <div class="jHmzai" onclick="display(36)"><div class="dpzdms">EDUCATION</div><div></div></div>
                    <div class="jHmzai" onclick="display(50)"><div class="dpzdms">EXPERIENCE</div><div></div></div>
                    <div class="jHmzai" onclick="display(64)"><div class="dpzdms">SKILLS</div><div></div> </div>
                    <div class="jHmzai" onclick="display(78)"><div class="dpzdms">LANGUAGES</div><div></div></div>
                    <div class="jHmzai" onclick="display(92)"><div class="dpzdms">FINISH</div><div></div></div> 
                </div>
            </div>
            <form id="myform" action="/cv/create/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 border-right content-left">
                    <input type="hidden" name="title" value="{{ $title }}">
                    <div class="p-3 py-2">
                        <!-- *************** form 0 ****************************-->
                        <div id="8">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Profile</b></h4>
                            </div>
                            <h5>Please enter your profile informations</h5>
                            <span>This allows employers to know who you are.</span><br/>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12 py-1">
                                        <label for="">Name *</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                        <span style="color:red;">@error('name'){{ $message }} @enderror</span>
                                    </div>
                                    <div class="col-md-12 py-1">
                                        <label for="">Last Name *</label>
                                        <input type="text" name="lastname" class="form-control" value="{{  old('lastname') }}">
                                        <span style="color:red;">@error('lastname'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                                <div class="col-md-6">   
                                    <div class="d-flex flex-column align-items-center text-center">
                                        <span id="btnfile" class="border px-3 p-1 add-button" onclick="document.getElementById('getFile').click()">
                                            Chosse Image
                                            <input type="file" name="image_profile" id="getFile" class="form-control form-control-sm" accept=".png, .jpg, .jpeg, .svg, .bmp" hidden>
                                        </span>
                                        <img id="Dimage" class="img-thumbnail" width="125" alt="Image Principale" >
                                        <span style="color:red;">@error('image_profile'){{ $message }} @enderror</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="">Date Birth *</label>
                                    <input type="date" name="date_birth" min="{{ date('Y-m-d', strtotime('-60 years'))}}" max="{{ date('Y-m-d', strtotime('-15 years'))}}" class="form-control" value="{{ old('date_birth') }}">
                                    <span style="color:red;">@error('date_birth'){{ $message }} @enderror</span>
                                </div>
                                
                                <div class="col-md-6 py-1">
                                    <label for="">Gender *</label>
                                    <div class="row" style="padding: 4px 15px;">
                                        <div class="col-md-5">
                                        <!-- onchange="change(event)" -->
                                            <label for="M" class="form-check-label">
                                                <input type="radio" name="gender"  id="M" class="form-check-input" checked value="male" {{ old('gender') == 'male' ? 'checked' : '' }}> Male
                                            </label>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="F" class="form-check-label">
                                                <input type="radio" name="gender"  id="F" class="form-check-input" value="female" {{ old('gender') == 'female' ? 'checked' : '' }}> Female
                                            </label>
                                        </div>
                                    </div>
                                    <span style="color:red;">@error('gender'){{ $message }} @enderror</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 py-1">
                                    <label for="">Situation Family *</label>
                                    <select class="form-select" id="select" name="situation_family">
                                        <option selected value="{{ old('situation_family') }}">{{ old('situation_family') }}</option>
                                    </select>
                                    <span style="color:red;">@error('situation_family'){{ $message }} @enderror</span>
                                </div>                  
                                
                                <div class="col-md-6 py-1">
                                    <label for="">Country *</label>
                                    <select class="form-select" name="country" aria-label="Default select example">
                                        <option selected value="{{ old('country')}}"> {{ old('country')}} </option>
                                        @foreach($countries as $contry)
                                            <option value="{{ $contry }}" >{{ $contry }}</option>
                                        @endforeach
                                    </select>
                                    <span style="color:red;">@error('country'){{ $message }} @enderror</span>
                                </div>
                            </div>
                            
                            <div class="col-md-6 py-1">
                                <label for="">Hobbies </label>
                                <input type="text" name="hobbies" class="form-control" placeholder="for exmple: Sport, Cinema, Cooking, Music" value="{{ old('hobbies') }}">
                                <span style="color:red;">@error('hobbies'){{ $message }} @enderror</span>
                            </div>

                            <div class="form-group py-1">
                                <label for="">Profile</label>
                                <textarea type="text-area" name="my_profile" class="form-control" placeholder="talk about your self" rows="2">{{ old('my_profile') }}</textarea>
                                <span style="color:red;">@error('my_profile'){{ $message }} @enderror</span>
                                
                            </div>
                        </div> 

                        <!-- *************** form 1 ****************************-->
                        <div id="22" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Contact</b></h4>
                            </div>
                            <h5>Please enter your contact informations</h5>
                            <span>This allows employers to contact you.</span>
                            <div class="row">
                                <div class="col-md-6 py-2"><label class="labels">Address</label><input type="text" name="address" class="form-control contact" pattern="^[a-zA-Z0-9 -+°]{5,60}" value="{{old('address')}}" ><span style="color:red;">@error('address'){{ $message }} @enderror</span></div>
                                <div class="col-md-6 py-2"><label class="labels">City</label><input type="text" name="city" class="form-control contact" pattern="^[a-zA-Z ]{3,20}" value="{{old('city')}}" minlength="3" maxlength="20"><span style="color:red;">@error('city'){{ $message }} @enderror</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 py-1"><label class="labels">Phone 1</label><input type="text" name="phone1" class="form-control contact" pattern="^[0-9 ()-,+]{10,13}$" value="{{old('phone1')}}" minlength="10" maxlength="13"><span style="color:red;">@error('phone1'){{ $message }} @enderror</span></div>
                                <div class="col-md-6 py-1"><label class="labels">Phone 2</label><input type="text" name="phone2" class="form-control contact" pattern="^[0-9 ()-,+]{10,13}$" value="{{old('phone2')}}" minlength="10" maxlength="13"><span style="color:red;">@error('phone2'){{ $message }} @enderror</span></div>
                            </div>
                            <div class="col-md-12 py-1"><label class="labels">Email</label><input type="text" name="email" class="form-control contact" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" value="{{old('email')}}" minlength="5" maxlength="35"><span style="color:red;">@error('email'){{ $message }} @enderror</span></div>
                            <div class="col-md-12 py-1"><label class="labels">Linkedin</label><input type="text" name="linkedin" class="form-control contact" value="{{old('linkedin')}}" maxlength="70" placeholder="www.linkedin.com/in/name-lastname"><span style="color:red;">@error('linkedin'){{ $message }} @enderror</span></div>
                        </div> 

                        <!-- *************** form 2 ****************************-->
                        <div id="36" style=" display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4><b>Education or Certificates</b></h4>
                            </div>
                            <h5>You have to enter data related to your studies </h5>
                            <span>Enter your last degree diploma</span>
                            <div class="row">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="czYJLT listEtu" id="setEtu">
                                        @if(count($errors->all())>0 && !is_null((old('certificate'))))
                                            @php($i = 0)
                                            @foreach(old('certificate') as $input)
                                                <div class="fnXcmN @if($errors->has('certificate.'.$i) || $errors->has('institute_name.'.$i) || $errors->has('Specialty_name.'.$i) || $errors->has('date_obtaining.'.$i) || $errors->has('description.'.$i)) border rounded border-danger @endif">
                                                    <div class="jEQib eSepnq">
                                                        <p class="ignblp showetu" id="id">{{ old('certificate.'.$i) }}, {{ old('Specialty_name.'.$i) }} at {{ old('institute_name.'.$i) }}, {{ old('date_obtaining.'.$i) }}</p>
                                                        <div class="bfNMLE">
                                                            <button class="eNmQca kbFMmR remove">
                                                                <ion-icon name="close-circle-outline"></ion-icon>
                                                            </button>
                                                            <button class="eNmQca kbFMmR ikHWQs">
                                                                <ion-icon name="chevron-up-outline"></ion-icon>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="set">
                                                        <div class="row py-2">
                                                            <div class="col-md-6 py-1"><label class="labels">Certificate Name</label><input name="certificate[]" value="{{ old('certificate.'.$i) }}" class= "form-control cert_name input_etu{{$i+1}}" pattern="^[a-zA-Z0-9 -+]{3,30}$" ><span style="color:red;">@error('certificate.'.$i){{ $message }} @enderror</span></div>
                                                            <div class="col-md-6 py-1"><label class="labels">Institution Name</label><input name="institute_name[]" value="{{ old('institute_name.'.$i) }}" class= "form-control inst_name input_etu{{$i+1}}" pattern="^[a-zA-Z0-9 -]{3,30}$"><span style="color:red;">@error('institute_name.'.$i){{ $message }} @enderror</span></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 py-1"><label class="labels">Specialty</label><input name="Specialty_name[]" value="{{ old('Specialty_name.'.$i) }}" class = "form-control specialty input_etu{{$i+1}}" pattern="^[a-zA-Z0-9 -]{3,30}$"><span style="color:red;">@error('Specialty_name.'.$i){{ $message }} @enderror</span></div>
                                                            <div class="col-md-6 py-1"><label class="labels">Date Obtaining</label><select id="" name="date_obtaining[]" value="{{ old('date_obtaining.'.$i) }}" class= "form-control date_ob input_etu{{$i+1}}"><option selected value="{{ old('date_obtaining.'.$i) }}">{{ old('date_obtaining.'.$i)}}</option></select><span style="color:red;">@error('date_obtaining.'.$i){{ $message }} @enderror</span></div>
                                                        </div>
                                                        <div class="col-md-12 py-1"><label class="labels">Other Informations</label><textarea name="description[]"  maxlength="130" class ="form-control other_info">{{ old('description.'.$i) }}</textarea><span style="color:red;">@error('description.'.$i){{ $message }} @enderror</span></div>
                                                    </div>
                                                    <div class="dxqSpv"></div>
                                                </div>
                                                @php($i++)
                                            @endforeach
                                            <script>
                                                a= "{{$i}}";
                                            </script>
                                        @endif
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top" id="addEtu">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g></svg>
                                            </span>
                                        </span>
                                        <span class="hsNWet">Add new certificate</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                            
                        <!-- *************** form 3 ****************************-->
                        <div id="50" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Work Experience or Traineeship</b></h4>
                            </div>
                            <h5>Talk about your experience</h5>
                            <span>Start with your most recent experience</span>
                            <div class="row">
                                <div id="Experience" class="cYNMV">
                                    <div class="czYJLT listExp" id="setExp">
                                    @if(count($errors->all())>0 && !is_null((old('namJob'))))
                                            @php($exp = 0)
                                            @foreach(old('namJob') as $input)
                                                <div class="fnXcmN @if($errors->has('namJob.'.$exp) || $errors->has('institution.'.$exp) || $errors->has('startdate.'.$exp) || $errors->has('enddate.'.$exp) || $errors->has('city_exp.'.$exp) || $errors->has('otherinfo.'.$exp)) border rounded border-danger @endif">
                                                    <div class="jEQib eSepnq">
                                                        <p class="ignblp showetu" id="">{{ old('namJob.'.$exp) }} in {{ old('institution.'.$exp) }}, {{ date('M.Y',strtotime(old('startdate.'.$exp))) }} - {{ date('M.Y',strtotime(old('enddate.'.$exp))) }} at  {{ old('city_exp.'.$exp) }}</p>
                                                        <div class="bfNMLE">
                                                            <button class="eNmQca kbFMmR remove">
                                                                <ion-icon name="close-circle-outline"></ion-icon>
                                                            </button>
                                                            <button class="eNmQca kbFMmR ikHWQs">
                                                                <ion-icon name="chevron-up-outline"></ion-icon>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <div class="set" id="showEtu">
                                                        <div class="row py-2">
                                                            <div class="col-md-6 py-1" ><label class="labels">Job post</label><input name="namJob[]" value="{{ old('namJob.'.$exp) }}" class="form-control input_exp{{$exp+1}}"><span style="color:red;">@error('certificate.'.$exp){{ $message }} @enderror</span></div>
                                                            <div class="col-md-6 py-1"><label class="labels">Company name or Institution Name</label><input name="institution[]" value="{{ old('institution.'.$exp) }}" class="form-control input_exp{{$exp+1}}"><span style="color:red;">@error('institution.'.$exp){{ $message }} @enderror</span></div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 py-1"><label class="labels">Start date </label><input type="month" min="1970-01" name="startdate[]" value="{{ old('startdate.'.$exp) }}" class = "form-control input_exp{{$exp+1}}"><span style="color:red;">@error('startdate.'.$exp){{ $message }} @enderror</span></div>
                                                            <div class="col-md-4 py-1"><label class="labels">End date</label><input type="month" min="1970-01" name="enddate[]" value="{{ old('enddate.'.$exp) }}" class = "form-control input_exp{{$exp+1}}"><span style="color:red;">@error('enddate.'.$exp){{ $message }} @enderror</span></div>
                                                            <div class="col-md-4 py-1" ><label class="labels">City</label><input name="city_exp[]" value="{{ old('city_exp.'.$exp) }}" class = "form-control input_exp{{$exp+1}}" ><span style="color:red;">@error('city_exp.'.$exp){{ $message }} @enderror</span></div>
                                                        </div>
                                                        <div class="col-md-12 py-1"><input type="checkbox" name="currently_here[]" ><label class="labels" for="currently_here[]"> I currently work here</label></div>
                                                        <div class="col-md-12 py-1"><label class="labels">Other Informations</label><textarea name="otherinfo[]" maxlength="120" class = "form-control">{{ old('otherinfo.'.$exp) }}</textarea><span style="color:red;">@error('otherinfo.'.$exp){{ $message }} @enderror</span></div>
                                                    </div>   
                                                    <div class="dxqSpv"></div>         
                                                </div>
                                                @php($exp++)
                                            @endforeach
                                            <script>
                                                expid= "{{$exp}}";
                                            </script>
                                        @endif
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top" id="addexp">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                            </svg>
                                        </span>
                                        <span class="hsNWet">Add new experience</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *************** form 4 ****************************-->
                        <div id="64" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Skills</b></h4>
                            </div>
                            <h5>Talk about your skills that you master</h5>
                            <span>This allows employers to learn your professional skills.</span>
                            <div class="row">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="czYJLT" id="setSkill">
                                    @if(count($errors->all())>0 && !is_null((old('skill'))))
                                        @php($ski = 0)
                                        @foreach(old('skill') as $input)
                                        <div class="fnXcmN @if($errors->has('skill.'.$ski) || $errors->has('level_skills.'.$ski)) border rounded border-danger @endif">
                                            <div class="jEQib eSepnq">
                                                <p class="ignblp showetu">{{ old('skill.'.$ski)}} : {{ old('level_skills.'.$ski)}}</p>
                                                <div class="bfNMLE">
                                                    <button class="eNmQca kbFMmR remove">
                                                        <ion-icon name="close-circle-outline"></ion-icon>
                                                    </button>
                                                    <button class="eNmQca kbFMmR ikHWQs">
                                                        <ion-icon name="chevron-up-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="set">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1"><label class="labels">Skill</label><input name="skill[]" value="{{ old('skill.'.$ski)}}" class="form-control input_skill{{ $ski }}" ><span style="color:red;">@error('skill.'.$ski){{ $message }} @enderror</span></div>
                                                    <div class="col-md-6 py-1"><label for="level" class="col-md-12">Level</label>
                                                        <div class="row py-1 flex-nowrap">
                                                            <input type="hidden" name="level_skills[]" value="{{ old('level_skills.'.$ski)}}" class="form-control input_skill{{ $ski }}" >
                                                            <input type="range" style="width:57%;padding-left: 20px;" size="1" class="form-range input_skill{{ $ski }}" min="0" max="4" step="1" value="0">
                                                            <span class="col-md-5" id="show-sk-lev">{{ old('level_skills.'.$ski)}}</span>
                                                        </div>
                                                        <span style="color:red;">@error('level_skills.'.$ski){{ $message }} @enderror</span>
                                                    </div> 
                                                </div>  
                                            </div>
                                        </div>
                                        @php($ski++)
                                        @endforeach
                                        <script>  
                                            skillid= "{{ $ski }}";
                                        </script>
                                        
                                    @endif
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top"  id="addskill">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                            </svg>
                                        </span>
                                        <span class="hsNWet">Add new skill</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *************** form 5 ****************************-->
                        <div id="78" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Languages</b></h4>
                            </div>
                            <h5>Languages that you master</h5>
                            <span>This allows employers to learn about your language skills.</span>
                            <div class="row">
                                <div id="EDUCATION" class="cYNMV">
                                    <div class="czYJLT" id="setLang">
                                    @if(count($errors->all())>0 && !is_null((old('language'))))
                                        @php($lan = 0)
                                        @foreach(old('language') as $input)
                                        <div class="fnXcmN @if($errors->has('language.'.$lan) || $errors->has('level_lang.'.$lan)) border rounded border-danger @endif">
                                            <div class="jEQib eSepnq">
                                                <p class="ignblp showetu" id="`+id+`">{{ old('language.'.$lan)}} : {{ old('level_lang.'.$lan)}}</p>
                                                <div class="bfNMLE">
                                                    <button class="eNmQca kbFMmR remove">
                                                        <ion-icon name="close-circle-outline"></ion-icon>
                                                    </button>
                                                    <button class="eNmQca kbFMmR ikHWQs">
                                                        <ion-icon name="chevron-up-outline"></ion-icon>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="set">
                                                <div class="row py-2">
                                                    <div class="col-md-6 py-1"><label class="labels">Langue</label><input name="language[]" value="{{ old('language.'.$lan)}}" class="form-control input_lang{{ $lan }}" ><span style="color:red;">@error('language.'.$lan){{ $message }} @enderror</span></div>
                                                    <div class="col-md-6 py-1"><label for="level" class="col-md-12">Level</label>
                                                        <div class="row py-1 flex-nowrap">
                                                            <input type="hidden" name="level_lang[]" value="{{ old('level_lang.'.$lan)}}" class="form-control input_lang{{ $lan }}" >
                                                            <input type="range" style="width:57%;padding-left: 20px;"  size="1" class="form-range input_lang{{ $lan }}" min="0" max="4" step="1" value="0">
                                                            <span class="col-md-5" id="show-lang-lev{{ $lan }}">Beginner</span>
                                                        </div> 
                                                        <span style="color:red;">@error('level_lang.'.$lan){{ $message }} @enderror</span>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        @php($lan++)
                                        @endforeach
                                        <script>  
                                            langid= "{{ $lan }}";
                                        </script>
                                    @endif
                                    </div>
                                    <div class="gAWxhx cFgtZv border-top" id="addlang">
                                        <span class="jLopio">
                                            <span class="fguQPT">
                                                <svg viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="isBodP"><g fill-rule="nonzero"><path xmlns="http://www.w3.org/2000/svg" fill="#1688fe" fill-rule="evenodd" d="M8 0a8 8 0 110 16A8 8 0 018 0zm0 2a6 6 0 100 12A6 6 0 008 2zm1 2v3h3v2H9v3H7V9H4V7h3V4h2z"></path></g>
                                            </svg>
                                        </span>
                                        <span class="hsNWet">Add new langue</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- *************** form 6 ****************************-->
                        <div id="92" style="display: none;">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h4 class="text-right"><b>Finish</b></h4>
                            </div>
                                @if(Session::get('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                    <script>
                                        $("#8").css("display", "none");
                                        $("#92").css("display", "block");
                                        document.getElementById('progressbar').style.width = "100%";
                                    </script>
                                @endif

                                @if(Session::get('fail'))
                                    <div class="alert alert-danger">
                                        {{Session::get('fail')}}
                                    </div>
                                @endif

                                @if ($errors->all())
                                    {{ $title}}
                                    <script>
                                        $("#8").css("display", "none");
                                        $("#92").css("display", "block");
                                        document.getElementById('progressbar').style.width = "93%";
                                    </script>
                                    <div class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            {{$error}}<br>
                                        @endforeach
                                    </div>
                                @endif
                        <!--  <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save</button></div> -->
                        </div>
                    </div>
                </div>
                <div class="footer-bass py-4">
                    <div class="div-back-btn">
                        <div class="btn-back btn float-start" id="back_btn" style="display: none;">❮ Go Back</div>
                    </div>
                    <div class="div-next-btn">
                        <button type="submit" style="display: none;" id="save-btn" class="btn-next btn btn-primary float-end">Save 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-all" viewBox="0 0 16 16">
                                <path d="M8.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L2.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093L8.95 4.992a.252.252 0 0 1 .02-.022zm-.92 5.14.92.92a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 1 0-1.091-1.028L9.477 9.417l-.485-.486-.943 1.179z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="div-next-btn">
                        <div class="btn-next btn btn-primary float-end" id="next_btn">Next ❯</div>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-6 ">
            <div class="row border-start position-relative" style="height:750px;background-color: rgb(229, 228, 234);border-radius: 10px;">
                <div class="position-absolute top-50 start-50 translate-middle bg-body" style="width: 396.8px;vertical-align: middle;left: 50vw;height: 559.3px;z-index: 3;"></div>
            </div>
        </div>
    </div>
</div>
@endsection
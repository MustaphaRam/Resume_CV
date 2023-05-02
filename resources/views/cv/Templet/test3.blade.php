<!DOCTYPE html>
<html lang="en">
<head>
    <?php use Carbon\Carbon; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cv</title>
    <script defer src="{{ asset('css/assets/fontawesome/js/all.min.js')}}"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/orbit-1.css') }}"> -->
    <!-- <link rel="stylesheet" href="{{ asset('css/boot3.3.7.css') }}"> -->
     
     <style><?php include(public_path().'/css/boot3.3.7.css');?></style>
<style>    
    /* .container{
        position: relative;
        display: -webkit-inline-box;
    }*/
    @page { 
        margin: 0px;
        font-family: {{$cv->design->family_font}}, Helvetica, sans-serif;
    }

    /* .page{
    width: 612px; 
    height: 792px; 
    overflow: hidden; 
    font-family: Arial, Helvetica; 
    position: relative; 
    color: #545554;
    page-break-after: always;
    } */

    h1, h2, h3, h4, h5, h6 {
        font-weight: 700;
    }

    p {
        line-height: 1.5;
    }

    .sidebar-wrapper {
        background: #e6e6e6;
        /* height: 1123px; */
        color: #7b07a8;
        padding-bottom: 8px;
        background-clip: content-box;
        padding: 0;
        min-height: 100% !important;
    }
    .sidebar-wrapper a {
    color: #fff;
    }
    .sidebar-wrapper .profile-container {
        padding: 30px 0;
        background: rgb(58 91 135);
        text-align: center;
        color: #fff;
    }

    .sidebar-wrapper .profile-image {
        /* background: #e6e6e6;
        border-radius: 50%; */
        width: 100%
        inline-size: min-content;
        margin: auto; 
        margin-top: 15px;
    }

    .sidebar-wrapper .name {
        font-size: 20px;
        font-weight: 900;
        margin-top: 0;
        margin-bottom: 10px;
    }
    .sidebar-wrapper .tagline {
        color: rgba(255, 255, 255, 0.6);
        font-size: 16px;
        font-weight: 400;
        margin-top: 0;
        margin-bottom: 0;
    }
    .sidebar-wrapper .profile {
        margin-bottom: 15px;
    }

    .setcolor{
        background-color: {{ $cv->design->color }};
    }

    .c55{
        color: {{ $cv->design->color }};
    }

    .sidebar-wrapper .c55{
        /* display: flex; */
        margin-bottom: 15px;
    }

    .c55 span{
        color: black;
    }

    .sidebar-wrapper .contact-list icon {
        
    }
    .sidebar-wrapper .contact-list li {
    margin-bottom: 15px;
    }
    .sidebar-wrapper .contact-list li:last-child {
    margin-bottom: 0;
    }
    .sidebar-wrapper .contact-list .email .svg-inline--fa {
    font-size: 14px;
    }
    .sidebar-wrapper .container-block {
    padding: 30px 13px;
    }
    .sidebar-wrapper .container-block-title {
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 700;
        margin-top: 0;
        margin-bottom: 15px;
        font-weight: bold;

    }
    .sidebar-wrapper .degree {
        font-size: 14px;
        margin-top: 0;
        margin-bottom: 5px;
    }
    .sidebar-wrapper .education-container .item {
        margin-bottom: 15px;
    }
    .sidebar-wrapper .education-container .item:last-child {
        margin-bottom: 0;
    }
    .sidebar-wrapper .education-container .meta {
        color: rgba(255, 255, 255, 0.6);
        font-weight: 500;
        margin-bottom: 0px;
        margin-top: 0;
        font-size: 14px;
    }
    .sidebar-wrapper .education-container .time {
        color: rgba(255, 255, 255, 0.6);
        font-weight: 500;
        margin-bottom: 0px;
    }

    .list-unstyled{
        padding-left: 10px;
        list-style: none;
        font-weight: bold;
        font-size: 20px;
    }
    .sidebar-wrapper .interests-list li {
        margin-bottom: 10px;
        padding-left: 10px;
    }

    .lang{
        font-weight: bold;
        font-size: 20px;
        color: {{$cv->design->color}};
    }

    .lan_lev{
        margin-bottom: 10px;
    }

    .main-wrapper {
        /* padding: 15px;*/
        margin-top: 10px;
    }
    .main-wrapper .section-title {
        text-transform: uppercase;
        font-size: 30px;
        color: {{$cv->design->color}};
        position: relative;
        margin-bottom: 10px;
        border-bottom: 1px solid;
        border-color: #e6e6e6;
    }
    .main-wrapper .section-title .icon-holder {
        width: 26px;
        height: 26px;
        margin-right: 8px;
        display: inline-block;
        color: #fff;
        border-radius: 50%;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        background: {{$cv->design->color}};
        text-align: center;
        position: relative;
    }
    
    .main-wrapper .section {
        margin-top: 15px;
    }
    .main-wrapper .experiences-section .item {
        margin-bottom: 30px;
    }
    .main-wrapper .upper-row {
        position: relative;
        /* overflow: hidden; */
        margin-bottom: 2px;
    }

    .main-wrapper .inline{
        width: 100%;
    }
    .main-wrapper .job-title {
        color: #3F4650;
        font-size: 14pt;
        margin-top: 0;
        margin-bottom: 0;
        font-weight: bold;
    }
    .main-wrapper .date {
        text-align: end;
        color: rgb(187,187,187) !important;
        padding-right: 25px;
        font-weight: bold;
        float: right;
        /* width: 35%; */
        text-align: right;
    }
    .main-wrapper .compa {
        color: rgb(187,187,187) !important;
        font-weight: bold;
        padding-left: 0;
        /* width: 65%; */
    }
    .main-wrapper .project-title {
        font-size: 16px;
        font-weight: 400;
        margin-top: 0;
        margin-bottom: 5px;
    }
    .main-wrapper .projects-section .intro {
        margin-bottom: 30px;
    }
    .main-wrapper .item {
        margin-bottom: 10px;
    }

    #skillset .item {
        display: -webkit-inline-box;
    } 

    .row {
        margin-right: 0px;
        margin-left: 0px;
    }
    .main-wrapper .section h2 {
        align-items: center;
        margin: 5px 0;
    }

    .meta{
        margin-bottom: 5px;
        display: block;
    }
    .main-wrapper p {
        padding-right: 30px;
    }

    .icon{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }

    tbody td{
        border: none;
    }
    
</style>
</head>
<body>


<div id="resulta" class="" >
@php
    $level_arry= ['Beginner','Moderate','Good','Very good','Fluent'];
    function convertSvgToBase64($svg, $color) {
        if($color=='')
            $color = '#fff';
        $iconWithFill = str_replace('<svg ', '<svg fill="' . $color . '" ', $svg);
        return $base64Icon = 'data:image/svg+xml;base64,' . base64_encode($iconWithFill);
    }
@endphp
    <div class="row" style="/*display: -webkit-box;width: 100%; */">
        <div class="sidebar-wrapper col-xs-4 col-md-4">
            <div class="setcolor profile-container">
                <h1 id="fullName" class="name">{{$cv->profile->name.' '.$cv->profile->lastname}}</h1>
                <h3 id="tit" class="tagline">{{$cv->title}}</h3>
                <div  class="row">
                    <div id="cader-imag" class="profile-image">
                        <img id="imagPro" class="rounded mx-auto d-block" style="width: 60%; border-radius: 50%;border: 7px solid;border-color: honeydew;" src="{{ 'data:image/png;base64,' . base64_encode(file_get_contents('images/'. $cv->profile->image_profile)) }}" alt="image">
                    </div>
                </div>
            </div><!--//profile-container-->
            <div class="contact-container container-block">
                <div class="contact-list">
                    <div class="c55"><icon style="margin-right: 8px;"><img width="20" src="{{ convertSvgToBase64(file_get_contents('css/icons/house.svg'), $cv->design->color) }}" alt="icon"></icon><span style="margin-left: 10px;" id="address">N°2 RUE OUISSALNE HAY SAFE KARIA SALE</span></div>
                    <div class="c55"><icon style="margin-right: 8px;"><img width="20" src="{{ convertSvgToBase64(file_get_contents('css/icons/envelope.svg'), $cv->design->color) }}" alt="icon"></icon><span style="margin-left: 10px;" id="email">{{$cv->contact->email}}</span></div>
                    <div class="c55"><icon style="margin-right: 8px;"><img width="20" src="{{ convertSvgToBase64(file_get_contents('css/icons/phone.svg'), $cv->design->color) }}" alt="icon"></icon><span style="margin-left: 10px;" id="tel">{{$cv->contact->phone1.' / '.$cv->contact->phone2}}</span></div>
                    <div class="c55"><icon style="margin-right: 8px;"><img width="20" src="{{ convertSvgToBase64(file_get_contents('css/icons/linkedin-in.svg'), $cv->design->color) }}" alt="icon"></icon><span style="margin-left: 10px;" id="linkedin"> {{$cv->contact->linkedin}} </span></div>
                </div>
            </div>

            <!-- <div class="languages-container container-block">
                <h2 class="c55 container-block-title">Languages</h2>
                <div id="seclang" class="lan_lev" style="display: grid;">
                    @if ($cv->language->count() > 0)
                        @foreach ($cv->language as $lang)
                            <div class="lan_lev" style="align-items: center;display: -webkit-inline-box;">
                                <div class="col-xs-6" style="display: -webkit-inline-box;"><span class="lang">{{ $lang->language_name }}</span></div>
                                <div class="col-xs-4" style="display: -webkit-inline-box;margin: auto 0;">
                                    @for($index=0; $index<count($level_arry); $index++)
                                        @if($index <= array_search($lang->level, $level_arry))
                                            <div class="setcolor" style="margin: 0 4px; height: 13px; width: 13px; border-radius: 50%;"></div>
                                        @else
                                            <div class="" style="margin: 0 4px; background-color: #bbbbbb; height: 13px; width: 13px; border-radius: 50%;"></div>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div> -->
            
            <div class="languages-container container-block">
                <h2 class="c55 container-block-title">Languages</h2>
                <div id="seclang" class="lan_lev" style="display: grid;">
                @if ($cv->language->count() > 0)
                    <table class="table table-borderless">
                        <tbody>
                        @foreach ($cv->language as $lang)
                            <tr>
                                <td class="col-xs-6" style="border: none;">
                                    <span class="lang">{{ $lang->language_name }}</span>
                                </td>
                                <td class="col-xs-4" style="border: none; display: block;margin: auto 0; width: 100%;">
                                    @for($index=0; $index<count($level_arry); $index++)
                                        @if($index <= array_search($lang->level, $level_arry))
                                            <div class="setcolor" style="margin: -4 1px; height: 13px; width: 13px; border-radius: 50%;display: inline-block;"></div>
                                        @else
                                            <div class="" style="margin: -4 1px; background-color: #bbbbbb; height: 13px; width: 13px; border-radius: 50%;display: inline-block;"></div>
                                        @endif
                                    @endfor
                                </td> 
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endif
                </div>
            </div>
            <div class="interests-container container-block">
                <h2 class="c55 container-block-title">Interests</h2>
                <ul id="hobbies" class="list-unstyled interests-list">
                    @isset($cv->profile->hobbies)
                        @foreach(explode(',', $cv->profile->hobbies) as $index)
                            <li>{{$index}}</li>
                        @endforeach
                    @endisset
                </ul>
            </div><!--//interests-->
            
        </div><!--//sidebar-wrapper-->
        
            <div class="main-wrapper col-xs-8 col-md-8">
                <section style="white-space: normal;" class="section">
                    <h2 class="c55 section-title"><span class="setcolor icon-holder"><icon class="icon"><img width="15" src="{{ convertSvgToBase64(file_get_contents('css/icons/user.svg'), "") }}" alt="icone"></icon></span>Profile</h2>
                    <div style="box-sizing: border-box;" class="summary">
                        <p id="Profile" style="widht: 100%">{{ $cv->profile->my_profile }}</p>
                    </div><!--//summary-->
                </section><!--//section-->
                
                <!-- Education -->
                <section style="white-space: normal;" class="section projects-section">
                    <h2 class="c55 section-title"><span class="setcolor icon-holder"><icon class="icon"><img width="15" src="{{ convertSvgToBase64(file_get_contents('css/icons/book.svg'), "") }}" alt="icone"></icon></span>Education</h2>

                    <div id="secEdu" >
                        @if ($cv->education->count() > 0)
                            @foreach ($cv->education as $edu)
                            <div class="item">
                                <div class="meta">
                                    <div class="upper-row">
                                        <h2 class="job-title">{{$edu->certificate." ".$edu->Specialty_name }}</h2>
                                    </div>
                                    <div class="upper-row inline">
                                        <div class="col-xs-7 compa">{{$edu->institute_name}}</div>
                                        <div class="col-xs-5 date">{{$edu->date_obtaining}}</div>
                                    </div>
                                </div><br/>
                                <div class="text-wrap"><p>{{$edu->description}}</p></div>
                            </div>          
                            @endforeach
                        @endif            
                    </div>
                </section>

                <!-- experiences -->
                <section class="section experiences-section">
                    <h2 class="c55 section-title"><span class="setcolor icon-holder"><icon class="icon"><img width="15" src="{{ convertSvgToBase64(file_get_contents('css/icons/briefcase.svg'), "") }}" alt="icone"></icon></span>Experiences</h2>
                    <div id="secExp">
                    @if ($cv->experience->count() > 0)
                        @foreach ($cv->experience as $exp)
                            <div class="item">
                                <div class="meta">
                                    <div class="upper-row"><h2 class="job-title">{{$exp->name_post}}</h2></div>
                                    <div class="upper-row inline">
                                        <div class="col-xs-7 compa">{{$exp->name_company.", ".$exp->city}}</div>
                                        <div class="col-xs-5 date">{{Carbon::parse($exp->start_date)->format('Y-m')." - ".Carbon::parse($exp->end_date)->format('Y-m')}}</div>
                                    </div>
                                </div><br/>
                                <div class="text-wrap"><p>{{$exp->description}}</p></div>
                            </div>        
                        @endforeach
                    @endif
                    </div>                  
                </section>
                
                <!-- skills -->
                @if ($cv->skill->count() > 0)
                    <section class="skills-section section">
                        <h2 class="c55 section-title"><span class="setcolor icon-holder"><icon class="icon"><img width="15" src="{{ convertSvgToBase64(file_get_contents('css/icons/rocket.svg'), "") }}" alt="icone"></icon></span>Skills &amp; Proficiency</h2>
                        <div id="skillset">
                            @foreach ($cv->skill as $skil)
                                <div class="main-wrapper upper-row">
                                    <div class="col-xs-3 col-xs-offset-1" style="display: inline-block;"><h6 class="level-title">{{ $skil->name}}</h6></div>
                                    @php 
                                        $lev = (array_search($skil->level, $level_arry)+1)*20;
                                        
                                    @endphp
                                    <div class="col-xs-4" style="display: inline-block;float: right;">
                                        <div class="progress" style="height: 15px;width: 80%;margin-top: 3px; background-color: #e6e6e6;">
                                            <div class="progress-bar setcolor" role="progressbar" style="width:{{$lev}}%;" aria-valuenow="{{$lev}}" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div><br/>
                            @endforeach
                        </div>  
                    </section>
                @endif
            </div><!--//main-body-->
        </div>
    </div>
</body>
</html>

    
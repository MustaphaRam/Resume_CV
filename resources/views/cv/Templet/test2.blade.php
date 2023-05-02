<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cv_templet2</title>
    <!-- <link href='https://fonts.googleapis.com/css?family=Roboto:400,500,400italic,300italic,300,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'> -->
    <!-- FontAwesome JS-->
	<!-- <script defer src="{{ asset('css/assets/fontawesome/js/all.min.js')}}"></script> -->
    <!-- <script src="{{ asset('js/jquery-3.6.0.min.js') }}"> </script>   --> 
    <!-- Theme CSS -->  
    <!-- <script defer src="{{ asset('css/assets/fontawesome/js/all.min.js')}}"></script> -->
    
     <style><?php include(public_path().'/css/boot3.3.7.css');?></style>
<style>
   @page { 
        margin: 0px; 
        /* overflow-wrap: break-word; */
        font-family: "Arial";
        padding-right: 40px;

        .sidebar-wrapper {
            width: 33.33333333%;
        }
        .main-wrapper {
            width: 66.66666667%;;
        }
    }
    /* h1, h2, h3, h4, h5, h6 {
        font-weight: 700;
    } */

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
    /*background: #e6e6e6;*/
    border-radius: 50%;
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
    background-color: #3A5B87;
    }
    .c55{
    display: flex;
    padding-bottom: 6px;
    }
    .sidebar-wrapper .c55{
    display: flex;
    padding-bottom: 15px;
    }
    .c55 span{
    color: black;
    }
    .sidebar-wrapper .contact-list .svg-inline--fa {
    margin-right: 5px;
    font-size: 18px;
    vertical-align: middle;
    margin-top: 2px;
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
    }
    .lan_lev{
        margin-bottom: 10px;
        align-content: space-around;
        display: flex;
        align-items: center;
    }

    .main-wrapper {
        margin-top: 20px;
    }
    .main-wrapper .section-title {
    text-transform: uppercase;
    font-size: 20px;
    color: #2d7788;
    position: relative;
    margin-bottom: 10px;
    border-bottom: 1px solid;
    border-color: #e6e6e6;
    }
    .main-wrapper .section-title .icon-holder {
        width: 30px;
        height: 30px;
        margin-right: 8px;
        display: inline-block;
        color: #fff;
        border-radius: 50%;
        -moz-background-clip: padding;
        -webkit-background-clip: padding-box;
        background-clip: padding-box;
        background: #2d7788;
        text-align: center;
        font-size: 16px;
        position: relative;
        top: -2px;
        padding-top: 2px;
    }
    .main-wrapper .section-title .icon-holder .svg-inline--fa {
        font-size: 14px;
        margin-top: 6px;
    }
    .main-wrapper .section {
        margin-bottom: 30px;
        width : 100%;
        padding-right: 30px;
    }
    .main-wrapper .experiences-section .item {
        margin-bottom: 30px;
    }
    .main-wrapper .upper-row {
        margin-right: 0; 
        margin-left: 0;
        margin-bottom: 2px;
        display: flow-root;
    }
    .main-wrapper .job-title {
        color: #3F4650;
        font-size: 14pt;
        margin-top: 0;
        margin-bottom: 0;
        font-weight: bold;
    }
    .main-wrapper .date {
        text-align: right;
        color: rgb(187,187,187) !important;
        padding-right: 25px;
        font-weight: bold;
    }
    .main-wrapper .compa {
        color: rgb(187,187,187) !important;
        font-weight: bold;
        padding-left: 0;
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
    .main-wrapper .projects-section .item {
    margin-bottom: 15px;
    }

    #skillset .item {
    display: -webkit-inline-box;
    } 
    .row1 {
        margin-right: 0px;
        margin-left: 0px;
        display: -webkit-inline-box;
    }

    @media (min-width: 300px){
        .sidebar-wrapper {
            width: 33.33333333%;
        }
        .main-wrapper {
            width: 66.66666667%;
        }
    }

    .main-wrapper .section h2 {
        align-items: center;
    }
</style>
</head>
<body>
    <div id="resulta" class="">
        <div class="row1">
            <div class="sidebar-wrapper">
                <div class="setcolor profile-container" style="background: rgb(58, 91, 135);">
                    <h1 id="fullName" class="name">MUSTAPHA RAMADAN</h1>
                    <h3 id="tit" class="tagline">Full Stack Developer</h3>
                    <div  class="row">
                        <div id="cader-imag" class="profile-image">
                            <img id="imagPro" class="rounded mx-auto d-block" style="width: 60%; border-radius: 50%;border: 7px solid;border-color: honeydew;" src="data:image/jpeg;base64,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">
                        </div>
                    </div>
                </div><!--//profile-container-->
                <div class="contact-container container-block">
                    <div class="contact-list">
                        <div class="c55" style="color: rgb(58, 91, 135);">
                            <svg class="svg-inline--fa fa-house" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="house" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M575.8 255.5C575.8 273.5 560.8 287.6 543.8 287.6H511.8L512.5 447.7C512.5 450.5 512.3 453.1 512 455.8V472C512 494.1 494.1 512 472 512H456C454.9 512 453.8 511.1 452.7 511.9C451.3 511.1 449.9 512 448.5 512H392C369.9 512 352 494.1 352 472V384C352 366.3 337.7 352 320 352H256C238.3 352 224 366.3 224 384V472C224 494.1 206.1 512 184 512H128.1C126.6 512 125.1 511.9 123.6 511.8C122.4 511.9 121.2 512 120 512H104C81.91 512 64 494.1 64 472V360C64 359.1 64.03 358.1 64.09 357.2V287.6H32.05C14.02 287.6 0 273.5 0 255.5C0 246.5 3.004 238.5 10.01 231.5L266.4 8.016C273.4 1.002 281.4 0 288.4 0C295.4 0 303.4 2.004 309.5 7.014L564.8 231.5C572.8 238.5 576.9 246.5 575.8 255.5L575.8 255.5z"></path></svg>
                            <!-- <icon class="fa-solid fa-home"></icon> Font Awesome fontawesome.com -->
                            <span id="address">N°2 RUE OUISSALNE HAY SAFE KARIA SALE</span>
                        </div>
                        <div class="c55" style="color: rgb(58, 91, 135);">
                            <svg class="svg-inline--fa fa-envelope" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="envelope" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M464 64C490.5 64 512 85.49 512 112C512 127.1 504.9 141.3 492.8 150.4L275.2 313.6C263.8 322.1 248.2 322.1 236.8 313.6L19.2 150.4C7.113 141.3 0 127.1 0 112C0 85.49 21.49 64 48 64H464zM217.6 339.2C240.4 356.3 271.6 356.3 294.4 339.2L512 176V384C512 419.3 483.3 448 448 448H64C28.65 448 0 419.3 0 384V176L217.6 339.2z"></path>
                            </svg>
                            <span id="email">mtpha53@gmail.com</span>
                        </div>
                        <div class="c55" style="color: rgb(58, 91, 135);">
                            <svg class="svg-inline--fa fa-phone" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M511.2 387l-23.25 100.8c-3.266 14.25-15.79 24.22-30.46 24.22C205.2 512 0 306.8 0 54.5c0-14.66 9.969-27.2 24.22-30.45l100.8-23.25C139.7-2.602 154.7 5.018 160.8 18.92l46.52 108.5c5.438 12.78 1.77 27.67-8.98 36.45L144.5 207.1c33.98 69.22 90.26 125.5 159.5 159.5l44.08-53.8c8.688-10.78 23.69-14.51 36.47-8.975l108.5 46.51C506.1 357.2 514.6 372.4 511.2 387z"></path>
                            </svg>
                            <span id="tel">+212622634943</span>
                        </div>
                        <div class="c55" style="color: rgb(58, 91, 135);">
                            <svg class="svg-inline--fa fa-linkedin-in" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M100.3 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.6 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.3 61.9 111.3 142.3V448z"></path>
                            </svg>
                            <span id="linkedin">www.linkedin.com/in/mustapha-ramadan-a95671214</span>
                        </div>
                    </div>
                </div>
                
                <div class="languages-container container-block">
                    <h2 class="c55 container-block-title" style="color: rgb(58, 91, 135);">Languages</h2>
                    <div id="seclang" style="display: block;">
                        <div class="lan_lev">
                            <div class="col-xs-6"><span class="lang">Anglais</span></div> 
                            <div class="col-xs-4 col-xs-offset-4" style="display: contents;">
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);"><svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg></span>
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);">
                                    <svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg></span>
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);"><svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg><!-- <icon class="fa-solid fa-circle"></icon> Font Awesome fontawesome.com --></span>
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);"><svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg><!-- <icon class="fa-solid fa-circle"></icon> Font Awesome fontawesome.com --></span><span class="icon-holder" style="padding: 0 3px;color: #bbbbbb; display : flex;"><svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg></span>
                            </div>
                        </div><br/>
                        <div class="lan_lev">
                            <div class="col-xs-6"><span class="lang">Arabe</span></div> 
                            <div class="col-xs-4 col-xs-offset-4" style="display: contents;">
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);">
                                    <svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg>
                                </span>
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);">
                                    <svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg>
                                </span>
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);">
                                    <svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg>
                                </span>
                                <span class="c55 icon-holder" style="padding: 0px 3px; color: rgb(58, 91, 135);">
                                    <svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg>
                                </span>
                                <span class="icon-holder" style="padding: 0 3px;color: #bbbbbb;">
                                    <svg class="svg-inline--fa fa-circle" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M512 256C512 397.4 397.4 512 256 512C114.6 512 0 397.4 0 256C0 114.6 114.6 0 256 0C397.4 0 512 114.6 512 256z"></path></svg>
                                </span>
                            </div>
                        </div><br/>
                    </div>
                </div>
                
                <div class="interests-container container-block">
                    <h2 class="c55 container-block-title" style="color: rgb(58, 91, 135);">Interests</h2>
                    <ul id="hobbies" class="list-unstyled interests-list"><li>Sport</li><li>Music</li><li>Coding</li></ul>
                </div><!--//interests-->
                
            </div><!--//sidebar-wrapper-->
            
            <div class="main-wrapper" >
                <section style="white-space: normal;" class="section">
                    <h2 class="c55 section-title" style="color: rgb(58, 91, 135);"><span class="setcolor icon-holder" style="background: rgb(58, 91, 135);"><svg class="svg-inline--fa fa-user" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg=""><path fill="currentColor" d="M224 256c70.7 0 128-57.31 128-128s-57.3-128-128-128C153.3 0 96 57.31 96 128S153.3 256 224 256zM274.7 304H173.3C77.61 304 0 381.6 0 477.3c0 19.14 15.52 34.67 34.66 34.67h378.7C432.5 512 448 496.5 448 477.3C448 381.6 370.4 304 274.7 304z"></path></svg><!-- <i class="fa-solid fa-user"></i> Font Awesome fontawesome.com --></span>Profile</h2>
                    <div style="box-sizing: border-box;" class="summary">
                        <p id="Profile">Etudiant en cycle d’ingénierie, je suis passionné par les nouvelles technologies informatique, la conception, et le développement de plusieurs applications durant mon cursus académiques.J’ai de la chance de développer mes compétences au sein de plusieurs entreprises dans le cadre d’approfondir mes connaissances dans différents langages de programmation.</p>
                    </div><!--//summary-->
                </section><!--//section-->
                
                <!-- Education -->
                <section style="white-space: normal;" class="section projects-section">
                    <h2 class="c55 section-title" style="color: rgb(58, 91, 135);">
                        <span class="setcolor icon-holder" style="background: rgb(58, 91, 135);">
                            <svg class="svg-inline--fa fa-box-archive" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="box-archive" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                <path fill="currentColor" d="M32 432C32 458.5 53.49 480 80 480h352c26.51 0 48-21.49 48-48V160H32V432zM160 236C160 229.4 165.4 224 172 224h168C346.6 224 352 229.4 352 236v8C352 250.6 346.6 256 340 256h-168C165.4 256 160 250.6 160 244V236zM480 32H32C14.31 32 0 46.31 0 64v48C0 120.8 7.188 128 16 128h480C504.8 128 512 120.8 512 112V64C512 46.31 497.7 32 480 32z"></path>
                            </svg>
                        </span>
                        <span>Education</span>
                    </h2>

                    <div id="secEdu">
                        <div class="item">
                            <div class="meta">
                                <div class="upper-row">
                                    <h2 class="job-title">Bac+2 development</h2>
                                </div>
                                <div class="upper-row">
                                    <div class="col-xs-7 compa">ISTA</div>
                                    <div class="col-xs-5 date">2021</div>
                                </div><br/>
                            </div>
                            <div class="text-wrap"><p>vjvhhj g dtdtty ty yft ytfyu rtfyu t</p></div>
                        </div>
                        <div class="item">
                            <div class="meta">
                                <div class="upper-row">
                                    <h2 class="job-title">Licence Droit Arabe</h2>
                                </div>
                                <div class="upper-row">
                                    <div class="col-xs-7 compa">UVM5</div>
                                    <div class="col-xs-5 date">2017</div>
                                </div>
                            </div>
                            <div class="text-wrap"><p>xwfdsdrtser yuyu iiop oio iopiop ioi àoi,o opoi ùoùi op</p></div>
                        </div>
                        <div class="item">
                            <div class="meta">
                                <div class="upper-row"><h2 class="job-title">bac svt</h2></div>
                                <div class="upper-row">
                                    <div class="col-xs-7 compa">motanabi</div>
                                    <div class="col-xs-5 date">2013</div>
                                </div>
                            </div>
                            <div class="text-wrap"><p>rcgcf gv f hghg hghg  guy gy k</p></div>
                        </div>
                    </div>
                </section>

                <!-- experiences -->
                <section class="section experiences-section">
                    <h2 class="c55 section-title" style="color: rgb(58, 91, 135);"><span class="setcolor icon-holder" style="background: rgb(58, 91, 135);"><svg class="svg-inline--fa fa-briefcase" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="briefcase" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M320 336c0 8.844-7.156 16-16 16h-96C199.2 352 192 344.8 192 336V288H0v144C0 457.6 22.41 480 48 480h416c25.59 0 48-22.41 48-48V288h-192V336zM464 96H384V48C384 22.41 361.6 0 336 0h-160C150.4 0 128 22.41 128 48V96H48C22.41 96 0 118.4 0 144V256h512V144C512 118.4 489.6 96 464 96zM336 96h-160V48h160V96z"></path></svg><!-- <i class="fa-solid fa-briefcase"></i> Font Awesome fontawesome.com --></span>Experiences</h2>
                    <div id="secExp"><div class="item"><div class="meta"><div class="upper-row"><h2 class="job-title">Developper</h2></div><div class="upper-row"><div class="compa">Google, California</div><div class="date">2023-01 - 2023-03</div></div></div><div class="text-wrap"><p>gdgdcfdrecdtct  t fgfu hg gfjhyu g gyufyu g  g yg i </p></div></div><div class="item"><div class="meta"><div class="upper-row"><h2 class="job-title">Manager</h2></div><div class="upper-row"><div class="compa">OCP, Khribga</div><div class="date">2023-01 - 2023-03</div></div></div><div class="text-wrap"><p>nvn, h jkg jgjk hj h h j hkh khkl </p></div></div></div>                  
                </section>
                
                <!-- skills -->
                <section class="skills-section section">
                    <h2 class="c55 section-title" style="color: rgb(58, 91, 135);"><span class="setcolor icon-holder" style="background: rgb(58, 91, 135);"><svg class="svg-inline--fa fa-rocket" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="rocket" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg=""><path fill="currentColor" d="M156.6 384.9L125.7 353.1C117.2 345.5 114.2 333.1 117.1 321.8C120.1 312.9 124.1 301.3 129.8 288H24C15.38 288 7.414 283.4 3.146 275.9C-1.123 268.4-1.042 259.2 3.357 251.8L55.83 163.3C68.79 141.4 92.33 127.1 117.8 127.1H200C202.4 124 204.8 120.3 207.2 116.7C289.1-4.07 411.1-8.142 483.9 5.275C495.6 7.414 504.6 16.43 506.7 28.06C520.1 100.9 516.1 222.9 395.3 304.8C391.8 307.2 387.1 309.6 384 311.1V394.2C384 419.7 370.6 443.2 348.7 456.2L260.2 508.6C252.8 513 243.6 513.1 236.1 508.9C228.6 504.6 224 496.6 224 488V380.8C209.9 385.6 197.6 389.7 188.3 392.7C177.1 396.3 164.9 393.2 156.6 384.9V384.9zM384 167.1C406.1 167.1 424 150.1 424 127.1C424 105.9 406.1 87.1 384 87.1C361.9 87.1 344 105.9 344 127.1C344 150.1 361.9 167.1 384 167.1z"></path></svg><!-- <i class="fa-solid fa-rocket"></i> Font Awesome fontawesome.com --></span>Skills &amp; Proficiency</h2>
                    <div id="skillset">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-6"><h6 class="level-title">Coding</h6></div>
                                    <div class="col-xs-4 col-xs-offset-4">
                                        <div class="progress" style="height: 15px; width: 190px; margin-top: 3px;">
                                            <div class="progress-bar setcolor" role="progressbar" style="width: 80%; background: rgb(58, 91, 135);" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-6"><h6 class="level-title">Fighting</h6></div>
                                <div class="col-4">
                                    <div class="progress" style="height: 15px; width: 190px; margin-top: 3px;">
                                        <div class="progress-bar setcolor" role="progressbar" style="width: 80%; background: rgb(58, 91, 135);" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row justify-content-around">
                                <div class="col-6"><h6 class="level-title">c++/python</h6></div>
                                    <div class="col-4">
                                        <div class="progress" style="height: 15px; width: 190px; margin-top: 3px;">
                                            <div class="progress-bar setcolor" role="progressbar" style="width: 80%; background: rgb(58, 91, 135);" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </section>
            </div>
        </div> 
    </div>
    <style>    
    </style>
</body>
</html>
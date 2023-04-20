/* window.onbeforeunload = function(e) {
    return 0;
 }; */


/* const { fill } = require("lodash"); */

 //function blur for inputs
 let Jdata, jsonData;
 function blurinputs(){
    $('input, select, textarea, #getFile,button,.jEQib,#addexp').on("change",function() {
        try{
            Jdata = {
                title: ""+$('#title').val(),
                fullName: $('#name').val()+" "+$('#lastName').val(),
                image : $('#Dimage').attr('src'),
                date_birth: $('#date_birth').val(),
                gender : $('input[name=gender]:checked').val(),
                situation : $('#situation').find(":selected").val(),
                country : $('#country').find(":selected").val(),
                hobbies : $('#hobbies').val(),
                my_profile : $('#my_profile').val(),
                address : $('#address').val(),
                Adcity : $('#Adcity').val(),
                phone1 : $('#phone1').val(),
                phone2 : $('#phone2').val(),
                email : $('#email').val(),
                linkedin : $('#linkedin').val(),
                education : [],
                experience : [],
                skills : [],
                languages : [],
                templet : $('#templet').find(":selected").val(),
                color : $("#color").val(),
                font_fami : $('#font_fami').find(":selected").val(),
                size_font: $('#size_font').find(":selected").val(),
            };  
            var certificate = $('input[name="certificate[]"]').map(function() { return $(this).val(); }).get();
            $.each(certificate, function(key, value) {
                var edu = {};
                edu.certificate = $('input[name="certificate[]"]').map(function() { return $(this).val(); }).get()[key];
                edu.institute_name = $('input[name="institute_name[]"]').map(function() { return $(this).val(); }).get()[key];
                edu.Specialty_name = $('input[name="Specialty_name[]"]').map(function() { return $(this).val(); }).get()[key];
                edu.date_obtaining = $('select[name="date_obtaining[]"]').map(function() { return $(this).find(":selected").val(); }).get()[key];
                edu.description = $('textarea[name="description[]"]').map(function() { return $(this).val(); }).get()[key];
                Jdata.education.push(edu);
            });
            var namJob = $('input[name="namJob[]"]').map(function() { return $(this).val(); }).get();
            $.each(namJob, function(key, value) {
                var expr = {};
                expr.namJob = $('input[name="namJob[]"]').map(function() { return $(this).val(); }).get()[key];
                expr.institution = $('input[name="institution[]"]').map(function() { return $(this).val(); }).get()[key];
                expr.startdate = $('input[name="startdate[]"]').map(function() { return $(this).val(); }).get()[key];
                expr.enddate = $('input[name="enddate[]"]').map(function() { return $(this).val(); }).get()[key];
                expr.city_exp = $('input[name="city_exp[]"]').map(function() { return $(this).val(); }).get()[key];
                expr.description = $('textarea[name="otherinfo[]"]').map(function() { return $(this).val(); }).get()[key];
                Jdata.experience.push(expr);
            });
            var skil = $('input[name="skill[]"]').map(function() { return $(this).val(); }).get();
            $.each(skil, function(key, value) {
                var ski={};
                ski.skill = $('input[name="skill[]"]').map(function() { return $(this).val(); }).get()[key];
                ski.level = $('input[name="level_skills[]"]').map(function() { return $(this).val(); }).get()[key];
                Jdata.skills.push(ski);
            });
            var language = $('input[name="language[]"]').map(function() { return $(this).val(); }).get();
            $.each(language, function(key, value) {
                var lan={};
                lan.language = $('input[name="language[]"]').map(function() { return $(this).val(); }).get()[key];
                lan.level = $('input[name="level_lang[]"]').map(function() { return $(this).val(); }).get()[key];
                Jdata.languages.push(lan);
            });
            jsonData = JSON.stringify(Jdata);
            console.log(jsonData);
            datatosvg();
        }
        catch(erre){
            console.log(erre)
        }
            
    });
}

//json to svg
function datatosvg(){
    var cv = JSON.parse(jsonData);
    try{
        const iframe = document.getElementById("cv_templet").contentDocument;
        //delet image old
        var imagPro = iframe.getElementById("imagPro");  
        imagPro.src = cv.image;
        if(cv.image!= 0){iframe.getElementById("cader-imag").hidden=false;}
        //img_svg.prop('hidden', false);
        iframe.getElementById("fullName").textContent = cv.fullName;
        iframe.getElementById("email").textContent = cv.email;
        var ph2="";if(cv.phone2) ph2=' / '+cv.phone2;
        iframe.getElementById("tel").textContent = cv.phone1+ ph2;
        iframe.getElementById("address").textContent = cv.address;
        iframe.getElementById("linkedin").textContent = cv.linkedin;
        iframe.getElementById("Profile").textContent = cv.my_profile;
        
        var secEdu = iframe.getElementById('secEdu'),count=0;
        $.each(cv.education, function(key, value){
            if(count==0)$('#cv_templet').contents().find('#secEdu').html("");;
            var sedu = `<div class="item"><div class="meta"><div class="upper-row"><h2 class="job-title">`+this.certificate+` `+this.Specialty_name+`</h2></div><div class="upper-row"><div class="compa">`+this.institute_name+`</div><div class="date">`+this.date_obtaining+`</div></div></div><div class="text-wrap"><p>`+this.description+`</p></div></div>`;
            $('#cv_templet').contents().find('#secEdu').append(sedu);
            count++;
        });

        count=0;
        //experience
        $.each(cv.experience, function(key, value){
            if(count==0)$('#cv_templet').contents().find('#secExp').html("");
            var sedu = `<div class="item"><div class="meta"><div class="upper-row"><h2 class="job-title">`+this.namJob+`</h2></div><div class="upper-row"><div class="compa">`+this.institution+`, `+this.city_exp+`</div><div class="date">`+this.startdate+` - `+this.enddate+`</div></div></div><div class="text-wrap"><p>`+this.description+`</p></div></div>`;
            $('#cv_templet').contents().find('#secExp').append(sedu);
            count++;
        });

        count=0;
        var cercles ="";
        //lang
        $.each(cv.languages, function(key, value){
            if(count==0)$('#cv_templet').contents().find('#seclang').html("");
            for (let index = 0; index < level.length; index++) {
                if(index<=level.indexOf(this.level))
                    //cercles +='<span class="c55 icon-holder" style="padding: 0 3px;"><icon class="fa-solid fa-circle"></icone></span>';
                    cercles +='<div class="setcolor" style="padding: 0 3px; height: 15px; width: 15px; border-radius: 50%;"></div>';
                else
                    cercles +='<div class="" style="padding: 0 3px; background-color: #bbbbbb; height: 15px; width: 15px; border-radius: 50%;"></div>';
            }
            var sedu = `<div class="lan_lev"><div class="col-xs-6"><span class="lang">`+this.language+`</span></div> <div class="col-xs-4" style="display: -webkit-inline-box;">`+cercles+`</div></div>`;
            $('#cv_templet').contents().find('#seclang').append(sedu);
            count++;
            cercles="";
        });

        //Skills
        count = 0;
        $.each(cv.skills, function(key, value){
            if(count==0)$('#cv_templet').contents().find('#skillset').html("");
            if(level.indexOf(this.level)==0) cercles= (level.indexOf(this.level)+1)*20;
            else cercles= (level.indexOf(this.level)+1)*20;
            var sedu = `<div class="container">
            <div class="row justify-content-around">
                <div class="col-6"><h6 class="level-title">`+this.skill+`</h6></div>
                <div class="col-4">
                    <div class="progress" style="height: 15px; width: 190px; margin-top: 3px;">
                        <div class="progress-bar setcolor" role="progressbar" style="width: `+cercles+`%;" aria-valuenow="`+cercles+`" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>`;
            $('#cv_templet').contents().find('#skillset').append(sedu);
            count++;
            console.log(this.skill);
        });


        //hobbies
        /* let hobbie = cv.hobbies.split(',');
        console.table(hobbie); */
        $.each(cv.hobbies.split(','), function(key, value){
            if(this==cv.hobbies.split(',')[0])$('#cv_templet').contents().find('#hobbies').html("");
            $('#cv_templet').contents().find('#hobbies').append('<li>'+this+'</li>');
        });

        //design
        $("input[name='templet']").val(cv.templet) ;
        $("input[name='color']").val(cv.color);
        $("input[name='font_fami']").val(cv.font_fami);
        $("input[name='size_font']").val(cv.size_font);

        //chage font color cv
        var pa= iframe.getElementsByTagName("page");
        $.each(pa, function(key, value){
            this.style.font = cv.font;
        });
        $.each(iframe.getElementsByClassName("setcolor"), function(key, value){
            this.style.background = cv.color;
        });
        $.each(iframe.getElementsByClassName("c55"), function(key, value){
            this.style.color = cv.color;
        });
        //iframe.getElementsByClassName("setcolor").setAttributeNS(null, 'fill', cv.color);
    }
    catch(err)
    {
        console.log(err)
    }
}


var show=false;
$(document).ready(function(){
    blurinputs();
    //photo
    $("#getFile").on("change",function(e){
        var fileExtension = ['jpeg', 'jpg', 'png', 'svg', 'bmp','tiff','webp','tif'];
        let str = this.value.split('.');
        if (fileExtension.indexOf(str[1].toLowerCase()) == -1) {
            alert("Le fichier que vous avez choisi est incorrect !\ns'il vous plaît sélectionner une image ");
            obj.value = null;
        }
        else {
            var img = document.getElementById("Dimage");  
            // e.files contient un objet FileList
            const [picture] = e.target.files;
            // L'objet FileReader
            var reader = new FileReader();
            // L'événement déclenché lorsque la lecture est complète
            reader.onload = function (e) {
                // On change l'URL de l'image (base64)
                img.src = e.target.result;
            }
            // On lit le fichier "picture" uploadé
            reader.readAsDataURL(picture);
            blurinputs();    
        }
    });

    //model cv
    $("#seletemp").on("change",function(){ if(this.value) $("#cv_templet").attr('src', '/cv/'+this.value );});

    //Gender & Situation Family

    var dataM = ["Celibate", "Divorced","Married", "Widower"],dataF = ["Single","Divorced", "Married", "widow"];
    $("input[name=gender]").on("change", function(){
        if($(this).val()=='male'){
            $('#situation').html("");
            $('#situation').append('<option value=""></option>');
            for(var item of dataM)
                $('#situation').append('<option value="' + item + '">' + item + '</option>');
        }
        else{
            $('#situation').html("");
            $('#situation').append('<option value=""></option>');
            for(var item of dataF)
                $('#situation').append('<option value="' + item + '">' + item + '</option>');
        }
    });
    
    var gender = $("input[name=gender]");
    if(gender[0].checked){
        for(var item of dataM)
        $('#situation').append('<option value="' + item + '">' + item + '</option>');
    }
    else {
        for(var item of dataF)
        $('#situation').append('<option value="' + item + '">' + item + '</option>');
    }
    //***********************************************************
    // Contact

    const t4 = ['address','city','email','phone1','certificate[]','institute_name[]','Specialty_name[]','date_obtaining[]','namJob[]'];
    for(let x of t4){
        $("input[name='"+x+"']").prop('required', true);
    }
    //hidde option
    $(".set").each(function(item){$(this).slideUp();$(this).prev().find("button.ikHWQs").html('<ion-icon name="chevron-down-outline"></ion-icon>');});
    $(".remove").on("click",function(event){$(this).parents("div.fnXcmN:first").remove(); blurinputs();});

    //show etu
    $(".showetu .ikHWQs").on("click",function(){
        if(show){
            $(".set").each(function(){$(this).css("display", "none"); $(this).prev().find("button.ikHWQs").html('<ion-icon name="chevron-down-outline"></ion-icon>')});
            $(this).parent().next().slideDown();
            $(this).next().children("button.ikHWQs:first").html('<ion-icon name="chevron-up-outline"></ion-icon>');
            show=false;
        }
        else{
            $(this).parent().next().slideUp();
            $(this).next().children("button.ikHWQs:first").html('<ion-icon name="chevron-down-outline"></ion-icon>');
            show=true;
        }
    });

    //edu
    for(var p=d.getFullYear();p>=d.getFullYear()-65;p--){
        $(".date_ob").each(function(){ $(this).append('<option value="' + p + '">' + p + '</option>');});
    }
    for(var é=1; é<=a; é++){
        $(".input_etu"+é).on("change", function inp_change(){
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            str= clasInp[0].value+" "+clasInp[2].value+" at "+clasInp[1].value+","+clasInp[3].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(str);
        });
    }

    //exp
    var dn = String(new Date().getUTCFullYear()) + "-" + String(new Date().getMonth() + 1).padStart(2, "0");
    $("input[name='enddate[]'], input[name='startdate[]']").each(function(item){$(this).attr({"max" : dn})});
    //onchange inputs
    for(var é=1; é<=expid; é++){
        $(".input_exp"+é).on("change", function inp_change(){
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            if($(this).attr("name")=="startdate[]"){  clasInp[3].value="";clasInp[3].min=""+clasInp[2].value;}
            const d= new Date(clasInp[2].value),m=new Date(clasInp[3].value);
            var s=d.toLocaleString("en", { month: "short"  })+"."+d.toLocaleString("en", { year: "numeric"  });
            var e = m.toLocaleString("en", { month: "short"  })+"."+d.toLocaleString("en", { year: "numeric"  });
            str= clasInp[0].value+" "+clasInp[1].value+", "+s+" - "+e+" at "+clasInp[4].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(str);
        });
    }

    //skills
    for(var é=0; é<=skillid; é++){
        $(".input_skill"+é).on("change", function(){
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            //pass value to input hidden
            clasInp[1].value=level[clasInp[2].value];
            clasInp[2].value = level.indexOf(clasInp[1].value);
            clasInp[2].nextElementSibling.innerText=clasInp[1].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(clasInp[0].value+" : "+clasInp[1].value);
        });
    }

    //languages
    for(var é=0; é<=skillid; é++){
        $(".input_lang"+é).on("change", function inp_change(){
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            clasInp[1].value=level[clasInp[2].value];
            clasInp[2].value = level.indexOf(clasInp[1].value);
            clasInp[2].nextElementSibling.innerText=clasInp[1].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(clasInp[0].value+" : "+clasInp[1].value);
        });
    }
})


 //etud
var a=0;
const d= new Date();
$(document).ready(function () {
    $("#addEtu").on("click", function(){
        a++;
        var id=a+"etu",idsel=a+"sel";
        var exp=`<div class="fnXcmN">
                    <div class="jEQib eSepnq">
                        <p class="ignblp showetu" id="`+id+`">Unknown,</p>
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
                            <div class="col-md-6 py-1"><label class="labels">Certificate Name</label><input name="certificate[]" class = "form-control cert_name input_etu`+a+`" pattern="^[a-zA-Z0-9 -+]{3,30}$" required><span style="color:red;"></span></div>
                            <div class="col-md-6 py-1"><label class="labels">Institution Name</label><input name="institute_name[]" class = "form-control inst_name input_etu`+a+`" pattern="^[a-zA-Z0-9 -]{3,30}$" required><span style="color:red;"></span></div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 py-1"><label class="labels">Specialty</label><input name="Specialty_name[]" class = "form-control specialty input_etu`+a+`" pattern="^[a-zA-Z0-9 -]{3,30}$" required><span style="color:red;"></span></div>
                            <div class="col-md-6 py-1"><label class="labels">Date Obtaining</label><select id="`+idsel+`" name="date_obtaining[]" class= "form-control date_ob input_etu`+a+`" required><option></option></select><span style="color:red;"></span></div>
                        </div>
                        <div class="col-md-12 py-1"><label class="labels">Description</label><textarea name="description[]" maxlength="130" class ="form-control other_info"></textarea><span style="color:red;"></span></div>
                    </div>
                    <div class="dxqSpv"></div>
                </div>`;
        $(".set").each(function(item){$(this).slideUp();$(this).prev().find("button.ikHWQs").html('<ion-icon name="chevron-down-outline"></ion-icon>');});
        show=false;
        $('#setEtu').append(exp);
        for(var p=d.getFullYear();p>=d.getFullYear()-65;p--){
            $("#"+idsel).append('<option value="' + p + '">' + p + '</option>');
        }
        $("#"+id).on("click",showEl);
        $(".remove").on("click",remove);
        //onchange inputs
        $(".input_etu"+a).on("change", function inp_change(){
            if($(this).attr("name")=="date_obtaining[]"){if($(this).val=="")$(this).next().text("invalide, Please check this input");else $(this).next().text("");}
            else{
                var VAL = $(this).val();
                var cert = new RegExp("^[a-zA-Z0-9 -+]{3,30}$");
                if(cert.test(VAL)){
                    $(this).next().text("");
                }
                else{$(this).next().text("invalide, Please check this input");}
            }
            //
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            str= clasInp[0].value+" "+clasInp[2].value+" at "+clasInp[1].value+","+clasInp[3].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(str);
        });
        blurinputs();
    });
});

//remove 
function remove(event){$(this).parents("div.fnXcmN:first").remove(); blurinputs();}
//show etu
function showEl(){
    if(show){
        $(".set").each(function(){$(this).css("display", "none"); $(this).prev().find("button.ikHWQs").html('<ion-icon name="chevron-down-outline"></ion-icon>')});
        $(this).parent().next().slideDown();
        $(this).next().children("button.ikHWQs:first").html('<ion-icon name="chevron-up-outline"></ion-icon>');
        show=false;
    }
    else{
        $(this).parent().next().slideUp();
        $(this).next().children("button.ikHWQs:first").html('<ion-icon name="chevron-down-outline"></ion-icon>');
        show=true;
    }
}

//exp
var expid=0;
$(document).ready(function () {
    $("#addexp").on("click", function(){
        expid++;
        var id=expid+"exp";
        var exp=`<div class="fnXcmN">
                    <div class="jEQib eSepnq">
                        <p class="ignblp showetu" id="`+id+`">Unknown,</p>
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
                            <div class="col-md-6 py-1" ><label class="labels">Job post</label><input name="namJob[]" class = "form-control input_exp`+expid+`" required></div>
                            <div class="col-md-6 py-1"><label class="labels">Company name or Institution Name</label><input name="institution[]" class = "form-control input_exp`+expid+`" required></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 py-1"><label class="labels">Start date </label><input type="month" min="1970-01" name="startdate[]" class = "form-control input_exp`+expid+`" required></div>
                            <div class="col-md-4 py-1"><label class="labels">End date</label><input type="month" min="1970-01" name="enddate[]" class = "form-control input_exp`+expid+`" required></div>
                            <div class="col-md-4 py-1" ><label class="labels">City</label><input name="city_exp[]" class = "form-control input_exp`+expid+`" required></div>
                        </div>
                        <div class="col-md-12 py-1"><input type="checkbox" name="currently_here[]" ><label class="labels" for="currently_here[]"> I currently work here</label></div>
                        <div class="col-md-12 py-1"><label class="labels">Description</label><textarea name="otherinfo[]" maxlength="120" class = "form-control"></textarea><span style="color:red;"></span></div>
                    </div>   
                    <div class="dxqSpv"></div>         
                </div>`;
        $(".set").each(function(item){$(this).slideUp();$(this).prev().find("button.ikHWQs").html('<ion-icon name="chevron-down-outline"></ion-icon>');});
        show=false;
        $("#setExp").append(exp);
        var dn = String(new Date().getUTCFullYear()) + "-" + String(new Date().getMonth() + 1).padStart(2, "0");
        $("input[name='enddate[]'], input[name='startdate[]']").each(function(item){$(this).attr({"max" : dn})});
        $("#"+id).on("click",showEl);
        $(".remove").on("click",remove);
        //onchange inputs
        $(".input_exp"+expid).on("change", function inp_change(){
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            if($(this).attr("name")=="startdate[]"){  clasInp[3].value="";clasInp[3].min=""+clasInp[2].value;}
            const d= new Date(clasInp[2].value),m=new Date(clasInp[3].value);
            var s=d.toLocaleString("en", { month: "short"  })+"."+d.toLocaleString("en", { year: "numeric"  });
            var e = m.toLocaleString("en", { month: "short"  })+"."+d.toLocaleString("en", { year: "numeric"  });
            str= clasInp[0].value+" "+clasInp[1].value+", "+s+" - "+e+" at "+clasInp[4].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(str);
        });
        blurinputs();
    });
});

//add skill
var level=["Beginner","Moderate","Good","Very good","Fluent"];
var skillid=0;
$(document).ready(function () {
    $("#addskill").on("click", function(){
        skillid++;
        var id=skillid+"skill";
        var exp=`<div class="fnXcmN">
                    <div class="jEQib eSepnq">
                        <p class="ignblp showetu" id="`+id+`">Unknown,</p>
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
                            <div class="col-md-6 py-1"><label class="labels">Skill</label><input name="skill[]" class="form-control input_skill`+skillid+`" ></div>
                            <div class="col-md-6 py-1"><label for="level" class="col-md-12">Level</label>
                                <div class="row py-1 flex-nowrap">
                                    <input type="hidden" name="level_skills[]" class="form-control input_skill`+skillid+`" >
                                    <input type="range" style="width:57%;padding-left: 20px;" size="1" class="form-range input_skill`+skillid+`" min="0" max="4" step="1" value="0">
                                    <span class="col-md-5" id="show-sk-lev`+skillid+`">Beginner</span>
                                </div>
                            </div> 
                        </div>  
                    </div>`;
        $(".set").each(function(item){$(this).slideUp();$(this).prev().find("button.ikHWQs").html('<ion-icon name="chevron-down-outline"></ion-icon>');});
        show=false;
        $("#setSkill").append(exp);
        $("#"+id).on("click",showEl);
        $(".remove").on("click",remove);
        //onchange inputs
        $(".input_skill"+skillid).on("change", function inp_change(){
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            clasInp[1].value=level[clasInp[2].value];
            $("#show-sk-lev"+skillid).html(clasInp[1].value);
            str= clasInp[0].value+" : "+clasInp[1].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(str);
        });
        blurinputs();
    });
});

//langue
var langid=0;
$(document).ready(function () {
    $("#addlang").on("click", function(){
        langid++;
        var id=langid+"lang";
        var exp=`<div class="fnXcmN">
                    <div class="jEQib eSepnq">
                        <p class="ignblp showetu" id="`+id+`">Unknown,</p>
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
                            <div class="col-md-6 py-1"><label class="labels">Langue</label><input name="language[]" class="form-control input_lang`+langid+`" required></div>
                            <div class="col-md-6 py-1"><label for="level" class="col-md-12">Level</label>
                                <div class="row py-1 flex-nowrap">
                                    <input type="hidden" name="level_lang[]" class="form-control input_lang`+langid+`" required>
                                    <input type="range" style="width:57%;padding-left: 20px;"  size="1" class="form-range input_lang`+langid+`" min="0" max="4" step="1" value="0">
                                    <span class="col-md-5" id="show-lang-lev`+langid+`">Beginner</span>
                                </div> 
                            </div>  
                        </div>
                    </div>`;
        $(".set").each(function(item){$(this).slideUp();$(this).prev().find("button.ikHWQs").html('<ion-icon name="chevron-down-outline"></ion-icon>');});
        show=false;
        $("#setLang").append(exp);
        $("#"+id).on("click",showEl);
        $(".remove").on("click",remove);
        //onchange inputs
        $(".input_lang"+langid).on("change", function inp_change(){
            var clasInp=$("."+$(this).attr('class').split(' ').pop()),str='';
            clasInp[1].value=level[clasInp[2].value];
            $("#show-lang-lev"+langid).html(clasInp[1].value);
            str= clasInp[0].value+" : "+clasInp[1].value;
            $(this).parents(".fnXcmN").find("p.showetu").text(str);
        });
        blurinputs();
    });
});


//buttons next & back
let i=8;
$(document).ready(function () {
    $("#next_btn").on("click", function(){
        if(i<92){i+=14;}
        else{i=92;}
        document.getElementById(i-14).style.display = "none";
        document.getElementById(i).style.display = "block";
        if(i==93){document.getElementById('progressbar').style.width = "100%";}
        else document.getElementById('progressbar').style.width = i+"%";
        butoonN_BarProp();
    });

    $("#back_btn").on("click", function(){
        if(i>8){i-=14;}
        else{i=8;}
        document.getElementById(i).style.display = "block";
        document.getElementById(i+14).style.display = "none";
        document.getElementById('progressbar').style.width = i+"%";
        butoonN_BarProp();
    });
});

function butoonN_BarProp(){
    if(i>8 && i<92){$("#next_btn").css("display", "block");$("#back_btn").css("display", "block");$("#save-btn").css("display", "none");}
    else if(i==8){$("#next_btn").css("display", "block");$("#back_btn").css("display", "none");$("#save-btn").css("display", "none");}
    else if(i==92){$("#next_btn").css("display", "none");$("#back_btn").css("display", "block");$("#save-btn").css("display", "block");}
}

function display(j){
    var k=i;
    i=j;
    document.getElementById(k).style.display = "none";
    document.getElementById(i).style.display = "block";
    document.getElementById('progressbar').style.width = j+"%";
    butoonN_BarProp();
}


//regex
 //contact
 $(document).ready(function(){
    //$("input[name='address']").rules("add", { required: true, regex:"^[a-zA-Z0-9 -+°]{5,60}$" })
    const t4 = ['address','city','email','phone1'];
    for(let item in t4){
        $(item).attr('required', true);
    }
    

    $(".contact").change(function(){
        var chek;
        switch($(this).attr('name')){
            case 'address' : chek = new RegExp("^[a-zA-Z0-9 -+°]{5,60}$");break;
            case 'city' : chek = new RegExp("^[a-zA-Z ]{3,20}$");break;
            case 'email' : chek = new RegExp("^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$");break;
            case 'phone1' : chek = new RegExp("^[0-9 ()-,+]{10,13}$");break;
            case 'phone2' : chek = new RegExp("^[0-9 ()-,+]{0,13}$");break;
            case 'linkedin' : chek = new RegExp("^((www|\w\w)\.)?linkedin.com/(\/|\/([\w#!:.?+=&%@!\-\/]))?");break;
        }
        if(chek.test($(this).val())){$(this).next().text("");}
        else{$(this).next().text("invalide, Please check this input");}
    });
});

/******************************************************* */



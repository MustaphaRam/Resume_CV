<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Http\Requests\cv_request;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Language;
use App\Models\Skills;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Validator;
use App\Models\Cv;
use App\Models\Design;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\SessionGuard;
use Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ViewErrorBag;
use League\CommonMark\Extension\CommonMark\Node\Block\ListItem;
use Nette\Utils\ArrayList;
use Barryvdh\DomPDF\Facade\Pdf;

class cv_controller1 extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    function create()
    {
        $countries = array('Afghanistan','Åland Islands','Albania','Algeria','American Samoa','Andorra','Angola','Anguilla','Antarctica','Antigua and Barbuda','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia, Plurinational State of','Bonaire, Sint Eustatius and Saba','Bosnia and Herzegovina','Botswana','Bouvet Island','Brazil','British Indian Ocean Territory','Brunei Darussalam','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon','Canada','Cape Verde','Cayman Islands','Central African Republic','Chad','Chile','China','Christmas Island','Cocos (Keeling) Islands','Colombia','Comoros','Congo','Congo, the Democratic Republic of the','Cook Islands','Costa Rica','Côte d\'Ivoire','Croatia','Cuba','Curaçao','Cyprus','Czech Republic','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Falkland Islands (Malvinas)','Faroe Islands','Fiji','Finland','France','French Guiana','French Polynesia','French Southern Territories','Gabon','Gambia','Georgia','Germany','Ghana','Gibraltar','Greece','Greenland','Grenada','Guadeloupe','Guam','Guatemala','Guernsey','Guinea','Guinea-Bissau','Guyana','Haiti','Heard Island and McDonald Mcdonald Islands','Holy See (Vatican City State)','Honduras','Hong Kong','Hungary','Iceland','India','Indonesia','Iran, Islamic Republic of','Iraq','Ireland','Isle of Man','Israel','Italy','Jamaica','Japan','Jersey','Jordan','Kazakhstan','Kenya','Kiribati','Korea, Democratic People\'s Republic of','Korea, Republic of','Kuwait','Kyrgyzstan','Lao People\'s Democratic Republic','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macao','Macedonia, the Former Yugoslav Republic of','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Martinique','Mauritania','Mauritius','Mayotte','Mexico','Micronesia, Federated States of','Moldova, Republic of','Monaco','Mongolia','Montenegro','Montserrat','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Niue','Norfolk Island','Northern Mariana Islands','Norway','Oman','Pakistan','Palau','Palestine, State of','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Pitcairn','Poland','Portugal','Puerto Rico','Qatar','Réunion','Romania','Russian Federation','Rwanda','Saint Barthélemy','Saint Helena, Ascension and Tristan da Cunha','Saint Kitts and Nevis','Saint Lucia','Saint Martin (French part)','Saint Pierre and Miquelon','Saint Vincent and the Grenadines','Samoa','San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Sint Maarten (Dutch part)','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','South Georgia and the South Sandwich Islands','South Sudan','Spain','Sri Lanka','Sudan','Suriname','Svalbard and Jan Mayen','Swaziland','Sweden','Switzerland','Syrian Arab Republic','Taiwan','Tajikistan','Tanzania, United Republic of','Thailand','Timor-Leste','Togo','Tokelau','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Turks and Caicos Islands','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom','United States','United States Minor Outlying Islands','Uruguay','Uzbekistan','Vanuatu','Venezuela, Bolivarian Republic of','Viet Nam','Virgin Islands, British','Virgin Islands, U.S.','Wallis and Futuna','Western Sahara','Yemen','Zambia','Zimbabwe');
        return view('cv.profile',['countries'=>$countries]);
    }

    public function profile()
    {
        $id= Auth::user()->id;
        //$profile =  DB::table('profile')->find($id);
        $profile =  Profile::where('user_id', Auth::user()->id)->first();
        $user = DB::table('users')->select('name', 'email')->find($id);
        //dd($profile);
        return view('cv.image',['profile'=>$profile, 'user'=>$user]);
    }

   public function home()
   {
        /* $id = Auth::user()->id;
        $listcv= Cv::all()->where('user_id',$id)->sortDesc(); */
        if (Auth::check()) {
           /*  $user = User::with(['user_cvs' => function ($query) {
                $query->select('id', 'title','created_at','user_id');
            }])->find(Auth::id());
            return response()->json($user); */
            return view('cv.home',['cvs'=>Auth::user()->user_cvs]);
            //return view('cv.home',['cvs'=>$user]);
        }
   }

   public function cv_templet1()
   {
        return view('cv.Templet.cv_templet1');
   }
   
   public function cv_templet2()
   {
        return view('cv.Templet.cv_templet2');
   }

   //create cv

   public function create_Cv(Request $request) 
   {
        $request->validate([ 
            'title'        => ['required','string','max:30']
        ]);
        

        if($request->input('title'))
            return $this->form_cv($request->title);
        else
            return $this->home();
   }

   public function form_cv($title)
   {
       $countries = array('Afghanistan','Åland Islands','Albania','Algeria','American Samoa','Andorra','Angola','Anguilla','Antarctica','Antigua and Barbuda','Argentina','Armenia','Aruba','Australia','Austria','Azerbaijan','Bahamas','Bahrain','Bangladesh','Barbados','Belarus','Belgium','Belize','Benin','Bermuda','Bhutan','Bolivia, Plurinational State of','Bonaire, Sint Eustatius and Saba','Bosnia and Herzegovina','Botswana','Bouvet Island','Brazil','British Indian Ocean Territory','Brunei Darussalam','Bulgaria','Burkina Faso','Burundi','Cambodia','Cameroon','Canada','Cape Verde','Cayman Islands','Central African Republic','Chad','Chile','China','Christmas Island','Cocos (Keeling) Islands','Colombia','Comoros','Congo','Congo, the Democratic Republic of the','Cook Islands','Costa Rica','Côte d\'Ivoire','Croatia','Cuba','Curaçao','Cyprus','Czech Republic','Denmark','Djibouti','Dominica','Dominican Republic','Ecuador','Egypt','El Salvador','Equatorial Guinea','Eritrea','Estonia','Ethiopia','Falkland Islands (Malvinas)','Faroe Islands','Fiji','Finland','France','French Guiana','French Polynesia','French Southern Territories','Gabon','Gambia','Georgia','Germany','Ghana','Gibraltar','Greece','Greenland','Grenada','Guadeloupe','Guam','Guatemala','Guernsey','Guinea','Guinea-Bissau','Guyana','Haiti','Heard Island and McDonald Mcdonald Islands','Holy See (Vatican City State)','Honduras','Hong Kong','Hungary','Iceland','India','Indonesia','Iran, Islamic Republic of','Iraq','Ireland','Isle of Man','Israel','Italy','Jamaica','Japan','Jersey','Jordan','Kazakhstan','Kenya','Kiribati','Korea, Democratic People\'s Republic of','Korea, Republic of','Kuwait','Kyrgyzstan','Lao People\'s Democratic Republic','Latvia','Lebanon','Lesotho','Liberia','Libya','Liechtenstein','Lithuania','Luxembourg','Macao','Macedonia, the Former Yugoslav Republic of','Madagascar','Malawi','Malaysia','Maldives','Mali','Malta','Marshall Islands','Martinique','Mauritania','Mauritius','Mayotte','Mexico','Micronesia, Federated States of','Moldova, Republic of','Monaco','Mongolia','Montenegro','Montserrat','Morocco','Mozambique','Myanmar','Namibia','Nauru','Nepal','Netherlands','New Caledonia','New Zealand','Nicaragua','Niger','Nigeria','Niue','Norfolk Island','Northern Mariana Islands','Norway','Oman','Pakistan','Palau','Palestine, State of','Panama','Papua New Guinea','Paraguay','Peru','Philippines','Pitcairn','Poland','Portugal','Puerto Rico','Qatar','Réunion','Romania','Russian Federation','Rwanda','Saint Barthélemy','Saint Helena, Ascension and Tristan da Cunha','Saint Kitts and Nevis','Saint Lucia','Saint Martin (French part)','Saint Pierre and Miquelon','Saint Vincent and the Grenadines','Samoa','San Marino','Sao Tome and Principe','Saudi Arabia','Senegal','Serbia','Seychelles','Sierra Leone','Singapore','Sint Maarten (Dutch part)','Slovakia','Slovenia','Solomon Islands','Somalia','South Africa','South Georgia and the South Sandwich Islands','South Sudan','Spain','Sri Lanka','Sudan','Suriname','Svalbard and Jan Mayen','Swaziland','Sweden','Switzerland','Syrian Arab Republic','Taiwan','Tajikistan','Tanzania, United Republic of','Thailand','Timor-Leste','Togo','Tokelau','Tonga','Trinidad and Tobago','Tunisia','Turkey','Turkmenistan','Turks and Caicos Islands','Tuvalu','Uganda','Ukraine','United Arab Emirates','United Kingdom','United States','United States Minor Outlying Islands','Uruguay','Uzbekistan','Vanuatu','Venezuela, Bolivarian Republic of','Viet Nam','Virgin Islands, British','Virgin Islands, U.S.','Wallis and Futuna','Yemen','Zambia','Zimbabwe');
       //dd($countries, $title);
       return view('cv.create1' , ['countries'=>$countries,'title'=>$title] );
       //return view('cv.createCV', ['title'=>$title]);
   }

   public function store_Cv(cv_request $request)
   {
        //dd($request->all());
        //$req=$this->validate($request,[]);
        //cv
        try{
            $cv = new Cv();
            $cv->title = $request->title;
            $cv->presentation = "";
            $cv->user_id = Auth::user()->id;
            $cv->save();

            //profile
            $profile = new Profile();
            $profile->name = $request->name;
            $profile->lastname = $request->lastname;
            $profile->date_birth = $request->date_birth;
            $profile->gender = $request->gender;
            $profile->situation_family = $request->situation_family;
            $profile->hobbies = $request->hobbies;        
            $profile->country = $request->country;
            $profile->my_profile = $request->my_profile;
            $profile->user_id = Auth::user()->id;
            //test request
            //dd($request->all());

            if($request->hasfile('image_profile'))
            {
                $image = $request->file('image_profile');
                $imagename = date("YmdHis"). $image->hashName();
                $img = Image::make($image->getRealPath())->resize(350, 350)->save(public_path('/images/'. $imagename));
                $profile->image_profile = $imagename;
                //$profile->save();
            }
            //$profile->save();

            $cont = new Contact();
            $cont->address = $request->address;
            $cont->phone1 = $request->phone1;
            $cont->phone2 = $request->phone2;
            $cont->email = $request->email;
            $cont->linkedin = $request->linkedin;
            $cont->city = $request->city;
            $cont->cv_id = $cv->id;
            //$cont->save();

            //Education
            $listEdu[] = new Education();
            foreach($request->input('certificate','institute_name','Specialty_name','date_obtaining','description') as $key => $value){
                $edu = new Education();
                $edu->certificate=  $request->input('certificate')[$key];
                $edu->institute_name = $request->input('institute_name')[$key];
                $edu->Specialty_name = $request->input('Specialty_name')[$key];
                $edu->date_obtaining = $request->input('date_obtaining')[$key];
                $edu->description = $request->input('description')[$key];
                $edu->cv_id = $cv->id;
                $listEdu[]=$edu;
                //$edu->save();
            }

            //Experience
            $listexp[] = new Education();
            foreach($request->input('namJob','institution','startdate','enddate','city_exp','otherinfo') as $key => $value){
                $exp = new Experience();			
                $exp->name_post =  $request->input('namJob')[$key];
                $exp->name_company =  $request->input('institution')[$key];
                $exp->start_date =  \Carbon\Carbon::createFromFormat('Y-m', $request->input('startdate')[$key])->toDateTimeString();
                $exp->end_date = \Carbon\Carbon::createFromFormat('Y-m', $request->input('enddate')[$key])->toDateTimeString();
                $exp->city =  $request->input('city_exp')[$key];
                $exp->description =  $request->input('otherinfo')[$key];
                $exp->cv_id = $cv->id;
                $listexp[] = $exp;
                //$exp->save();
            }
            
            //skill
            $listskill[] = new Education();
            foreach($request->input('skill','level_skills') as $key => $value){
                $skill = new Skills();
                $skill->name =  $request->input('skill')[$key];
                $skill->level = $request->input('level_skills')[$key];
                $skill->cv_id = $cv->id;
                $listskill[]= $skill;
                //$skill->save();
            }
            
            //language
            $listlang[] = new Education();
            foreach($request->input('language','level_lang') as $key => $value){
                $lang = new Language();
                $lang->language_name =  $request->input('language')[$key];
                $lang->level = $request->input('level_lang')[$key];
                $lang->cv_id = $cv->id;
                $listlang[]= $lang;
                //$lang->save();
            }

            //design
            $design = new Design();
            $design->templet = $request->input('templet');
            $design->color = $request->input('color');
            $design->size_font = $request->input('size_font');
            $design->family_font = $request->input('font_fami');
            $design->cv_id = $cv->id;
            //$design->save();

            $cv->profile = $profile;
            $cv->contact = $cont;
            $cv->education = $listEdu;
            $cv->experience = $listexp;
            $cv->skills = $listlang;
            $cv->language = $listlang;
            $cv->design = $design;
            //dd($cv);
            $cv->save();
            //session()->flash("success", "cv has saved");
            //return response()->json(['success'=> true]);
            //dd($cont,$listEdu,$listexp, $listskill, $listlang);
            return $this->showMessage($cv->title,"cv Saved!");
            //dd($cv,$cont,$listEdu,$listexp,$listskill,$listlang);
        }
        catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
   }
   public function test(){
    return view('cv.Templet.test');
   }
   public function test2(){
    return view('cv.Templet.test2');
   }
   public function DownPDF()
   {
        //$pdf = App::make('dompdf.wrapper');
        //$pdf->loadHTML($html->html);
        /* $pdf = Pdf::loadView('cv.Templet.test'); */
        
        //$pdf=PDF::set_option( 'dpi' , '72' );
        $pdf=PDF::set_option('defaultFont', 'Helvetica');
        $pdf->setPaper('A4', 'portrait');
        $pdf->set_option( 'isRemoteEnabled', true );
        $pdf->loadView('cv.Templet.test');
        $pdf->set_option( 'dpi' , '90' );
        $pdf->render();
        return $pdf->download("cv-dowload.pdf");
        //return response()->json(['html' => $html]);
   }

   public function dashboard(){
        return view('cv.Dashboard.dashboard');
   }

    public function showMessage($query,$message){
        //dd($query,$message);
        if($query)
            return $this->form_cv($query)->with(['success'=>$message]);
            //return back()->with(['success'=>$message, 'title'=>$query]);
        else
            return back()->with(['fail','something went wrong','title'=>$query]); 
   }
}

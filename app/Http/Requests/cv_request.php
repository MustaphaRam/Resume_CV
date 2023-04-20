<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class cv_request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            
            //validation profile
            'name'             => ['required','string','min:3','max:50'],
            'lastname'         => ['required','string','min:3','max:50'],
            'date_birth'       => ['required','max:10'],
            'gender'           => ['required','in:male,female','max:6'],
            'image_profile'    => ['nullable','image','mimes:jpeg,png,jpg,svg,bmp,tiff,webp,tif','max:1000','dimensions:min_width=100,min_height=200','dimensions:max_width=2000,max_height=2000'],
            'situation_family' => ['required','in:Single,Divorced,Married,widow,Celibate,Widower','max:10'],
            'country'          => ['required','string','max:20'],
            'my_profile'       => ['nullable','string','max:200'],
            'hobbies'          => ['nullable','string','max:60'],

            //validation contact
            'address'        => ['required','string','max:60' , 'min:5'],
            'city' => ['required','string','max:20'],
            'phone1' => ['required','regex:/^[0-9 ()-.,+]{10,13}+$/','max:13'],
            'phone2'        => ['nullable','regex:/^[0-9 ()-.,+]{0,13}+$/','max:13'],
            'email' => ['required','email'],
            'linkedin'=> ['nullable','string','regex:/^((www|\w\w)\.)?linkedin\.com\/in\/([a-zA-Z0-9-]{5,30})\/?/','max:70'],

            //validation Education
            'certificate' => ['array','required','min:1'],
            'certificate.*' => ['required','string','min:3','max:30'],
            'institute_name' => ['array','required','min:1'],
            'institute_name.*' => ['required','string','min:3','max:30'],
            'Specialty_name' => ['array','required','min:1'],
            'Specialty_name.*' => ['required','string','min:3','max:30'],
            'date_obtaining' => ['array','required','min:1'],
            'date_obtaining.*' => ['required','string','min:4'],
            'description' => ['array','min:0'],
            'description.*' => ['nullable','string','max:130'],

            //validation Experience
            'namJob' => ['array','required','min:1'],
            'namJob.*' => ['required','string','min:3','max:30'],
            'institution' => ['array','required','min:1'],
            'institution.*' => ['required','string','min:3','max:30'],
            'startdate' => ['array','required','min:1'],
            'startdate.*' => ['required','date'],
            'enddate' => ['array','required','min:1'],
            'enddate.*' => ['required','date','after:start_date'],
            'city_exp' => ['array','min:1'],
            'city_exp.*' => ['required','string','max:30'],
            'otherinfo' => ['array','min:0'],
            'otherinfo.*' => ['nullable','string','max:130'],

            //validation skills
            'skill' => ['array','required','min:0'],
            'skill.*' => ['nullable','string','min:3','max:20'],
            'level_skills' => ['array','required','min:0'],
            'level_skills.*' => ['nullable','string','min:3','max:15'],

            //validation languages
            'language' => ['array','required','min:1'],
            'language.*' => ['required','string','min:3','max:15'],
            'level_lang' => ['array','required','min:1'],
            'level_lang.*' => ['required','string','min:3','max:15'],

            //validation design
            'templet' => ['nullable','string','max:15'],
            'color' => ['nullable','string','max:15'],
            'size_font' => ['nullable','string', "max:3"],
            'font_fami' => ['nullable','string','max:25']
        ];
    }
}

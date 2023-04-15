<?php

namespace App\Http\Controllers\cv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cv;
use Illuminate\Support\Facades\DB;


class cv_controller extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

   //list cvs
   public function index() 
   {
       if(Auth::user()->is_admin){
           $listcv = Cv::all()->sortDesc();
        }
        else{
            $id = Auth::user()->id;
            $listcv= Cv::all()->where('user_id',$id);
        }
        return view('cv.index', ['listcv' => $listcv,'title'=>'list cv']);
   }
   
   //form creation cv
   public function create() 
   {
      return view('cv.create',['title'=>'Create cv']);
   }
    
   //Enregister un cv
   public function store(Request $request) 
   {
        $request->validate([ 
            'title'        => ['required','string','max:150'],
            'presentation' => ['required','string','max:400'],
        ]);
        $cv = new Cv();
        $cv->title = $request->input('title');
        $cv->presentation = $request->input('presentation');
        $cv->user_id = Auth::user()->id;
        $cv->save();
        return $this->showMessage($cv,"cv is updated successfully");
   }
   
   //permet de récupérer un cv puis de le mettre dans un le formulaire
   public function edit($id) 
   {
      $cv = Cv::find($id);
      $this->authorize('update', $cv);
      return view('cv.edit', ['cv' => $cv,'title'=>'edite cv']);
   }
   
   //permet de modifier un cv
   public function update(Request $request, $id) 
   {
        $request->validate([ 
            'title'        => ['required','string','max:150'],
            'presentation' => ['required','string','max:400'],
        ]);
       $cv = Cv::find($id);
       $this->authorize('update', $cv);
       $cv->titre = $request->input('titre');
       $cv->presentation = $request->input('presentation');
       $cv->save();
       return $this->showMessage($cv,"cv is updated successfully");
   }


   public function details($id) 
   {
       $cv = Cv::find($id);
     return view('cv.details', ['cv' => $cv,'title'=>'Details cv']);
   }
   
   //permet de supprimer un cv
   public function destroy( $id) 
   {
      $cv = Cv::find($id);
      $this->authorize('delete', $cv);
      $cv->delete();
      return redirect('cvs');
      $this->showMessage($cv,"cv is updated successfully");
   }

   public function showMessage($query,$message)
   {
    if($query){
        return back()->with('success',$message);
    }
    else{
        return back()->with('fail','something went wrong');
    }
   }
}

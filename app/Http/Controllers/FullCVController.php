<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\Competence;
use App\Education;
use App\Rujukan;
use App\Strength;
use App\Appointed_position;
use App\Cocurricular;
use DB;

class FullCVController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


  
 public function index($id)
    {
        //$people = Person::where('id',$id)->get();
		$people = Person::find($id);
		$person_id =$id;
		$competence = Competence::find($person_id);
		$education = Education::where('person_id',$person_id)->first();
		$rujukan = Rujukan::all();
		$strength = Strength::where('person_id',$person_id)->first();
		$app = Appointed_position::where('person_id',$person_id)->first();
		$cocu = Cocurricular::where('person_id',$person_id)->first();

       // $company = Company::find($company_id);
        //$activetab= "pda";
       return view('fullcv.master',compact('id','people','competence','education','rujukan','strength','app','cocu'));
        //return view('fullcv.master',compact('companypdas','activetab','product_id', 'company_id','company'));
    }

	
}
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
use Auth;

class GenerateCVController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


  
 public function index()
    {
        //$people = Person::where('id',$id)->get();
        $u_id= Auth::user()->id;
		$person = Person::where('user_id',$u_id)->first();
		
       // $company = Company::find($company_id);
        //$activetab= "pda";
       return view('gencv',compact('id','person','competence','education','rujukan','strength','app','cocu'));
       }

	
}
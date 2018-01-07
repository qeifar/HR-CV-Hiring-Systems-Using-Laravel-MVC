<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Strength;
use App\Person;
use Auth;
use DB;

class StrengthsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('strengths.index', []);
	}

	public function create(Request $request)
	{
	    return view('strengths.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$strength = Strength::findOrFail($id);
	    return view('strengths.add', [
	        'model' => $strength	    ]);
	}

	public function show(Request $request, $id)
	{
		$strength = Strength::findOrFail($id);
	    return view('strengths.show', [
	        'model' => $strength	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];
		$u_id= Auth::user()->id;
$select = "SELECT a.id,a.strength_description,a.person_id";
		$presql = " FROM strengths a 
		
		
		INNER JOIN people b
            ON a.person_id = b.id 
			WHERE b.user_id LIKE '%".$u_id."%' 
		";
		
		//$select = "SELECT *,1,2 ";
		//$presql = " FROM strengths a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE strength_description LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.id) c".$presql);
		//print_r($qcount);
		$count = $qcount[0]->c;

		$results = DB::select($sql);
		$ret = [];
		foreach ($results as $row) {
			$r = [];
			foreach ($row as $value) {
				$r[] = $value;
			}
			$ret[] = $r;
		}

		$ret['data'] = $ret;
		$ret['recordsTotal'] = $count;
		$ret['iTotalDisplayRecords'] = $count;

		$ret['recordsFiltered'] = count($ret);
		$ret['draw'] = $_GET['draw'];

		echo json_encode($ret);

	}


	public function update(Request $request) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
		$u_id= Auth::user()->id;
		$person = Person::where('user_id',$u_id) ->first();
		$strength = null;
		if($request->id > 0) { $strength = Strength::findOrFail($request->id); }
		else { 
			$strength = new Strength;
		}
	    if($person->id == $request->person_id){

	    		
			    $strength->id = $request->id?:0;
				
	    		
					    $strength->strength_description = $request->strength_description;
		
	    		
					    $strength->person_id = $request->person_id;
		
	    	    //$strength->user_id = $request->user()->id;
	    $strength->save();

	    return redirect('/strengths');
		}
		else{
	print_r('<h1>1 ACCOUNT FOR 1 PERSON ONLY. PLEASE REMEMBER YOUR PERSON ID!</h1>');
}

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$strength = Strength::findOrFail($id);

		$strength->delete();
		return "OK";
	    
	}

	
}
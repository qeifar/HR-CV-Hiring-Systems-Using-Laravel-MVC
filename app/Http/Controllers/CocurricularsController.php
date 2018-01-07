<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
Use App\Person;
use App\Cocurricular;

use DB;

class CocurricularsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('cocurriculars.index', []);
	}

	public function create(Request $request)
	{
	    return view('cocurriculars.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$cocurricular = Cocurricular::findOrFail($id);
	    return view('cocurriculars.add', [
	        'model' => $cocurricular	    ]);
	}

	public function show(Request $request, $id)
	{
		$cocurricular = Cocurricular::findOrFail($id);
	    return view('cocurriculars.show', [
	        'model' => $cocurricular	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];
		$u_id= Auth::user()->id;
		$select = "SELECT a.id,a.position,a.association,a.achievement,a.person_id";
		$presql = " FROM cocurriculars a INNER JOIN people b
            ON a.person_id = b.id 
			WHERE b.user_id LIKE '%".$u_id."%' 
		";
		if($_GET['search']['value']) {	
			$presql .= " WHERE a.position LIKE '%".$_GET['search']['value']."%' ";
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
		$cocurricular = null;
		if($request->id > 0) { $cocurricular = Cocurricular::findOrFail($request->id); }
		else { 
			$cocurricular = new Cocurricular;
		}
	    
 if($person->id == $request->person_id){
	    		
			    $cocurricular->id = $request->id?:0;
				
	    		
					    $cocurricular->appointedID = $request->appointedID;
		
	    		
					    $cocurricular->educationId = $request->educationId;
		
	    		
					    $cocurricular->position = $request->position;
		
	    		
					    $cocurricular->association = $request->association;
		
	    		
					    $cocurricular->achievement = $request->achievement;
		
	    	    //$cocurricular->user_id = $request->user()->id;
	    $cocurricular->save();

	    return redirect('/cocurriculars');
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
		
		$cocurricular = Cocurricular::findOrFail($id);

		$cocurricular->delete();
		return "OK";
	    
	}

	
}
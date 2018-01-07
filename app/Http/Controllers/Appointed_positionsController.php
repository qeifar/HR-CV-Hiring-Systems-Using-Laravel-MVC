<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Appointed_position;
use Auth;
Use App\Person;
use DB;

class Appointed_positionsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('appointed_positions.index', []);
	}

	public function create(Request $request)
	{
	    return view('appointed_positions.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$appointed_position = Appointed_position::findOrFail($id);
	    return view('appointed_positions.add', [
	        'model' => $appointed_position	    ]);
	}

	public function show(Request $request, $id)
	{
		$appointed_position = Appointed_position::findOrFail($id);
	    return view('appointed_positions.show', [
	        'model' => $appointed_position	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];
		$u_id= Auth::user()->id;

		$select = "SELECT a.id,a.position,a.association,a.session,a.person_id";
		$presql = " FROM appointed_positions a 
		INNER JOIN people b
            ON a.person_id = b.id 
			WHERE b.user_id LIKE '%".$u_id."%' 
			";

		if($_GET['search']['value']) {	
			$presql .= " WHERE position LIKE '%".$_GET['search']['value']."%' ";
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
		$appointed_position = null;
		if($request->id > 0) { $appointed_position = Appointed_position::findOrFail($request->id); }
		else { 
			$appointed_position = new Appointed_position;
		}
	    
 if($person->id == $request->person_id){

	    		
			    $appointed_position->id = $request->id?:0;
				
	    		
					    $appointed_position->position = $request->position;
		
	    		
					    $appointed_position->association = $request->association;
		
	    		
					    $appointed_position->session = $request->session;
		
	    	    //$appointed_position->user_id = $request->user()->id;
	    $appointed_position->save();

	    return redirect('/appointed_positions');
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
		
		$appointed_position = Appointed_position::findOrFail($id);

		$appointed_position->delete();
		return "OK";
	    
	}

	
}
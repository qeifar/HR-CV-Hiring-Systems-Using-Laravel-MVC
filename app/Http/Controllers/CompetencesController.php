<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Competence;
use Auth;
Use App\Person;
use DB;

class CompetencesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('competences.index', []);
	}

	public function create(Request $request)
	{
	    return view('competences.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$competence = Competence::findOrFail($id);
	    return view('competences.add', [
	        'model' => $competence	    ]);
	}

	public function show(Request $request, $id)
	{
		$competence = Competence::findOrFail($id);
	    return view('competences.show', [
	        'model' => $competence	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];
		$u_id= Auth::user()->id;

		$select = "SELECT a.id,a.referenceID,a.competence_area,a.competence_description,a.person_id";
		$presql = " FROM competences a 
		INNER JOIN people b
            ON a.person_id = b.id 
			WHERE b.user_id LIKE '%".$u_id."%' 
		";
		if($_GET['search']['value']) {	
			$presql .= " WHERE person_id LIKE '%".$_GET['search']['value']."%' ";
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
		$competence = null;
		if($request->id > 0) { $competence = Competence::findOrFail($request->id); }
		else { 
			$competence = new Competence;
		}
	    if($person->id == $request->person_id){

	    		
			    $competence->id = $request->id?:0;
				
	    		
					    $competence->person_id = $request->person_id;
		
	    		
					    $competence->referenceID = $request->referenceID;
		
	    		
					    $competence->competence_area = $request->competence_area;
		
	    		
					    $competence->competence_description = $request->competence_description;
		
	    	    //$competence->user_id = $request->user()->id;
	    $competence->save();

	    return redirect('/competences');
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
		
		$competence = Competence::findOrFail($id);

		$competence->delete();
		return "OK";
	    
	}

	
}
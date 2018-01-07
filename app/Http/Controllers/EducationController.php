<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Education;
use App\Person;
use DB;

class EducationController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('education.index', []);
	}

	public function create(Request $request)
	{
	    return view('education.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$education = Education::findOrFail($id);
	    return view('education.add', [
	        'model' => $education	    ]);
	}

	public function show(Request $request, $id)
	{
		$education = Education::findOrFail($id);
	    return view('education.show', [
	        'model' => $education	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];
		$u_id= Auth::user()->id;

		//$select = "SELECT *,1,2 ";
		//$presql = " FROM educations a ";
		$select = "SELECT a.id,a.year_start,a.year_end,a.edu_level,a.edu_institute,
		a.edu_result,a.person_id";
		$presql = " FROM educations a 
		
		
		INNER JOIN people b
            ON a.person_id = b.id 
			WHERE b.user_id LIKE '%".$u_id."%' 
		";
		if($_GET['search']['value']) {	
			$presql .= " WHERE year_start LIKE '%".$_GET['search']['value']."%' ";
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
		$education = null;
		if($request->id > 0) { $education = Education::findOrFail($request->id); }
		else { 
			$education = new Education;
		}
	    
if($person->id == $request->person_id){
	    		
			    $education->id = $request->id?:0;
				
	    		
					    $education->year_start = $request->year_start;
		
	    		
					    $education->year_end = $request->year_end;
		
	    		
					    $education->edu_level = $request->edu_level;
		
	    		
					    $education->edu_institute = $request->edu_institute;
		
	    		
					    $education->edu_result = $request->edu_result;
		
	    		
					    $education->person_id = $request->person_id;
		
	    	    //$education->user_id = $request->user()->id;
	    $education->save();

	    return redirect('/education'); }
		else{
	print_r('<h1>1 ACCOUNT FOR 1 PERSON ONLY. PLEASE REMEMBER YOUR PERSON ID!</h1>');
}

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$education = Education::findOrFail($id);

		$education->delete();
		return "OK";
	    
	}

	
}
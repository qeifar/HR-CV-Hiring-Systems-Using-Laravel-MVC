<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;
use App\Competence;

use DB;

class AddmeController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('addme.index', []);
	}

	public function create(Request $request)
	{
	    return view('addme.add', [
	        []
	    ]);
		
	}

	public function edit(Request $request, $id)
	{
		/*
		$person = Person::findOrFail($id);
	    return view('carian.add', [
	        'model' => $person	    ]);
			*/
	}

	public function show(Request $request, $id)
	{
		/*
		$person = Person::findOrFail($id);
	    return view('carian.show', [
	        'model' => $person	    ]);
	*/
	}

	public function grid(Request $request)
	{
		/*
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT a.id,a.person_name,b.competence_description";
		$presql = " FROM people a, competences b";
		if($_GET['search']['value']) {	
			$presql .= " WHERE a.person_name OR b.competence_description LIKE '%".$_GET['search']['value']."%' ";
		}
		//, a.id, a.person_name, b.competence_description 
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;
//$sql = "SELECT P.id, P.person_name, C.competence_description FROM PEOPLE P, COMPETENCES C
//WHERE P.id = C.person_id LIMIT ".$start.",".$len;

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
*/
	}


	public function update(Request $request) {
	    //
	    //$this->validate($request, [
	      //  'user_id' => 'unique:people',
	    //]);
		$u_id= Auth::user()->id;
		
		$person = null;
		if($request->id > 0) { $person = Person::findOrFail($request->id); }
		else { 
			$person = new Person;
		}
	    

	    		
			    $person->id = $request->id?:0;
				
	    		
					    $person->person_name = $request->person_name;
		
	    		
					    $person->person_address = $request->person_address;
		
	    		
					    $person->person_email = $request->person_email;
		
	    		
					    $person->person_contact = $request->person_contact;
		
	    		
					    $person->objective = $request->objective;
		
	    		
					    $person->age = $request->age;
		
	    		
					    $person->date_of_birth = $request->date_of_birth;
		
	    		
					    $person->place_of_birth = $request->place_of_birth;
		
	    		
					    $person->nationality = $request->nationality;
		
	    		
					    $person->gender = $request->gender;
		
	    		
					    $person->marital_status = $request->marital_status;
		
	    	    $person->user_id = $u_id;
	    $person->save();

	    return redirect('/addme');
		

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		/*
		$person = Person::findOrFail($id);

		$person->delete();
		return "OK";
	    */
	}

	
}
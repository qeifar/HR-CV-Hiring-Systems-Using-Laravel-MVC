<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Person;

use DB;

class PeopleController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{


	    $person = Person::where('user_id',Auth::user()->id) ->get();
		return view('people.index',compact('person'));
   
		///return view('people.index', []);
	}

	public function create(Request $request)
	{
	    return view('people.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$person = Person::findOrFail($id);
	    return view('people.add', [
	        'model' => $person	    ]);
	}

	public function show(Request $request, $id)
	{
		$person = Person::findOrFail($id);

		if($user = Auth::user()){
		return view('people.show', [
	        'model' => $person	    ]);
		}
		else{
			return redirect('/');

		}

	    
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];
		$u_id= Auth::user()->id;

		$select = "SELECT *,1,2 ";
		$presql = " FROM people a WHERE a.user_id LIKE '%".$u_id."%' ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE person_name LIKE '%".$_GET['search']['value']."%' ";
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
	    /*
	    $this->validate($request, [
	        'user_id' => 'unique:people',
	    ]);*/
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

	    return redirect('/people');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$person = Person::findOrFail($id);

		$person->delete();
		return "OK";
	    
	}

	
}
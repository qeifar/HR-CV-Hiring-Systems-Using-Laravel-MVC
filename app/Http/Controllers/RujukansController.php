<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Rujukan;
use App\Person;
use Auth;
use App\Competence;

use DB;

class RujukansController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('rujukans.index', []);
	}

	public function create(Request $request)
	{
	    return view('rujukans.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$rujukan = Rujukan::findOrFail($id);
	    return view('rujukans.add', [
	        'model' => $rujukan	    ]);
	}

	public function show(Request $request, $id)
	{
		$rujukan = Rujukan::findOrFail($id);
	    return view('rujukans.show', [
	        'model' => $rujukan	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];
$u_id= Auth::user()->id;
		//$select = "SELECT *,1,2 ";
		//$presql = " FROM rujukans a ";
		$select = "SELECT a.id,a.references_name,a.references_contact,a.references_detail";
		$presql = " FROM rujukans a 
			INNER JOIN competences b
		ON b.referenceID=a.id
		INNER JOIN people c
            ON b.person_id = c.id 
			WHERE c.user_id LIKE '%".$u_id."%' 
			
		";


		if($_GET['search']['value']) {	
			$presql .= " WHERE references_name LIKE '%".$_GET['search']['value']."%' ";
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
		$rujukan = null;
		if($request->id > 0) { $rujukan = Rujukan::findOrFail($request->id); }
		else { 
			$rujukan = new Rujukan;
		}
	    
if($person->id == $request->person_id){
	    		
			    $rujukan->id = $request->id?:0;
				
	    		
					    $rujukan->references_name = $request->references_name;
		
	    		
					    $rujukan->references_contact = $request->references_contact;
		
	    		
					    $rujukan->references_detail = $request->references_detail;
		
	    	    //$rujukan->user_id = $request->user()->id;
	    $rujukan->save();

	    return redirect('/rujukans');}
		else{
	print_r('<h1>1 ACCOUNT FOR 1 PERSON ONLY. PLEASE REMEMBER YOUR PERSON ID!</h1>');
}


	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$rujukan = Rujukan::findOrFail($id);

		$rujukan->delete();
		return "OK";
	    
	}

	
}
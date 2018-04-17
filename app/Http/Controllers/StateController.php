<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Redirect;
use Session;
use App\State;
use Auth;

class StateController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }
    
    public function createState(Request $request)
    {
    	if($request->ajax()){
            $states = new State;
            $states->state_name = $request->state_name;
            $states->save();
            return response($states);
        }
    }

    public function getState()
    {
    	$states = State::all();
	    return view('state.state',compact('states'));
    }

    public function editState($state_id, Request $request)
    {
        $states = State::where('state_id', $request->state_id)->first();
        return view('state.editState', compact('states'));
    }

    public function updateState(Request $request)
    {
        if($request->ajax()){
            $states = State::where('state_id', $request->state_id)->first();
            $states->save();
            return response($states);
        }       
    }

    public function deleteState($state_id, Request $request)
    {
        $states = Group::find($state_id);
        $states->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('state');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
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
use App\User;
use App\Status;
use Auth;

class StatusController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }
    
    public function createStatus(Request $request)
    {
        if($request->ajax()){
            $status = new Status;
            $status->status = $request->status;
            $status->save();
            return response($status);
        }
    }

    public function getStatus($user_id='',Request $request)
    {
    	$status = Status::all();
    	//$role = Auth::user()->roles()->get();
    	if($user_id && $user_id != '') {
			$admins = User::where('user_id', $user_id)->first();
			//print_r($admins);
		} else {
			$array['user_id'] = 0;
			$admins = (object)$array;
		}
		return view('status.status',compact('status','role','admins'));
    }

    public function editStatus($status_id, Request $request)
    {
        $status = Status::where('status_id', $request->status_id)->first();
        return view('status.editStatus', compact('status'));
    }

    public function updateStatus(Request $request)
    {
        if($request->ajax()){
            $status = Status::where('status_id', $request->status_id)->first();
            $status->status = $request->status;
            $status->save();
            return response($status);
        }       
    }

    public function deleteStatus($status_id, Request $request)
   {
        $status = Status::find($status_id);
        $status->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('status');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

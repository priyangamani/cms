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
use App\SalesActivity;
use Auth;

class SalesActivityController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }

    public function createActivity(Request $request)
    {
        if($request->ajax()){
            $activity = new SalesActivity;
            $activity->activity = $request->activity;
            $activity->save();
            return response($activity);
        }
    }

    public function getActivity()
    {
    	$activities = SalesActivity::all();
	    return view('salesactivity.salesactivity',compact('activities'));
    }

    public function editActivity($activity_id, Request $request)
    {
        $activity = SalesActivity::where('activity_id', $request->activity_id)->first();
        return view('salesactivity.editSalesActivity', compact('activity'));
    }

    public function updateActivity(Request $request)
    {
        if($request->ajax()){
            $activity = SalesActivity::where('activity_id', $request->activity_id)->first();
            $activity->activity = $request->activity;
            $activity->save();
            return response($activity);
        }       
    }

    public function deleteActivity($activity_id, Request $request)
   {
        $activity = SalesActivity::find($activity_id);
        $activity->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('salesactivities');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
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
use App\Branch;
use Auth;

class BranchController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }
    
    public function createBranch(Request $request)
    {
    	if($request->ajax()){
            $branches = new Branch;
            $branches->branch_name = $request->branch_name;
            $branches->save();
            return response($branches);
        }
    }

    public function getBranch()
    {
    	$branches = Branch::all();
	    return view('branch.branch',compact('branches'));
    }

    public function editBranch($branch_id, Request $request)
    {
        $branches = Branch::where('branch_id', $request->branch_id)->first();
        return view('branch.editBranch', compact('branches'));
    }

    public function updateBranch(Request $request)
    {
        if($request->ajax()){
            $branches = Branch::where('branch_id', $request->branch_id)->first();
            $branches->save();
            return response($branches);
        }       
    }

    public function deleteBranch($branch_id, Request $request)
    {
        $branches = Branch::find($branch_id);
        $branches->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('branch');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
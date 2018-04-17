<?php 

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Redirect;
use Session;
use App\User;
use App\Group;
use App\Branch;
use App\State;
use App\Active;
use Alert;
use Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }
    
	public function getAdmin()
	{
        // $admins = User::where('user_id', $user_id)->get();
        $roles = Role::all();
        $branches = Branch::all();
        $states = State::all();
        $actives = Active::all();
        $users = User::role('Admin')->get();
    	return view('admin.admin', compact('users','roles','branches','states','actives','admins'));
    }

    public function editAdmin($user_id, Request $request)
    {
        $users = User::where('user_id', $user_id)->first();
        $roles = Role::all();
        $branches = Branch::all();
        $states = State::all();
        $actives = Active::all();
        return view('admin.editAdmin', compact('users','roles','branches','states','actives'));
    }

    public function updateAdmin(Request $request)
    {
        if($request->ajax()){
            $users = User::where('user_id', $request->user_id)->first();

            $users->state = $request->state;
            $users->branch = $request->branch;
            $users->supervisor = $request->supervisor;
            $users->name = $request->name;
            $users->email = $request->email;
            $users->phonenumber = $request->phonenumber;
            $users->address = $request->address;
            $users->active = $request->active;
            $users->save();
            return response($users);
        }
    }
 
    public function deleteAdmin($user_id, Request $request)
    {
        $users = User::find($user_id);
        $users->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('admin');
    }            

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
    
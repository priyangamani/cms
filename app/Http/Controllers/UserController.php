<?php 

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
use App\Countries;
use App\State;
use App\Active;
use Alert;
use Auth;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }
    
    public function createUser(Request $request)
    {
        if(User::where('email', '=', $request->email)->exists()){
            return response('Email Already Being Used', 500);
        }
        if($request->ajax()){
            $users = new User;
            $users->altuser_id = $request->altuser_id;
            $users->name = $request->name;
            $users->country_of_issue = $request->country_of_issue;
            $users->expiry_date = $request->expiry_date;
            $users->dob = $request->dob;
            $users->phonenumber = $request->phonenumber;
            $users->address = $request->address;
            $users->email = $request->email;
            $users->state = $request->state;
            $users->branch = $request->branch;
            $users->supervisor = $request->supervisor;
            $users->ic_number = $request->ic_number;
            $users->active = $request->active;
            $users->password = bcrypt($request->password);
            $users->save();

            $users->assignRole($request->role);
            return response($users);
		}
	}

	public function getUser()
	{
        $supervisors = User::role('Supervisor')->get();
        $groups = Group::all();
        $users = User::all();
        $countries = Countries::all();
        $roles = Role::all();
        $branches = Branch::all();
        $states = State::all();
        $actives = Active::all();
    	return view('user.user', compact('users','groups','countries','roles','branches','states','actives','supervisors'));
    }

    public function editUser($user_id, Request $request)
    {
        $users = User::where('user_id', $user_id)->first();
        $countries = Countries::all();
        $roles = Role::all();
        $branches = Branch::all();
        $states = State::all();
        $actives = Active::all();
        $supervisors = User::role('Agent')->get();
        return view('user.editUser', compact('users','countries','roles','branches','states','actives','supervisors'));
    }

    public function updateUser(Request $request)
    {
        if($request->ajax()){
            $users = User::where('user_id', $request->user_id)->first();
            $users->country_of_issue = $request->country_of_issue;
            $users->expiry_date = $request->expiry_date;
            $users->dob = $request->dob;
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

    public function deleteUser($user_id, Request $request)
    {
        $users = User::find($user_id);
        $users->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('user');
    }            

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
    

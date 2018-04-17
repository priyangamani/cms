<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Alert;
use Auth;


class RoleController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }
    
    public function index(){
        $roles = Role::all();

        return view('role.index', compact('roles'));
    }

    public function create() {
        $permissions = Permission::all();

        return view('role.create', compact('permissions'));
    }

    public function store(Request $request){
        
        $role = new Role;
        $role->name = $request->name;
        $role->save();

        $permissions = $request['permissions'];

        //Looping thru selected permissions
        foreach ($permissions as $permission) {
            $p = Permission::where('id', '=', $permission)->firstOrFail(); 
         //Fetch the newly created role and assign permission
            $role = Role::where('name', '=', $request->name)->first(); 
            $role->givePermissionTo($p);
        }

        alert()->success('Role Added')->persistent("OK");

        return redirect()->route('roles')
            ->with('flash_message',
             'Role'. $role->name.' added!'); 
    
    }
}

<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Redirect;
use Session;
use App\User;

class UserController extends BaseController
{
	public function postRegisterUser(Request $request)
    {
        $user = User::create([
            'name' => $request->get('name'),
            'phonenumber' => $request->get('phonenumber'),
            'address' => $request->get('address'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'group_id'=>1
            ]);

        return response()->json(['data'=>$user, 'status'=>'ok']);
    }

    public function getUsers(Request $request)
    {
        $users = User::where('group_id',1)->get();

        $userArray = [];

        foreach($users as $user)
        {
            $newuser["user_id"] = $user->user_id;
            $newuser["name"] = $user->name;
            $newuser["phonenumber"] = $user->phonenumber;
            $newuser["address"] = $user->address;
            $newuser["group_id"] = $user->group_id;
            $newuser["email"] = $user->email;

            array_push($userArray, $newuser);
        }

        return response()->json(['data'=>$userArray, 'status'=>'ok']);
    }

    public function getUser($user_id, Request $request)
    {
        $user = User::where('user_id', $user_id)->first();

            $newuser["user_id"] = $user->user_id;
            $newuser["name"] = $user->name;
            $newuser["phonenumber"] = $user->phonenumber;
            $newuser["address"] = $user->address;
            $newuser["group_id"] = $user->group_id;
            $newuser["email"] = $user->email;

        return response()->json(['data'=>$newuser, 'status'=>'ok']);
    }
}
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
use App\Appform;
use Auth;
use Alert;

class DashboardController extends Controller
{
	public function __construct() {
		$this->middleware(['auth','user']); 
	}

	public function getAgentDashboard($user_id, Request $request)
	{
		$totalapplicant = Appform::where('user_id', $user_id)->count();
		$completeapplicant = Appform::where('user_id', $user_id)->where('agenteformstatus', 21)->count();
		$incompleteapplicant = Appform::where('user_id', $user_id)->where('agenteformstatus', 11)->count();
		$pendingapplicant = Appform::where('user_id', $user_id)->where('agenteformstatus', 1)->count();


		if(Auth::user()->hasAnyRole(['Agent','Manager'])){
			$agents = User::where('user_id', $user_id)->first();
			return view('agent.dashboard', compact('agents','totalapplicant','completeapplicant','incompleteapplicant','pendingapplicant'));
		}else{
			Alert::warning('This User Has No Access', 'WARNING');
			return redirect()->back();
		}
		
	}

	public function getRunnerDashboard($user_id, Request $request)
	{
		$totalapplicant = Appform::where('runner_name', $user_id)->count();
		$completeapplicant = Appform::where('runner_name', $user_id)->where('runnereformstatus', 21)->count();
		$incompleteapplicant = Appform::where('runner_name', $user_id)->where('runnereformstatus', 11)->count();
		$pendingapplicant = Appform::where('runner_name', $user_id)->where('runnereformstatus', 1)->count();

		if(Auth::user()->hasAnyRole(['Runner','Manager'])){
			$runners = User::where('user_id', $user_id)->first();
			return view('runner.dashboard', compact('runners','totalapplicant','completeapplicant','incompleteapplicant','pendingapplicant'));
		}else{
			Alert::warning('This User Has No Access', 'WARNING');
			return redirect()->back();
		}
		
	}

	public function getAdminDashboard($user_id, Request $request)
	{
		$totalapplicant = Appform::count();
		$completeapplicant = Appform::where('admineformstatus', 31)->count();
		$pending = Appform::where('admineformstatus', 1)->count();
		$pendingapproval = Appform::where('admineformstatus', 21)->count();
		$incompleteapplicant = $pending + $pendingapproval;
		$pendingapplicant = Appform::where('admineformstatus', 41)->count();

		if(Auth::user()->hasAnyRole(['Admin','Manager'])){
			$admins = User::where('user_id', $user_id)->first();
			return view('admin.dashboard', compact('admins','totalapplicant','completeapplicant','incompleteapplicant','pendingapplicant'));
		}else{
			Alert::warning('This User Has No Access', 'WARNING');
			return redirect()->back();
		}
		
	}

	

	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
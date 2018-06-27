<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Auth;
use App\Appform;

class LoginController extends BaseController
{
   //
     use AuthenticatesUsers;
   /**
    * Where to redirect users after login.
    *
    * @var string
    */
   protected $redirectTo = '/dashboard';
   

   public function getLogin(){
       if (Auth::guard('web')->check()){
           if (Auth::user()->hasRole('Manager')){         

               return redirect()->route('welcome');
           }
           return redirect()->route('user');
       }
       return view('login');
   }

   public function postLogin(Request $request)
   {
       $auth = Auth::guard('web')->attempt(['altuser_id'=>$request->altuser_id,
           'password'=>$request->password]);

       if($auth){
			$request->session()->put('user_id', Auth::user()->user_id);
            if (Auth::user()->hasRole('Manager') || Auth::user()->hasRole('Supervisor')) {
                return redirect()->route('welcome');
            }
            else if (Auth::user()->hasRole('Agent')){
                return redirect()->route('agentdashboard', ['user_id' => Auth::user()->user_id]);
            }
            else if (Auth::user()->hasRole('Admin')){
                return redirect()->route('admindashboard', ['user_id' => Auth::user()->user_id]);
            }
            else if (Auth::user()->hasRole('Runner')){
                return redirect()->route('runnerdashboard', ['user_id' => Auth::user()->user_id]);
            }
             
       }
       
        alert()->error('Wrong Password or ID', 'Try Again!')->persistent("OK");
       

       return redirect()->route('login');
   }

   public function getLogout(){
       Auth::guard('web')->logout();
       
       // Alert::error('Error Message', 'Optional Title');

       return redirect()->route('login');
       // return view('login');
   }

   public function getForgotPassword(){
       return view('forgot-password');
   }
}

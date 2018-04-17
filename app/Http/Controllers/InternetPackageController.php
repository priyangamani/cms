<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Auth;
use Redirect;
use Session;
use App\InternetPackage;
use App\PackType;

class InternetPackageController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }

    public function createIntPackage(Request $request)
    {
        if($request->ajax()){
            $packages = new InternetPackage;
            $packages->internet_package = $request->internet_package;
            $packages->package_type = $request->package_type;
            $packages->save();
            return response($packages);
        }
    }

    public function getIntPackage()
    {
    	$packages = InternetPackage::all();
        $packtypes = PackType::all();
	    return view('internetpackage.internetpackage',compact('packages','packtypes'));
    }

    public function editIntPackage($intpackage_id, Request $request)
    {
        $packages = InternetPackage::where('intpackage_id', $request->intpackage_id)->first();
        $packtypes = PackType::all();
        return view('internetpackage.editInternetPackage', compact('packages','packtypes'));
    }

    public function updateIntPackage(Request $request)
    {
        if($request->ajax()){
            $packages = InternetPackage::where('intpackage_id', $request->intpackage_id)->first();            
            $packages->internet_package = $request->internet_package;
            $packages->package_type = $request->package_type;
            $packages->save();
            return response($packages);
        }       
    }

    public function deleteIntPackage($intpackage_id, Request $request)
   {
        $package = InternetPackage::find($intpackage_id);
        $package->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('intpackage');
    }

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
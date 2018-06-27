<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Auth;
use App\Appform;
use App\Apptype;
use App\DocsUpload;
use App\ExistService;
use App\IcPassport;
use App\User;
use App\InternetPackage;
use App\SalesActivity;
use App\ThumbprintStatus;
use App\Status;
use App\JobStatus;
use App\AdminFinal;
use App\AgentEformStatus;
use App\AdminEformStatus;
use App\RunnerEformStatus;
use PDF;

class AppformController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }

// AGENT
    public function createAppformDetail($user_id, Request $request)
    {
        if($request->ajax()){
            $appformdetails = new Appform;
            $appformdetails->user_id= $user_id;
            $appformdetails->sales_activity= $request->sales_activity;
            $appformdetails->application_type= $request->application_type;
            $appformdetails->existing_service= $request->existing_service;
            $appformdetails->streamyx_tel_no= $request->streamyx_tel_no;
            $appformdetails->streamyx_package= $request->streamyx_package;
            $appformdetails->applicant_name= $request->applicant_name;
            if(isset($request->business_type) && $request->business_type != '')
				$appformdetails->ic_passport_num= $request->business_type;
            else
				$appformdetails->ic_passport_num= $request->ic_passport_num;
            $appformdetails->ic= $request->ic;
            $appformdetails->passport= $request->passport;
            $appformdetails->nationality= $request->nationality;
            $appformdetails->date_of_birth= $request->date_of_birth;
            $appformdetails->passport_exp_date= $request->passport_exp_date;
            $appformdetails->inst_address= $request->inst_address;
            $appformdetails->contact_num= $request->contact_num;
            $appformdetails->email_address= $request->email_address;
            $appformdetails->remark= $request->remark;
            $appformdetails->company_name= $request->company_name;
            $appformdetails->buss_reg_num= $request->buss_reg_num;
            $appformdetails->eform_id= $request->eform_id;
            $appformdetails->thumbprint_coll= $request->thumbprint_coll;
            $appformdetails->docs_uploaded= $request->docs_uploaded;
            // $appformdetails->runner_name= $request->runner_name;
            $appformdetails->process_status = 1;
            $appformdetails->job_status = 1;


            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id != "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 21;
            }
            elseif ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id == "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 11 || $request->thumbprint_coll == 11 && $request->docs_uploaded == 1)
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 11) 
            {
            $appformdetails->agenteformstatus = 1;
            $appformdetails->admineformstatus = 1;
            $appformdetails->runnereformstatus = 1;
            }


            $appformdetails->save();
            return response($appformdetails);
        }
    }

    public function getAppformDetail($user_id, Request $request)
    {
        $appformdetails = Appform::where('user_id',$user_id)->get();
        $agents = User::where('user_id', $request->user_id)->first();
        $packages = InternetPackage::where('package_type',1)->get();
        $intpackages = InternetPackage::where('package_type',11)->get();
        $runners = User::role('Runner')->get();

        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        return view('agent.agentappformdetail', compact('appformdetails','agents','packages','intpackages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','jobstatus','agentefs','adminefs','runnerefs'));
    }

    public function getDataProfile($user_id, $appform_id, Request $request)
    {
        $agents = User::where('user_id', $request->user_id)->first();
        $appforms = Appform::where('appform_id', $appform_id)->first();
        $runners = User::role('Runner')->get();

        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        if($appforms->application_type == 1)
        return view('agent.rdataprofile', compact('appforms','agents','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','jobstatus','agentefs','adminefs','runnerefs'));
        else{
            return view('agent.bdataprofile', compact('appforms','agents','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','jobstatus','agentefs','adminefs','runnerefs'));
        }
    }

    public function getAppform($user_id, Request $request)
    {
		
		$appform = new Appform;
		$search = array();
		$search['user_id'] = $user_id;
		if(isset($request->status) && $request->status != '')
			$search['master_status_id'] = $request->status;
		$appformdetails = $appform->getAppFormList($search);
		//$agents->user_id = $user_id;
		$agentsArr['user_id'] = $user_id;
		$agents = (object)$agentsArr;
/*
    	$appformdetails = Appform::where('user_id', $user_id)->get();
        $agents = User::where('user_id', $request->user_id)->first();

        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();
*/
        return view('agent.agentappform', compact('appformdetails','agents','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','jobstatus','agentefs','adminefs','runnerefs'));
    }

    public function updateAppform(Request $request)
    {
        if($request->ajax()) {
            $appformdetails = Appform::where('appform_id', $request->appform_id)->first();
            $appformdetails->remark= $request->remark;
            $appformdetails->thumbprint_coll= $request->thumbprint_coll;
            $appformdetails->docs_uploaded= $request->docs_uploaded;
            $appformdetails->eform_id= $request->eform_id;
            $appformdetails->process_status = 1;
            $appformdetails->job_status = 1;

            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id != "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 21;
            }
            elseif ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id == "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 11 || $request->thumbprint_coll == 11 && $request->docs_uploaded == 1)
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 11) 
            {
            $appformdetails->agenteformstatus = 1;
            $appformdetails->admineformstatus = 1;
            $appformdetails->runnereformstatus = 1;
            }
            $appformdetails->save();
            return response($appformdetails);
        }
    }

    public function deleteAppform($appform_id, Request $request)
    {
        $appformdetail = Appform::find($appform_id);
        $appformdetail->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('appformdetail');
    }

       
    public function fun_pdf()
    {
        $pdf = PDF::loadView('dataprofile.bdataprofile');
        return $pdf->download('dataprofile.pdf');
    }


// RUNNER
    public function getRunnerAppform($user_id, Request $request)
    {
        $appformdetails = Appform::where('runner_name', $user_id)->get();
        $runners = User::where('user_id', $request->user_id)->first();

        $agents = User::all();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        return view('runner.runnerappform', compact('appformdetails','runners','agents','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','jobstatus','agentefs','adminefs','runnerefs'));  
    } 



    public function getRunnerDataProfile($user_id, $appform_id, Request $request)
    {
        $agents = User::role('Agent')->get();
        $appforms = Appform::where('appform_id', $appform_id)->first();
        $runners = User::where('user_id', $request->user_id)->first();

        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        if($appforms->application_type == 1)
        return view('runner.rdataprofile', compact('appforms','agents','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','jobstatus','agentefs','adminefs','runnerefs'));
        else{
            return view('runner.bdataprofile', compact('appforms','agents','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','jobstatus','agentefs','adminefs','runnerefs'));
        }
    }



    public function updateRunnerAppform(Request $request)
    {
        if($request->ajax()) {
            $appformdetails = Appform::where('appform_id', $request->appform_id)->first();
            $appformdetails->thumbprint_coll= $request->thumbprint_coll;
            $appformdetails->docs_uploaded= $request->docs_uploaded;
            $appformdetails->eform_id= $request->eform_id;
            
            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id)
            {
                $appformdetails->job_status = 21 ;
                $appformdetails->agenteformstatus = 11 ;
                $appformdetails->runnereformstatus = 21 ;
                $appformdetails->admineformstatus = 21 ;
            }
            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 11 || $request->thumbprint_coll == 11 && $request->docs_uploaded == 1)
            {
                $appformdetails->job_status = 11 ;
                $appformdetails->runnereformstatus = 11 ;
            }
            if ($request->thumbprint_coll == 11 && $request->docs_uploaded == 11 && $request->eform_id) 
            {
                $appformdetails->job_status = 1 ;
                $appformdetails->agenteformstatus = 1 ;
                $appformdetails->runnereformstatus = 1 ;
            }
            $appformdetails->save();
            return response($appformdetails);
        }
    }


// ADMIN
    public function createAdminAppformDetail($user_id, Request $request)
    {
        if($request->ajax()){
            $appformdetails = new Appform;
            $appformdetails->user_id= $user_id;
            $appformdetails->sales_activity= $request->sales_activity;
            $appformdetails->application_type= $request->application_type;
            $appformdetails->existing_service= $request->existing_service;
            $appformdetails->streamyx_tel_no= $request->streamyx_tel_no;
            $appformdetails->streamyx_package= $request->streamyx_package;
            $appformdetails->applicant_name= $request->applicant_name;
            if(isset($request->business_type) && $request->business_type != '')
				$appformdetails->ic_passport_num= $request->business_type;
            else
				$appformdetails->ic_passport_num= $request->ic_passport_num;
            $appformdetails->ic= $request->ic;
            $appformdetails->passport= $request->passport;
            $appformdetails->nationality= $request->nationality;
            $appformdetails->date_of_birth= $request->date_of_birth;
            $appformdetails->passport_exp_date= $request->passport_exp_date;
            $appformdetails->inst_address= $request->inst_address;
            $appformdetails->contact_num= $request->contact_num;
            $appformdetails->email_address= $request->email_address;
            $appformdetails->remark= $request->remark;
            $appformdetails->company_name= $request->company_name;
            $appformdetails->buss_reg_num= $request->buss_reg_num;
            $appformdetails->eform_id= $request->eform_id;
            $appformdetails->thumbprint_coll= $request->thumbprint_coll;
            $appformdetails->docs_uploaded= $request->docs_uploaded;
            // $appformdetails->admineformstatus = 1;
            $appformdetails->process_status = 1;
            $appformdetails->job_status = 1;


            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id != "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 21;
            }
            elseif ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id == "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 11 || $request->thumbprint_coll == 11 && $request->docs_uploaded == 1)
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 11) 
            {
            $appformdetails->agenteformstatus = 1;
            $appformdetails->admineformstatus = 1;
            $appformdetails->runnereformstatus = 1;
            }
            $appformdetails->save();
            return response($appformdetails);
        }
    }

    public function getAdminAppformDetail($user_id, Request $request)
    {
        $appformdetails = Appform::where('user_id', $user_id)->get();
        $admins = User::where('user_id', $request->user_id)->first();
        $packages = InternetPackage::where('package_type',1)->get();
        $intpackages = InternetPackage::where('package_type',11)->get();
        $agents = User::role('Agent')->get();
        $runners = User::role('Runner')->get();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        return view('admin.adminappformdetail', compact('appformdetails','admins','packages','intpackages','agents','runners','activities','thumbprints','apptypes','docsups','exservs','icpass','jobstatus','agentefs','adminefs','runnerefs'));
    }

    public function getAdminAppform($user_id, Request $request)
    {
        // $appformdetails = Appform::where('user_id',$user_id)->get();
        $appformdetails = Appform::all();
        $admins = User::where('user_id', $request->user_id)->first();

        $agents = User::all();
        $runners = User::all();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $status = Status::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        return view('admin.adminappform', compact('appformdetails','admins','agents','runners','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','status','jobstatus','agentefs','adminefs','runnerefs'));  
    } 



    public function getAdminDataProfile($user_id, $appform_id, Request $request)
    {
        $agents = User::all();
        $admins = User::where('user_id', $request->user_id)->first();
        $appforms = Appform::where('appform_id', $appform_id)->first();
        $runners = User::role('Runner')->get();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $status = Status::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        if($appforms->application_type == 1)
			return view('admin.rdataprofile', compact('appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','agentefs','adminefs','runnerefs'));
        else{
            return view('admin.bdataprofile', compact('appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','agentefs','adminefs','runnerefs'));
        }
    }


    public function updateAdminAppform($user_id, $appform_id, Request $request)
    {
        if($request->ajax()) {
            $appformdetails = Appform::where('appform_id', $request->appform_id)->first();
            $appformdetails->eform_id= $request->eform_id;
            $appformdetails->docs_uploaded= $request->docs_uploaded;
            $appformdetails->admin_remark= $request->admin_remark;
            $appformdetails->process_status= $request->process_status;
            $appformdetails->job_status= 1;
            
            if ($appformdetails->runner_name) {
            }
            else{
                $appformdetails->runner_name= $request->runner_name;
            }


            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id != "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 21;
            }
            elseif ($request->thumbprint_coll == 1 && $request->docs_uploaded == 1 && $request->eform_id == "")
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 1 && $request->docs_uploaded == 11 || $request->thumbprint_coll == 11 && $request->docs_uploaded == 1)
            {
            $appformdetails->agenteformstatus = 11;
            $appformdetails->admineformstatus = 1;
            }
            if ($request->thumbprint_coll == 11) 
            {
            $appformdetails->agenteformstatus = 1;
            $appformdetails->admineformstatus = 1;
            $appformdetails->runnereformstatus = 1;
            }
            $appformdetails->save();
            return response($appformdetails);
        }
    }



// COMPLETE APPLICATION FORM
     

    public function getAppDataProfile($user_id, $appform_id, Request $request)
    {
        $agents = User::all();
        $admins = User::where('user_id', $request->user_id)->first();
        $appforms = Appform::where('appform_id', $appform_id)->first();
        $runners = User::role('Runner')->get();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $status = Status::all();
        $jobstatus = JobStatus::all();
        $finals = AdminFinal::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        if($appforms->application_type == 1)
        return view('applicationform.rdataprofile', compact('appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','finals','agentefs','adminefs','runnerefs'));
        else{
            return view('applicationform.bdataprofile', compact('appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','finals','agentefs','adminefs','runnerefs'));
        }
    }

    public function updateApplicationForm($user_id, $appform_id, Request $request)
    {
        if($request->ajax()) {
            $appformdetails = Appform::where('appform_id', $request->appform_id)->first();
            $appformdetails->process_status= $request->process_status;
            $appformdetails->admin_remark= $request->admin_remark;
            // $appformdetails->finalstatus= $request->finalstatus;
            $appformdetails->save();
            return response($appformdetails);
        }
    }

// PENDING APPROVAL

    public function getPendingform($user_id, Request $request)
    {
        // $appformdetails = Appform::where('user_id',$user_id)->get();
        $appformdetails = Appform::where('thumbprint_coll', 1)->where('docs_uploaded', 1)->where('agenteformstatus', 11)->where('admineformstatus',21)->get();
        $admins = User::where('user_id', $request->user_id)->first();

        $agents = User::all();
        $runners = User::all();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $status = Status::all();
        $jobstatus = JobStatus::all();
        $finals = AdminFinal::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        return view('applicationform.applicationform', compact('appformdetails','admins','agents','runners','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','status','jobstatus','finals','agentefs','adminefs','runnerefs'));  
    }


    public function getPendingApproval($user_id, $appform_id, Request $request)
    {
        $agents = User::all();
        $admins = User::where('user_id', $request->user_id)->first();
        $appforms = Appform::where('appform_id', $appform_id)->first();
        $runners = User::role('Runner')->get();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $status = Status::all();
        $jobstatus = JobStatus::all();
        $finals = AdminFinal::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        if($appforms->application_type == 1)
        return view('applicationform.pardataprofile', compact('appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','finals','agentefs','adminefs','runnerefs'));
        else{
            return view('applicationform.pabdataprofile', compact('appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','finals','agentefs','adminefs','runnerefs'));
        }
    }

    public function updatePendingApproval($user_id, $appform_id, Request $request)
    {
        if($request->ajax()) {
            $appformdetails = Appform::where('appform_id', $request->appform_id)->first();
            $appformdetails->process_status= $request->process_status;
            $appformdetails->admin_remark= $request->admin_remark;
            $appformdetails->finalstatus= $request->finalstatus;
            if ($request->finalstatus == 1)
            {
                $appformdetails->job_status = 31 ;
                $appformdetails->agenteformstatus = 21 ;
                $appformdetails->runnereformstatus = 21 ;
                $appformdetails->admineformstatus = 31 ;
            }
            if ($request->finalstatus == 11)
            {
                $appformdetails->agenteformstatus = 11 ;
                $appformdetails->admineformstatus = 41 ;
                $appformdetails->runnereformstatus = 11 ;
                $appformdetails->job_status = 11 ;
            }
            $appformdetails->save();
            return response($appformdetails);
        }
    }





















// MANAGER

    public function getManAppform(Request $request)
    {
        //$appformdetails = Appform::where('user_id',$user_id)->get();
		//$appformdetails = Appform::all();
		$appform = new Appform;
		$search = array();
		if(isset($request->status) && $request->status != '')
			$search['master_status_id'] = $request->status;
		$appformdetails = $appform->getAppFormData($search);
		$agents = User::role(['Agent','Admin'])->get();
		$manArr['user_id'] = $request->session()->get('user_id');
		$man = (object)$manArr;
		//$appformdetails = Appform::with(['status'])->all();
		//$article = \App\Models\Article::with(['user','category'])->first();
        /*
        $admins = User::all();
        $managers = User::all();
        $agents = User::all();
        $runners = User::all();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        if(isset($request->status) && $request->status != '')
			$status = Status::where('master_status_id',$request->status)->get();
		else
			$status = Status::all();
        $jobstatus = JobStatus::all();
        */
        return view('man.manappform', compact('managers','appformdetails','man','admins','agents','runners','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','status','jobstatus'));
    } 

    public function getManAppformDetail(Request $request)
    {
		if(isset($request->user_id) && $request->user_id != '')
			$userId = $request->user_id;
		else
			$userId = $request->session()->get('user_id');
        $appformdetails = Appform::where('user_id', $userId)->get();
        $man = User::where('user_id', $userId)->first();
        $packages = InternetPackage::where('package_type',1)->get();
        $intpackages = InternetPackage::where('package_type',11)->get();
        $agents = User::role('Agent')->get();
        $runners = User::role('Runner')->get();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $jobstatus = JobStatus::all();
        $agentefs = AgentEformStatus::all();
        $adminefs = AdminEformStatus::all();
        $runnerefs = RunnerEformStatus::all();

        return view('man.manappformdetail', compact('appformdetails','man','packages','intpackages','agents','runners','activities','thumbprints','apptypes','docsups','exservs','icpass','jobstatus','agentefs','adminefs','runnerefs'));
    }

    public function getManDataProfile($user_id, $appform_id, Request $request)
    {
        $managers = User::where('user_id', $request->user_id)->first();
        $agents = User::all();
        $admins = User::all();
        $appforms = Appform::where('appform_id', $appform_id)->first();
        $runners = User::role('Runner')->get();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $status = Status::all();
        $jobstatus = JobStatus::all();
		//print_r($appforms);die;
        if($appforms->application_type == 1)
			return view('man.adrdataprofile', compact('managers','appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus'));
        else
            return view('man.adbdataprofile', compact('managers','appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus'));
    }


    public function updateManAppform($user_id, $appform_id, Request $request)
    {
        if($request->ajax()) {
            $appformdetails = Appform::where('appform_id', $request->appform_id)->first();
            $appformdetails->eform_id= $request->eform_id;
            $appformdetails->docs_uploaded= $request->docs_uploaded;
            if ($appformdetails->runner_name) {
            }
            else{
                $appformdetails->runner_name= $request->runner_name;
            }
            $appformdetails->process_status= $request->process_status;
            $appformdetails->job_status= 1;
            $appformdetails->admin_remark= $request->admin_remark;
            $appformdetails->save();
            return response($appformdetails);
        }
    } 

    public function getManAppDataProfile($user_id, $appform_id, Request $request)
    {
        $managers = User::where('user_id', $request->user_id)->first();
        $agents = User::all();
        $admins = User::all();
        $appforms = Appform::where('appform_id', $appform_id)->first();
        $runners = User::role('Runner')->get();
        $packages = InternetPackage::all();
        $activities = SalesActivity::all();
        $thumbprints = ThumbprintStatus::all();
        $apptypes = Apptype::all();
        $docsups = DocsUpload::all();
        $exservs = ExistService::all();
        $icpass = IcPassport::all();
        $status = Status::all();
        $jobstatus = JobStatus::all();
        $finalstatus = AdminFinal::all();

        if($appforms->application_type == 1)
        return view('man.aprdataprofile', compact('managers','appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','finalstatus'));
        else{
            return view('man.apbdataprofile', compact('managers','appforms','agents','admins','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','status','jobstatus','finalstatus'));
        }
    }

    public function updateManApplicationForm($user_id, $appform_id, Request $request)
    {
        if($request->ajax()) {
            $appformdetails = Appform::where('appform_id', $request->appform_id)->first();
            if ($appformdetails->process_status) {
            }
            else{
                $appformdetails->process_status= $request->process_status;
            }
            if ($appformdetails->admin_remark) {
            }
            else{
                $appformdetails->admin_remark= $request->admin_remark;
            }
            $appformdetails->finalstatus= $request->finalstatus;
            $appformdetails->save();
            return response($appformdetails);
        }
    }

}

    

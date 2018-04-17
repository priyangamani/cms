<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Redirect;
use Session;
use PDF;
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

class PdfController extends Controller
{
	public function downloadPDF($user_id, $appform_id, Request $request )
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
		$pdf = PDF::loadView('agent.rdataprofile', compact('appforms','agents','packages','activities','thumbprints','apptypes','docsups','exservs','icpass','runners','jobstatus','agentefs','adminefs','runnerefs'))->setPaper('a4', 'portrait');
		return $pdf->download('invoice.pdf');
	}
}

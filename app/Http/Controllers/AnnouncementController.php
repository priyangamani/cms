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
use App\Announcement;
use App\Appform;
use Auth;

class AnnouncementController extends Controller
{
    public function __construct() {
        $this->middleware(['auth','user']); 
    }

    public function createAnnouncement(Request $request)
    {
    	if($request->ajax()){
            $announcements = new Announcement;
            $announcements->ann_title = $request->ann_title;
            $announcements->ann_picture = $request->ann_picture;
            //move_uploaded_file($request->ann_picture,'images/');
            move_uploaded_file($_FILES['file']['tmp_name'],'images/'.$_FILES['file']['name']);
            $announcements->ann_picture = 'images/'.$_FILES['file']['name'];
            $announcements->ann_content = $request->ann_content;
            $announcements->when_to_post = $request->when_to_post;
            $announcements->post_to_which_group = $request->post_to_which_group;
            $announcements->save();
            return response($announcements);
        }
    }

    public function getAnnouncement()
    {
    	$announcements = Announcement::all();
        $roles = Role::all();
	    return view('announcement.announcement',compact('announcements','roles'));
    }

    public function editAnnouncement($ann_id, Request $request)
    {
        $announcements = Announcement::where('ann_id', $request->ann_id)->first();
        $roles = Role::all();
        return view('announcement.editAnnouncement', compact('announcements','roles'));
    }

    public function updateAnnouncement(Request $request)
    {
        if($request->ajax()){
            $announcements = Announcement::where('ann_id', $request->ann_id)->first();
            $announcements->ann_title = $request->ann_title;
            if($request->ann_picture && $request->ann_picture != '')
				$announcements->ann_picture = $request->ann_picture;
            $announcements->ann_content = $request->ann_content;
            $announcements->when_to_post = $request->when_to_post;
            $announcements->post_to_which_group = $request->post_to_which_group;
            $announcements->save();
            return response($announcements);
        }       
    }

    public function deleteAnnouncement($ann_id, Request $request)
    {
        $announcements = Announcement::find($ann_id);
        $announcements->delete();
        Session::flash('message', 'Successfully deleted!');
        return Redirect::to('announcement');
    }

	function welcomeDashboard() {
		$totalapplicant = Appform::count();
		$completeapplicant = Appform::where('admineformstatus', 31)->count();
		$pending = Appform::where('admineformstatus', 1)->count();
		$pendingapproval = Appform::where('admineformstatus', 21)->count();
		$incompleteapplicant = $pending + $pendingapproval;
		$pendingapplicant = Appform::where('admineformstatus', 41)->count();
		$announcements = Announcement::where('post_to_which_group', '51')
										->whereDate('when_to_post', '<=', date('Y-m-d'))
										->get();

		return view('welcome', compact('totalapplicant','completeapplicant','incompleteapplicant','pendingapplicant','announcements'));
	}

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

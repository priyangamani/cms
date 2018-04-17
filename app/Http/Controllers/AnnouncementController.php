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
            $announcements->ann_content = $request->ann_content;
            $announcements->save();
            return response($announcements);
        }
    }

    public function getAnnouncement()
    {
    	$announcements = Announcement::all();
	    return view('announcement.announcement',compact('announcements'));
    }

    public function editAnnouncement($ann_id, Request $request)
    {
        $announcements = Announcement::where('ann_id', $request->ann_id)->first();
        return view('announcement.editAnnouncement', compact('announcements'));
    }

    public function updateAnnouncement(Request $request)
    {
        if($request->ajax()){
            $announcements = Announcement::where('ann_id', $request->ann_id)->first();
            $announcements->ann_title = $request->ann_title;
            $announcements->ann_picture = $request->ann_picture;
            $announcements->ann_content = $request->ann_content;
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

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
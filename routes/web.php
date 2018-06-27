<?php


use App\Appform;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/welcome', ['as'=>'welcome', 'uses'=>'AnnouncementController@welcomeDashboard']);
/*
Route::get('/welcome', ['as' => 'welcome','uses' => 
	function () {
		$totalapplicant = Appform::count();
		$completeapplicant = Appform::where('admineformstatus', 31)->count();
		$pending = Appform::where('admineformstatus', 1)->count();
		$pendingapproval = Appform::where('admineformstatus', 21)->count();
		$incompleteapplicant = $pending + $pendingapproval;
		$pendingapplicant = Appform::where('admineformstatus', 41)->count();
		return view('welcome', compact('totalapplicant','completeapplicant','incompleteapplicant','pendingapplicant'));
	}]);
*/
// -------------------------------------------Forget Password---------------------------------------------

Route::get('/forgot-password', ['as'=>'forgotPassword', 'uses'=>'LoginController@getForgotPassword']);

Route::post('/forgot-password/send-email', ['as' => 'sendEmail', 'uses' => 'ResetPasswordController@getResetToken']);
Route::get('/reset/{email}/{resetCode}',['as'=>'resetPasswordFromEmail','uses'=>'ResetPasswordController@resetPasswordFromEmail']);

Route::get('/password-success', ['as'=>'passwordSuccess','uses'=>'ResetPasswordController@successPassword']);
Route::get('/password-error', ['as'=>'passwordError','uses'=>'ResetPasswordController@errorPassword']);
Route::post('/post-password-reset', ['as'=>'postResetPassword','uses'=>'ResetPasswordController@postResetPassword']);

// -------------------------------------------Dashboard---------------------------------------------

Route::post('/dashboard',['as'=>'createDashboard','uses'=>'DashboardController@createAgentDashboard']);
Route::get('/manager/{user_id}/dashboard',['as'=>'dashboard','uses'=>  
	'DashboardController@getDashboard']); 

// -------------------------------------------appform detail---------------------------------------------	


Route::get('/agent/{user_id}/dashboard',['as'=>'agentdashboard','uses'=>  
	'DashboardController@getAgentDashboard']); 

Route::post('/agent/{user_id}/appformdetail/add', ['as'=>'createAppformDetail', 'uses'=>'AppformController@createAppformDetail'])->middleware('user');
Route::get('/agent/{user_id}/appformdetail', ['as'=>'appformdetails', 'uses'=>'AppformController@getAppformDetail']);

// -------------------------------------------agent profile----------------------------------------------------	

Route::get('/agent/{user_id}/appform', ['as'=>'appforms', 'uses'=>'AppformController@getAppform']);
Route::get('/agent/{user_id}/editAppform/{appform_id}/', ['as'=>'editAppform', 'uses'=>'AppformController@editAppform']);
Route::post('/agent/{user_id}/editAppform/{appform_id}/updateAppform',['as'=>'updateAppform','uses'=>'AppformController@updateAppform']);

Route::get('/agent/{user_id}/dataprofile/{appform_id}',['as'=>'dataprofile','uses'=>  
	'AppformController@getDataProfile']);

Route::get('/agent/{user_id}/dataprofile/{appform_id}/pdf',['as'=>'pdf','uses'=>'PdfController@downloadPDF']);
Route::delete('/appform/{appform_id}',['as'=>'deleteAppform','uses'=>'AppformController@deleteAppform']);



// -------------------------------------------admin profile----------------------------------------------------


Route::get('/admin/{user_id}/dashboard',['as'=>'admindashboard','uses'=>'DashboardController@getAdminDashboard']); 	 

Route::post('/admin/{user_id}/appformdetail/add', ['as'=>'createAdminAppformDetail', 'uses'=>'AppformController@createAdminAppformDetail']);
Route::get('/admin/{user_id}/appformdetail', ['as'=>'adminappformdetails', 'uses'=>'AppformController@getAdminAppformDetail']);

Route::get('/admin/{user_id}/dataprofile/', ['as'=>'adminappforms','uses'=>'AppformController@getAdminAppform']);
Route::get('admin/{user_id}/dataprofile/{appform_id}',['as'=>'admindataprofile','uses'=>'AppformController@getAdminDataProfile']);
Route::post('admin/{user_id}/dataprofile/{appform_id}/updateAppform',['as'=>'updateAdminAppform','uses'=>'AppformController@updateAdminAppform']);

// -------------------------------------------pending approval--------------------------------------------

Route::get('/admin/{user_id}/applicationform/', ['as'=>'applicationform','uses'=>'AppformController@getApplicationform']);
Route::get('admin/{user_id}/applicationform/{appform_id}',['as'=>'applicationdataprofile','uses'=>'AppformController@getAppDataProfile']);
Route::post('admin/{user_id}/applicationform/{appform_id}/updateAppform',['as'=>'updateApplicationForm','uses'=>'AppformController@updateApplicationForm']);

Route::get('/admin/{user_id}/pendingapproval/', ['as'=>'pendingapproval','uses'=>'AppformController@getPendingform']);
Route::get('admin/{user_id}/pendingapproval/{appform_id}',['as'=>'pendingdataprofile','uses'=>'AppformController@getPendingApproval']);
Route::post('admin/{user_id}/pendingapproval/{appform_id}/updateAppform',['as'=>'updatependingapproval','uses'=>'AppformController@updatePendingApproval']);


// -------------------------------------------runner profile----------------------------------------------------


Route::get('/runner/{user_id}/dashboard',['as'=>'runnerdashboard','uses'=>  
	'DashboardController@getRunnerDashboard']); 
Route::get('/runner/{user_id}/dataprofile/', ['as'=>'runnerappforms', 'uses'=>'AppformController@getRunnerAppform']);
Route::get('/runner/{user_id}/dataprofile/{appform_id}',['as'=>'runnerdataprofile','uses'=>  
	'AppformController@getRunnerDataProfile']);
Route::post('/runner/{user_id}/dataprofile/{appform_id}/updateRunnerAppform',['as'=>'updateRunnerAppform','uses'=>'AppformController@updateRunnerAppform']);



// -------------------------------------------all----------------------------------------------------



Route::get('/manager/dataprofile/', ['as'=>'manappform','uses'=>'AppformController@getManAppform']);

Route::get('/manager/appformdetail', ['as'=>'manappformdetails', 'uses'=>'AppformController@getManAppformDetail']);

Route::post('/manager/{user_id}/appformdetail/add', ['as'=>'createManAppformDetail', 'uses'=>'AppformController@createAppformDetail'])->middleware('user');

Route::get('manager/{user_id}/dataprofile/{appform_id}',['as'=>'manadmindataprofile','uses'=>'AppformController@getManDataProfile']);
Route::post('manager/{user_id}/dataprofile/{appform_id}/updateAppform',['as'=>'updateManAdminAppform','uses'=>'AppformController@updateManAppform']);
Route::get('manager/{user_id}/applicationform/{appform_id}',['as'=>'manappdataprofile','uses'=>'AppformController@getManAppDataProfile']);
Route::post('manager/{user_id}/applicationform/{appform_id}/updateAppform',['as'=>'updateManApplicationForm','uses'=>'AppformController@updateManApplicationForm']);


// -------------------------------------------sales activity----------------------------------------------------	

Route::post('/salesactivity', ['as'=>'createSalesActivity', 'uses'=>'SalesActivityController@createActivity']);
Route::get('/salesactivity', ['as'=>'salesactivity', 'uses'=>'SalesActivityController@getActivity']);
Route::get('/editSaleActivity/{activity_id}/', ['as'=>'editSaleActivity', 'uses'=>'SalesActivityController@editActivity']);
Route::post('updateSalesActivity',['as'=>'updateSalesActivity','uses'=>'SalesActivityController@updateActivity']);
Route::delete('/salesactivity/{activity_id}',['as'=>'deleteActivity','uses'=>'SalesActivityController@deleteActivity']);

// -------------------------------------------int package----------------------------------------------------	

Route::post('/internetpackage', ['as'=>'createIntPackage', 'uses'=>'InternetPackageController@createIntPackage']);
Route::get('/internetpackage', ['as'=>'intpackage', 'uses'=>'InternetPackageController@getIntPackage']);
Route::get('/editIntPackage/{intpackage_id}/', ['as'=>'editIntPackage', 'uses'=>'InternetPackageController@editIntPackage']);
Route::post('updateIntPackage',['as'=>'updateIntPackage','uses'=>'InternetPackageController@updateIntPackage']);
Route::delete('/internetpackage/{intpackage_id}',['as'=>'deleteIntPackage','uses'=>'InternetPackageController@deleteIntPackage']);

// ------------------------------------------- user ---------------------------------------------

Route::post('/user', ['as'=>'createUser', 'uses'=>'UserController@createUser']);
Route::get('/user',['as'=>'user','uses'=>'UserController@getUser']);
Route::get('/editUser/{user_id}',['as'=>'editUser','uses'=>'UserController@editUser']);
Route::post('/updateUser',['as'=>'updateUser','uses'=>'UserController@updateUser']);
Route::delete('/user/{user_id}',['as'=>'deleteUser','uses'=>'UserController@deleteUser']);

// ------------------------------------------- agent ---------------------------------------------

Route::post('/agent', ['as'=>'createAgent', 'uses'=>'AgentController@createAgent']);
Route::get('/agent',['as'=>'agent','uses'=>'AgentController@getAgent']);
Route::get('/editAgent/{user_id}',['as'=>'editAgent','uses'=>'AgentController@editAgent']);
Route::post('/updateAgent',['as'=>'updateAgent','uses'=>'AgentController@updateAgent']);
Route::delete('/agent/{user_id}',['as'=>'deleteAgent','uses'=>'AgentController@deleteAgent']);

// ------------------------------------------- admin ---------------------------------------------
Route::post('/admin', ['as'=>'createAdmin', 'uses'=>'AdminController@createAdmin']);
Route::get('/admin',['as'=>'admin','uses'=>'AdminController@getAdmin']);
Route::get('/editAdmin/{user_id}',['as'=>'editAdmin','uses'=>'AdminController@editAdmin']);
Route::post('/updateAdmin',['as'=>'updateAdmin','uses'=>'AdminController@updateAdmin']);
Route::delete('/admin/{user_id}',['as'=>'deleteAdmin','uses'=>'AdminController@deleteAdmin']);

// ------------------------------------------- runner ---------------------------------------------

Route::post('/runner', ['as'=>'createRunner', 'uses'=>'RunnerController@createRunner']);
Route::get('/runner',['as'=>'runner','uses'=>'RunnerController@getRunner']);
Route::get('/editRunner/{user_id}',['as'=>'editRunner','uses'=>'RunnerController@editRunner']);
Route::post('/updateRunner',['as'=>'updateRunner','uses'=>'RunnerController@updateRunner']);
Route::delete('/runner/{user_id}',['as'=>'deleteRunner','uses'=>'RunnerController@deleteRunner']);

// ------------------------------------------- supervisor ---------------------------------------------

Route::post('/supervisor', ['as'=>'createSupervisor', 'uses'=>'SupervisorController@createSupervisor']);
Route::get('/supervisor',['as'=>'supervisor','uses'=>'SupervisorController@getSupervisor']);
Route::get('/editSupervisor/{user_id}',['as'=>'editSupervisor','uses'=>'SupervisorController@editSupervisor']);
Route::post('/updateSupervisor',['as'=>'updateSupervisor','uses'=>'SupervisorController@updateSupervisor']);
Route::delete('/supervisor/{user_id}',['as'=>'deleteSupervisor','uses'=>'SupervisorController@deleteSupervisor']);

// ------------------------------------------- status ---------------------------------------------

Route::post('/status/{user_id?}', ['as'=>'createStatus', 'uses'=>'StatusController@createStatus']);
//Route::get('/status',['as'=>'status','uses'=>'StatusController@getStatus']);
Route::get('/status/{user_id?}',['as'=>'status','uses'=>'StatusController@getStatus']);
//Route::get('/status/{user_id}',['as'=>'status','uses'=>'StatusController@getStatusForAdmin']);
//Route::get('/getStatusForAdmin/{user_id}',['as'=>'getStatusForAdmin','uses'=>'StatusController@getStatusForAdmin']);
Route::get('/editStatus/{status_id}',['as'=>'editStatus','uses'=>'StatusController@editStatus']);
Route::post('/updateStatus',['as'=>'updateStatus','uses'=>'StatusController@updateStatus']);
Route::delete('/status/{status_id}',['as'=>'deleteStatus','uses'=>'StatusController@deleteStatus']);

// -------------------------------------------state---------------------------------------------

Route::post('/state', ['as'=>'createState', 'uses'=>'StateController@createState']);
Route::get('/state', ['as'=>'state', 'uses'=>'StateController@getState']);
Route::get('/editState/{state_id}',['as'=>'editState','uses'=>'StateController@editState']);
Route::post('/updateState',['as'=>'updateState','uses'=>'StateController@updateState']);
Route::delete('/state/{state_id}',['as'=>'deleteState','uses'=>'StateController@deleteState']);

// -------------------------------------------branch---------------------------------------------

Route::post('/branch', ['as'=>'createBranch', 'uses'=>'BranchController@createBranch']);
Route::get('/branch', ['as'=>'branch', 'uses'=>'BranchController@getBranch']);
Route::get('/editBranch/{branch_id}',['as'=>'editBranch','uses'=>'BranchController@editBranch']);
Route::post('/updateBranch',['as'=>'updateBranch','uses'=>'BranchController@updateBranch']);
Route::delete('/branch/{branch_id}',['as'=>'deleteBranch','uses'=>'BranchController@deleteBranch']);

// -------------------------------------------announcement---------------------------------------------

Route::post('/announcement', ['as'=>'createAnnouncement', 'uses'=>'AnnouncementController@createAnnouncement']);
Route::get('/announcement', ['as'=>'announcement', 'uses'=>'AnnouncementController@getAnnouncement']);
Route::get('/editAnnouncement/{ann_id}',['as'=>'editAnnouncement','uses'=>'AnnouncementController@editAnnouncement']);
Route::post('/updateAnnouncement',['as'=>'updateAnnouncement','uses'=>'AnnouncementController@updateAnnouncement']);
Route::delete('/announcement/{ann_id}',['as'=>'deleteAnnouncement','uses'=>'AnnouncementController@deleteAnnouncement']);

// ------------------------------------------- roles ---------------------------------------------

Route::get('/roles', ['as' => 'roles', 'uses' => 'RoleController@index']);
Route::get('/roles/create', ['as' => 'create-role', 'uses' => 'RoleController@create']);
Route::post('/roles/store', ['as' => 'store-role', 'uses' => 'RoleController@store']);



// ------------------------------------------- login ---------------------------------------------

Route::get('/',['as'=>'login','uses'=>'LoginController@getLogin']);
Route::post('/login', ['as'=>'postLogin', 'uses'=>'LoginController@postLogin']);
Route::get('/logout',['as'=>'logout','uses'=>'LoginController@getLogout']);



// ------------------------------------------- api ---------------------------------------------

// POST
Route::post('api/registeruser', 'Api\UserController@postRegisterUser');

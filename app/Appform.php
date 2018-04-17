<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appform extends Model
{
    protected $table = 'appforms';
    protected $primaryKey = 'appform_id';
    public $timestamp = 'true';
    protected $fillable = [
    'sales_activity',
    'user_id',
    'application_type',
    'existing_service',
    'streamyx_tel_no',
    'streamyx_package',
    'applicant_name',
    'ic_passport_num',
    'ic',
    'passport',
    'nationality',
    'date_of_birth',
    'passport_exp_date',
    'inst_address',
    'contact_num',
    'email_address',
    'remark',
    'thumbprint_coll',
    'company_name',
    'buss_reg_num',
    'docs_uploaded',
    'eform_id',
    'runner_name',
    'process_status',
    'job_status',
    'admin_remark',
    'altuser_id',
    'finalstatus',
    'agenteformstatus',
    'admineformstatus',
    'runnereformstatus',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    } 

    public function runners()
    {
        return $this->belongsTo('App\User','runner_name');
    } 

    public function admins()
    {
        return $this->belongsTo('App\User','user_id');
    } 

    public function managers()
    {
        return $this->belongsTo('App\User','user_id');
    } 

    public function packages()
    {
        return $this->belongsTo('App\InternetPackage','streamyx_package');
    } 

    public function activities()
    {
        return $this->belongsTo('App\SalesActivity','sales_activity');
    } 

    public function thumbprints()
    {
        return $this->belongsTo('App\ThumbprintStatus','thumbprint_coll');
    }

    public function apptypes()
    {
        return $this->belongsTo('App\Apptype','application_type');
    }

    public function docsups()
    {
        return $this->belongsTo('App\DocsUpload','docs_uploaded');
    }

    public function exservs()
    {
        return $this->belongsTo('App\ExistService','existing_service');
    }

    public function icpass()
    {
        return $this->belongsTo('App\IcPassport','icpass');
    }

    public function status()
    {
        return $this->belongsTo('App\Status','process_status');
    }

    public function jobstatus()
    {
        return $this->belongsTo('App\JobStatus','job_status');
    }

    public function finals()
    {
        return $this->belongsTo('App\AdminFinal','finalstatus');
    }

    public function agentefs()
    {
        return $this->belongsTo('App\AgentEformStatus','agenteformstatus');
    }

    public function adminefs()
    {
        return $this->belongsTo('App\AdminEformStatus','admineformstatus');
    }

    public function runnerefs()
    {
        return $this->belongsTo('App\RunnerEformStatus','runnereformstatus');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RunnerEformStatus extends Model
{
    protected $table = 'runnereformstatus';
    protected $primaryKey = 'runnereformstatus_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'status',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\RunnerEformStatus','runnerformstatus_id');
    }
}

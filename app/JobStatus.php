<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JobStatus extends Model
{
    protected $table = 'jobstatus';
	protected $primaryKey = 'jobstat_id';
	public $timestamp = 'true';
	protected $fillable = [
	'jobstat',
	];

	public function addforms()
    {
    	return $this->belongsTo('App\Appform','jobstat_id');
    }
}

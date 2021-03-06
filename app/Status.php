<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    protected $primaryKey = 'status_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'status',
    	'master_status_id',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\Appform','status_id');
    }
}

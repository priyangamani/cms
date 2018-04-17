<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminEformStatus extends Model
{
    protected $table = 'admineformstatus';
    protected $primaryKey = 'admineformstatus_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'status',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\AdminEformStatus','admineformstatus_id');
    }
}

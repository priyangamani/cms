<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentEformStatus extends Model
{
    protected $table = 'agenteformstatus';
    protected $primaryKey = 'agenteformstatus_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'status',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\AgentEformStatus','agenteformstatus_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Active extends Model
{
    protected $table = 'actives';
    protected $primaryKey = 'active_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'status',
    	];

    	public function users()
    {
        return $this->belongsTo('App\User','active_id');
    } 
}

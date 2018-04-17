<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesActivity extends Model
{
    protected $table = 'salesactivities';
    protected $primaryKey = 'activity_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'activity',
    ];

    public function appforms()
	{
		return $this->belongsTo('App\Appform','activity_id');
	} 
}

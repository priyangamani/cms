<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExistService extends Model
{
    protected $table = 'exservices';
    protected $primaryKey = 'exserv_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'exservice',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\Appform','exserv_id');
    }
}

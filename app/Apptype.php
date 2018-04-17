<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apptype extends Model
{
    protected $table = 'apptypes';
    protected $primaryKey = 'apptype_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'type',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\Appform','apptype_id');
    }
}

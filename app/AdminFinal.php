<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminFinal extends Model
{
    protected $table = 'adminfinals';
    protected $primaryKey = 'final_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'status',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\Appform','final_id');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThumbprintStatus extends Model
{
    protected $table = 'thumbprints';
    protected $primaryKey = 'thumbstat_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'status',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\Appform','thumbstat_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IcPassport extends Model
{
    protected $table = 'icpass';
    protected $primaryKey = 'icpass_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'icpass',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\Appform','icpass_id');
    }
}

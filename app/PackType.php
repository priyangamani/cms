<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackType extends Model
{
    protected $table = 'packtypes';
    protected $primaryKey = 'packtype_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'type',
    ];

    public function packages()
    {
        return $this->belongsTo('App\InternetPackage','packtype_id');
    }
}

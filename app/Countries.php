<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $table = 'countries';
    protected $primaryKey = 'id';
    //public $timestamp = 'true';
    protected $fillable = [
    	'country_code',
    	'country_name',
    	'nationality_code',
    	'nationality'
    ];

    public function users()
    {
        return $this->belongsTo('App\User','country_of_issue');
    } 

    public function appforms()
    {
        return $this->belongsTo('App\AppForm','nationality');
    } 
}

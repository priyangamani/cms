<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    protected $primaryKey = 'branch_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'branch_name',
    ];

    public function users()
    {
        return $this->belongsTo('App\User','branch_id');
    } 
}

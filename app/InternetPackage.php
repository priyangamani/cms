<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InternetPackage extends Model
{
	protected $table = 'internetpackages';
	protected $primaryKey = 'intpackage_id';
	public $timestamp = 'true';
	protected $fillable = [
	'internet_package',
	'package_type',
	];

	public function appforms()
	{
		return $this->belongsTo('App\Appform','intpackage_id');
	} 

	public function packtypes()
	{
		return $this->belongsTo('App\PackTYpe','package_type');
	} 
}

<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    protected $guard_name = 'web';

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'name',
    	'phonenumber',
        'address',
        'roles',
        'email',
        'password',
        'remember_token',
        'state',
        'branch',
        'supervisor',
        'ic_number',
        'active',
        'altuser_id',
    	];

    public function groups()
    {
        return $this->belongsTo('App\Group','group_id');
    }    

    public function states()
    {
        return $this->belongsTo('App\State','state');
    }

    public function branches()
    {
        return $this->belongsTo('App\Branch','branch');
    } 

    public function actives()
    {
        return $this->belongsTo('App\Active','active');
    }

    public function appforms()
    {
        return $this->belongsTo('App\Appform','user_id');
    }

}

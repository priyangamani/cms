<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $table = 'announcements';
    protected $primaryKey = 'ann_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'ann_title',
    	'ann_content',
    	'ann_picture',
    	];
}

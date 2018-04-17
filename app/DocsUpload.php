<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocsUpload extends Model
{
    protected $table = 'docsups';
    protected $primaryKey = 'docs_id';
    public $timestamp = 'true';
    protected $fillable = [
    	'docsup',
    ];

    public function addforms()
    {
    	return $this->belongsTo('App\Appform','docs_id');
    }
}

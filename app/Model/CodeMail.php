<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CodeMail extends Model
{
	protected $table = 'codeuser';
    protected $fillable = [
    	'user_id', 'code'
    ];

    public function User()
    {
    	return $this->hasOne('App\User');
    }
}

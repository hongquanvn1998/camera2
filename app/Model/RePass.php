<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RePass extends Model
{
    protected $table = 'repass';
    protected $fillable = [
    	'user_id', 'code'
    ];

    public function User()
    {
    	return $this->hasOne('App\User');
    }
}

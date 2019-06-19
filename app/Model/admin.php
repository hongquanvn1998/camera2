<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class admin extends Model
{
    protected $table ='admin';

    public function GetAllDataAdmin($user,$pass)
    {
    	$data = [];
    	$query = admin::select('*')
    						->where('username',$user)
    						->where('password',$pass)
    						->first();
    						

    	if($query){
    		$data = $query->toArray();

    	}

    	return $data;
    }
}

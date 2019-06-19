<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Social extends Model
{

    protected $fillable = [
        'user_id', 'provider_user_id', 'provider',
    ];
    protected $table = 'socialfb';
    public function user(){
    	return $this->belongsTo('User::class');
    }

    public function KiemTraDangNhap($id_provider,$nameProvider)
    {
    	$data = Social::where('provider_user_id',$id_provider)
    					->where('provider',$nameProvider)
    					->first();
    	if($data){
    		return true;
    	}
    	return false;
    }

    public function InsertDataSocial($data)
    {
    	$up = Social::insert($data);
    	if($up){
    		return true;
    	}
    	return false;
    }
}

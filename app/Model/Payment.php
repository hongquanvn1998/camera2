<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Payment extends Model
{
    
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'note', 'infoPd', 'status'
    ];

    public function User()
    {
        return $this->hasOne('App\User');
    }
     public function GetAllData()
    {
    	$data = Payment::select('*')->paginate(5);
    	return $data;
    }
    
}

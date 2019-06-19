<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Brand extends Model
{
    protected $table ='brand';

    public function products()
    {
    	return $this->hasMany('App\Product');
    }

    public function GetAllDataBrand()
    {
    	$data=[];
    	$query = Brand::all();
    	if($query){
    		$data=$query->toArray();
    	}
    	return $data;
    }
    public function GetAllData()
    {
        $query = Brand::select('*')->paginate(5);
        return $query;
    }
    public function InsertDataBrand($data)
    {
        $arr  = Brand::insert($data);
        if($arr){
            return true;
        }
        return false;
    }

    public function DeleteBrandById($id)
    {
        $del = DB::table('brand')
                    ->where('id',$id)
                    ->delete();
        return $del;
    }

    public function GetAllDataBrandById($id)
    {
        $query = Brand::find($id);
        return $query;
    }

    public function UpdateDataBrand($data,$id)
    {
        $up = DB::table('brand')
                    ->where('id',$id)
                    ->update($data);
        return $up;
    }
}

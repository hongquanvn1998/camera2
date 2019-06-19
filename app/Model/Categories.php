<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Categories extends Model
{
    protected $table ='categories';
    
    public function ParentCategories()
    {
        return $this->belongsTo('App\Model\ParentCategories','id_parent','id');
    }   


    public function products()
    {
    	return $this->hasMany('App\Model\Product','categories_id','id');
    }

    public function GetAllDataCategories()
    {
    	$data = [];
    	$query = Categories::all();

    	if($query){
    		$data = $query->toArray();
    	}
    	return $data;
    }

    public function GetAllIdCategoriesByIdParent($id)
    {
        // $data = DB::table('categories')
        //         ->select('id')
        //         ->where('id_parent','=',$id)->get();
        $data = Categories::select('id')->where('id_parent',$id)->get()->toArray();
        return $data;
    }
    public function GetAllDataCategorisById($id)
    {
         $query = Categories::find($id);
        return $query;
    }
    public function GetAllIdCategoriesById($id)
    {
        $data = Categories::find($id);
        return $data;
    }
    public function GetAllCategories()
    {
        $query = Categories::select('*')->paginate(5);
        return $query;
    }

    public function DeleteCategoriesById($id)
    {
        $del = DB::table('categories')
                    ->where('id',$id)
                    ->delete();
        return $del;
    }
   public function InsertDataCategories($data)
   {
    $arr  = Categories::insert($data);
        if($arr){
            return true;
        }
        return false;
   }

   public function UpdateDataCategories($data,$id)
   {
     $up = DB::table('categories')
                    ->where('id',$id)
                    ->update($data);
        return $up;
   }
}

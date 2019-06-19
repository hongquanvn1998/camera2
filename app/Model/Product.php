<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Product extends Model
{
    protected $table ='products';
    				//************ NHiều -1 *************/
    public function categories()
    {
    	return $this->belongsTo('App\Categories','categories_id','id');
    }
    public function ParentCategories()
    {
        return $this->hasManyThrough('App\Model\ParentCategories', 'App\Categories','id_parent','id_categories','id');
    }

    public function brand()
    {
    	return $this->belongsTo('App\Brand');
    }

    /*********************** Nhiều - Nhiều *************/

    public function color()
    {
    	return $this->belongsToMany('App\Color');
    }


    /******************* ParentCategories->Products *************/

    public function GetAllDataProduct()
    {
        $query = Product::select('products.*','brand.name_brand','categories.name_categories')
                                ->join('brand','brand.id','=','products.brand_id')
                                ->join('categories','categories.id','=','products.categories_id')
                                ->paginate(4);

        return $query;
    }

    public function addProductNew($data)
    {
        if(DB::table('products')->insert($data)){
            return true;
        }
        return false;
    }

    public function deleteProduct($id)
    {
        $del = DB::table('products')
                        ->where('id',$id)
                        ->delete();
        return $del;
    }

    public function GetAllDataProductsById($id)
    {
        $data = Product::find($id);
        if($data){
            $data= $data->toArray();
        }
        return $data;
    }

    public function UpdateDataById($dataUpdate ,$id)
    {
        $up = DB::table('products')
                    ->where('id',$id)
                    ->update($dataUpdate);
        return $up;
    }

    public function GetAllProductNew()
    {
        $data = Product::select('*')
                    ->orderBy('created_at','desc')
                    ->take(8)
                    ->get();
        return $data;
    }

    public function GetAllProductHot()
    {
        $data = Product::where('highlight',1)->take(7)->get();
        $data = $data->toArray();
        return $data;
    }

    public function GetAllDataByIdParent($idParent,$id)
    {
        $data = Product::select('*')
                    ->where('categories_id',$idParent)
                    ->where('id','<>',$id)
                    ->take(5)
                    ->get();
                    ////take: lấy ra bao nhiêu sản phẩm
        if($data){
            $data = $data->toArray();
        }
        return $data;
    }

    public function GetAllDataByArrId($arr)
    {
        $data = Product::select('*')
                        ->whereIn('categories_id',$arr)
                        ->paginate(6);
        return $data;
    }

    public function GetAllDataProductsByIdCate($id)
    {
        $data = Product::select('*')
                        ->where('categories_id',$id)
                        ->paginate(8);
        return $data;
    }

    public function GetAll()
    {
        $data= Product::select('*')->paginate(8);
        return $data;
    }
    public function GetAllDataSearch($name){
        $data = Product::where('name','like','%'.$name.'%')->get();
        return $data;
    }
    public function GetAllDataByArrIdNoPa($arr)
    {
        $data = Product::select('*')
                        ->whereIn('categories_id',$arr)
                        ->get();
        return $data;
    }
}

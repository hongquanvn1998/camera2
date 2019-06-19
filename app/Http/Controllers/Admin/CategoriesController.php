<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Categories;
class CategoriesController extends Controller
{
    public function index(Categories $cate)
    {
    	$data = [];
    	$info = $cate->GetAllCategories();

    	$data['link'] = $info ;
    	$arr = $info->toArray();
    	$data['info'] = $arr['data'];
    	return view('admin.categories.index',$data);
    }

    public function delete(Request $req,Categories $cate)
    {
    	if($req->ajax()){
    		$id = $req->id;
    		$del = $cate->DeleteCategoriesById($id);
    		if($del){
    			echo 'OK';
    		}else{
    			echo 'Fail';
    		}
    	}
    }

    public function add()
    {
    	return view('admin.categories.add');
    }

    public function handleAdd(Request $req,Categories $cate){
    	$name = $req->name;
    	$parent = $req->parent;
    	$status = $req->status;

    	$data = [
    		'name_categories'=>$name,
    		'status'=>$status,
    		'id_parent'=>$parent,
    		'created_at'=>Date('Y:m:d H:i:s'),
    		'updated_at'=>null
    	];
    	$up = $cate->InsertDataCategories($data);
    	if($up){
    		return redirect()->route('admin.categories');
    	}
    	return redirect()->route('admin.addCategories');
    }

    public function edit(Request $req,Categories $cate)
    {
    	$id = $req->id;
    	if($id){
    		$data['info'] = $cate->GetAllDataCategorisById($id)->toArray();
    		// dd($data['info']);
    		return view('admin.categories.edit',$data);
    	}
    	return redirect()->route('admin.categories');
    }

    public function handleEdit(Request $req ,Categories $cate)
    {
    	$name = $req->name;
        $parent= $req->parent;
        $status = $req->status;
        $id = $req->id;
        $data = [
            'name_categories'=>$name,
            'status'=>$status,
            'id_parent'=>$parent,
            'created_at'=>Date('Y:m:d H:i:s'),
            'updated_at'=>null
        ];

        $up = $cate->UpdateDataCategories($data,$id);
        if($up)
        {
            return redirect()->route('admin.categories');
        }
        return redirect()->route('admin.editCategories');
    }
}

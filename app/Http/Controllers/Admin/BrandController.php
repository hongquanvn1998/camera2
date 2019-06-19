<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brand;
class BrandController extends Controller
{
    public function index(Brand $br)
    {
    	$data = [];
    	$info = $br->GetAllData();
    	$arr = $info->toArray();
    	$data['info'] = $arr['data'];
    	$data['link'] = $info;
    	return view('admin.brand.index',$data);
    }

    public function add()
    {
    	return view('admin.brand.add');
    }

    public function handleAdd(Request $req,Brand $br)
    {
    	$name = $req->name;
    	$address = $req->address;
    	$description = $req->description;
    	$status = $req->status;

    	$data = [
    		'name_brand'=>$name,
    		'address'=>$address,
    		'status'=>$status,
    		'description'=>$description,
    		'created_at'=>Date('Y:m:d H:i:s'),
    		'updated_at'=>null

    	];

    	$up = $br->InsertDataBrand($data);
    	if($up){
    		$req->session()->flash('success','addBrand');
    		return redirect()->route('admin.brand');
    	}else{
    		$req->session()->flash('fail','addBrand');
    		return redirect()->route('admin.addBrand');
    	}
    }

    public function delete(Request $req,Brand $br)
    {
    	if($req->ajax()){
    		$id = $req->id;
    		$del = $br->DeleteBrandById($id);
    		if($del){
    			echo 'OK';
    		}else{
    			echo 'Fail';
    		}
    	}
    }
    public function edit(Request $req, Brand $br)
    {
    	$id = $req->id;
    	if($id){
    		$data['info'] = $br->GetAllDataBrandById($id)->toArray();
    		// dd($data['info']);
    		return view('admin.brand.edit',$data);
    	}
    	return redirect()->route('admin.brand');
    }
    public function handleEdit(Request $req ,Brand $br)
    {
        $name = $req->name;
        $address= $req->address;
        $status = $req->status;
        $des = $req->description;
        $id = $req->id;
        $data = [
            'name_brand'=>$name,
            'address'=>$address,
            'status'=>$status,
            'description'=>$des,
            'created_at'=>Date('Y:m:d H:i:s'),
            'updated_at'=>null
        ];

        $up = $br->UpdateDataBrand($data,$id);
        if($up)
        {
            return redirect()->route('admin.brand');
        }
        return redirect()->route('admin.editBrand');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Color;
use App\Http\Requests\EditColor;
class ColorController extends Controller
{
    public function index(Color $color)
    {
    	$data=[];
    	$infoColor = $color->GetAllData();

    	$arr = ($infoColor)? $infoColor->toArray() : [];

    	$data['infoColor']= $arr['data'];
    	$data['link'] = $infoColor;
    	return view('admin.color.index',$data);
    }

    public function add()
    {
    	return view('admin.color.add');
    }

    public function handleAdd(EditColor $req,Color $color)
    {
    	$name  = $req->nameColor;
    	$description =$req->description;
    	$status = $req->status;
    	$data = [
    		'name_color'=>$name,
    		'status'=>$status,
    		'description'=>$description,
    		'created_at'=>date('Y:m:d H:i:s'),
    		'updated_at'=>null

    	];
    	if($data){
    		$up = $color->InsertDataInColor($data);
    		if($up){
    			$req->session()->flash('addColor','success');
    			return redirect()->route('admin.color');
    		}
    		else{
    			$req->session()->flash('addColor','fail');
    			return redirect()->route('admin.handleEdit');
    		}
    	}
    	dd($name);
    }

    public function delete(Request $request,Color $color)
    {
    	if($request->ajax()){
    		$id = $request->id;

    		$del = $color->DeleteDataById($id);
    		if($del){
    			echo 'OK';
    		}else{
    			echo 'Fail';
    		}
    	}
    }
}

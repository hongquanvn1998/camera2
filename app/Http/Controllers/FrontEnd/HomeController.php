<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Requests\CheckFormSearch;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ParentCategories;
use App\Model\Categories;
use Illuminate\Support\Facades\Auth;
use App\User;
use Mail;
class HomeController extends Controller
{
    public function index(Product $pr,ParentCategories $parent)
    {   
    	$data = [];

    	/******* New **********/
    	$productNew = $pr->GetAllProductNew();

    	$arrNew = $productNew->toArray();
        // dd($arrNew);
    	$data['productNew'] = $arrNew;
    	foreach($data['productNew'] as $key =>$item){
    		$data['productNew'][$key]['url_image'] = json_decode($item['url_image'],true);
    	}

    	/********* Hot ************/

    	$productHot = $pr->GetAllProductHot();
    	$data['productHot'] = $productHot;
    	foreach($data['productHot'] as $key =>$item){
    		$data['productHot'][$key]['url_image'] = json_decode($item['url_image'],true);
    	}


    	/************* Parent Name Product **************/
    	return view('front-end.home.index',$data);
    }
    function __construct(ParentCategories $parent)
    {
        $nameParent = $parent->NameParent();
        view()->share('nameParent',$nameParent);
    }


    public function contact()
    {
        return view('front-end.home.contact');
    }
    public function introduce()
    {
        return view('front-end.home.introduce');
    }

    public function detail($id,Product $pd,Categories $cate,ParentCategories $parent)
    {
            $data = [];
            $info = $pd->GetAllDataProductsById($id);
            $idCate = $info['categories_id'];
            
            if($info['color']){
                $data['color'] = explode(',',$info['color']);
            }else{
                $data['color'] = null;
            }
            
          
            $data['info'] = $info;
            if($info['size']){
                $data['infoSize'] = json_decode($info['size'],true);
            }else{
                $data['infoSize'] = null;
            } 
            $data['infoImage'] = json_decode($info['url_image'],true);

            // dd($arr);
        
            // dd($color);
            // dd($idParent);

            $idParent = $info['categories_id'];

            $infoToo = $pd->GetAllDataByIdParent($idParent,$id);
            $data['infoToo'] = $infoToo;
            foreach($data['infoToo'] as $key =>$item){
                $data['infoToo'][$key]['url_image'] = json_decode($item['url_image']);
            }
            // name cate

             
            $nameCate = $cate->GetAllIdCategoriesById($idCate)->toArray();
            $data['namecate']= $nameCate;
            $idParentCate = $nameCate['id_parent'];
            $namePrCate = $parent->NameParentXX($idParentCate)->toArray();
            $data['namePrCate'] = $namePrCate;
           
            
        return view('front-end.home.detail',$data);
    }

    // public function product()
    // {
    //     return view('front-end.home.product');
    // }

    public function allProduct(Request $req,ParentCategories $parent,Categories $cate,Product $pd)
    {
        $id = $req->id;
        $data= [];
        // dd($id);
        $parentII = $cate->GetAllIdCategoriesByIdParent($id);
        $newArr = [];
        foreach ($parentII as $value) {
            if(is_array($value)) foreach ($value as $item) {
                $newArr[] = $item;
            }else{
                $newArr[]= $value;
            }
        }
        $parent0 = $pd->GetAllDataByArrId($newArr);

        $data['link'] = $parent0;
            
        $arr = ($parent0) ? $parent0->toArray() : [];
        $data['productInParent'] = $arr['data'];

        
        foreach ($data['productInParent'] as $key =>$item) {
            $data['productInParent'][$key]['url_image'] = json_decode($item['url_image'],true);
        }


        $data['NameParentXX'] =  $parent->NameParentXX($id)->toArray();
       
        // dd($data['NameParentXX']);
        return view('front-end.home.product-of-parent',$data);  
    }

    public function CateProduct($id,Categories $cate , ParentCategories $parent,Product $pd)
    {
        $data = [];
        /********** Lấy sản phẩm *************/
        $infoPd = $pd->GetAllDataProductsByIdCate($id);
        $arr = ($infoPd) ? $infoPd->toArray() : [];
        $data['product'] = $arr['data'];
        $data['link'] = $infoPd;

        foreach ($data['product'] as $key =>$item) {
            $data['product'][$key]['url_image'] = json_decode($item['url_image'],true);
        }
        /********* Lấy tên danh mục ********/

        $nameCate = $cate->GetAllIdCategoriesById($id)->toArray();
        $data['nameCate'] = $nameCate;
        /****** Lấy tên cha **********/
        $idParentCate = $nameCate['id_parent'];
        $data['nameParentCate'] = $parent->NameParentXX($idParentCate)->toArray();
        // dd($data['nameCate']);
        return view('front-end.home.product-of-categories',$data);
    }

    public function product(Product $pd)
    {
        $data= [];
        $infoPd = $pd->GetAll();
        $arr = $infoPd->toArray();
        $data['product'] = $arr['data'];
        foreach ($data['product'] as $key =>$item) {
            $data['product'][$key]['url_image'] = json_decode($item['url_image'],true);
        }
        $data['link'] = $infoPd;
        return view('front-end.home.product',$data);
    }
    public function search(CheckFormSearch $req,Product $pd,ParentCategories $parent,Categories $cate){
        $id = $req->search;
        // $id = is_numeric($id);
        // $id = (is_numeric($id)) ? $id : 0;
        // dd($id); 
        $nameSearch = $req->nameSearch;

        if($id ==   0){
            $data= [];
            $infoPd = $pd->GetAllDataSearch($nameSearch)->toArray();
            if($infoPd === []){
                $data['product'] = [];
                return view('front-end.home.search',$data);
                
            }else{
                $data['product'] = $infoPd;
                
                foreach ($data['product'] as $key =>$item) {
                    $data['product'][$key]['url_image'] = json_decode($item['url_image'],true);
                }
                return view('front-end.home.search',$data);
            }
        }else{
            $parentII = $cate->GetAllIdCategoriesByIdParent($id);
            $newArr = [];
            foreach ($parentII as $value) {
                if(is_array($value)) foreach ($value as $item) {
                    $newArr[] = $item;
                }else{
                    $newArr[]= $value;
                }
            }
            $parent0 = $pd->GetAllDataByArrIdNoPa($newArr)->toArray();
            // dd($parent0);
            if($parent0 ===[]){
                $data['product'] = [];
                return view('front-end.home.search',$data);
                
            }else{
                $data['product'] = $parent0;
                foreach ($data['product'] as $key =>$item) {
                    $data['product'][$key]['url_image'] = json_decode($item['url_image'],true);
                }
                return view('front-end.home.search',$data);
            }
            }        
    }

    public function sendContact(Request $req)
    {
        $name = $req->name;
        $email= $req->email;
        $phone = $req->phone;
        $message = $req->message;
        // dd($message);
        $data =[
            'name' => $name,
            'email' =>$email,
            'phone' => $phone,
            'tinnhan' => $message
        ];

        // dd($data);
        Mail::send('front-end.email.blank',$data,function($mes){
            $mes->from('Thanhbinhkma27@gmail.com','ThanhBinh');
            $mes->to('thanhbinhshop27@gmail.com','thanhBinh')->subject('Feeback');
        });
        return view('front-end.home.tkscontact');
    }
}

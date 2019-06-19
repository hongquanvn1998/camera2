<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\EditProduct;
use App\Model\Product;
use App\Model\Categories;
use App\Model\Brand;

class ProductController extends Controller
{
	public function index(Product $pd)
	{
		$data = [];

		$infoPd= $pd->GetAllDataProduct();

		$arr = ($infoPd) ? $infoPd->toArray() : 0;
		$data['infoPd'] = $arr['data'];
    // dd($data['infoPd']);


		$data['link']=$infoPd;
		// dd($data['infoPd']);
		foreach($data['infoPd'] as $key =>$item){
			$data['infoPd'][$key]['url_image']=json_decode($item['url_image'],true);
      $data['infoPd'][$key]['size']=json_decode($item['size'],true);
      // dd($data['infoPd'][$key]['sizeNumber_id']);
		}
		// dd($data['color']);
		// dd($data['infoPd']);
		return view('admin.product.index',$data);
	}

	public function add(Product $pd,Categories $cate,Brand $brand)
	{
		$data = [];
		$data['categories']=$cate->GetAllDataCategories();

		$data['brand']=$brand->GetAllDataBrand();
		return view('admin.product.add',$data);
	}

	public function HandelAdd(EditProduct $check,Product $pd)
	{
        // dd($check->all());
       $name = $check->nameProdcuts;
       $cate = $check->cate;
       $brands = $check->brands;
       $color = $check->color;
       $size=$check->size;
       $price = $check->price;
       $qty = $check->qty;
       $saleOff = $check->saleOff;
       $status = $check->status;
       $desription=$check->desription;
       $highlight= $check->highlight;
       // $ddd = $check->image;
       // // s
       // dd($size);
       $arrNameFile = [];
       if($check->hasFile('images')){
            $file = $check->file('images');
            $extension = ['png','jpg','JPG','jepg','gif'];
            foreach ($file as $key => $item) {
                $name_file = $item->getClientOriginalName();

                $exFile = $item->getClientOriginalExtension();
                 
                if(in_array($exFile, $extension)){
                    $item->move('upload/image',$name_file);
                    $arrNameFile[] = $name_file;
                    // $arrNameFile=json_encode($arrNameFile);
                   
                }
                
            }
       }

       if($arrNameFile){
            $dataInsert = [
                'name'=>$name,
                'brand_id'=>$brands,
                'color'=>$color,
                
                'categories_id'=>$cate,
                'size'=>json_encode($size),
                'price'=>$price,
                'quantity'=>$qty,
                'sale_off'=>$saleOff,
                'description'=>$desription,
                'url_image'=>json_encode($arrNameFile),
                'highlight'=>$highlight,
                'status'=>$status,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>null
            ];
            // dd($dataInsert);
            if($pd->addProductNew($dataInsert)){
                $check->session()->flash('addPd','success');
                return redirect()->route('admin.product');
            }
            else{
                $check->session()->flash('addPd','fail');
                return redirect()->route('admin.AddProduct');
            }

       }else{
            $check->session()->flash('errImage','Can not upload file');
            return redirect()->route('admin.AddProduct');
       }
    }

    public function delete(Request $request , Product $pd)
    {
    	if($request->ajax()){
            $id = $request->id;

            $del = $pd->deleteProduct($id);
            
            if($del){
                echo("OK");
            }
            else{
                echo("Fail");
            }
        }
    }

    public function edit($id,Product $pd, Categories $cate,Brand $brand)
    {
    	$id = is_numeric($id) ? $id : 0;
        $infoPd = $pd->GetAllDataProductsById($id);
        // dd($infoPd );
        if($infoPd){
            $data = [];
            $data['cates'] = $cate->getAllDataCategories();

            $data['brand'] = $brand->getAllDataBrand();

            $data['info']= $infoPd;
            $data['infoImage']=json_decode($infoPd['url_image'],true);
            $data['infoSize']=json_decode($infoPd['size'],true);
            // dd($data['info']);
            return view('admin.product.edit',$data);

        }
        else{
            abort(404);
        }
    }

    public function handleEdit(EditProduct $check , Product $pd)
    {
      $id  = $check->id;

      $data = $pd->GetAllDataProductsById($id);
      if($data){
        $name = $check->nameProdcuts;
         $cate = $check->cate;
         $brands = $check->brands;
         $color = $check->color;
         $size=$check->size;
         $price = $check->price;
         $qty = $check->qty;
         $saleOff = $check->saleOff;
         $status = $check->status;
         $new = $check->new;
         $highlight = $check->highlight;
         $desription=$check->desription;
         // dd($highlight);
          $arrNameFile2 = json_decode($data['url_image'],true);
         $arrNameFile = [];
         if($check->hasFile('images')){
              $file = $check->file('images');
              $extension = ['png','jpg','JPG','jepg','gif'];
              foreach ($file as $key => $item) {
                  $name_file = $item->getClientOriginalName();

                  $exFile = $item->getClientOriginalExtension();
                   
                  if(in_array($exFile, $extension)){
                      $item->move('upload/image',$name_file);
                      $arrNameFile[] = $name_file;
                      // $arrNameFile=json_encode($arrNameFile);           
                  }
              }
            }
            $arrNameFile2 = ($arrNameFile) ? $arrNameFile : $arrNameFile2;
           if($arrNameFile){
            $dataUpdate = [
                'name'=>$name,
                'brand_id'=>$brands,
                'color'=>$color,
                
                'categories_id'=>$cate,
                'size'=>json_encode($size),
                'price'=>$price,
                'quantity'=>$qty,
                'sale_off'=>$saleOff,
                'description'=>$desription,
                'url_image'=>json_encode($arrNameFile2),
                'highlight'=>$highlight,
                'status'=>$status,
                'created_at'=>date('Y-m-d H:i:s'),
                'updated_at'=>null
            ];
            // dd($dataUpdate);
            $up = $pd->UpdateDataById($dataUpdate,$id);
            if($up){
                $check->session()->flash('editPd','success');
                return redirect()->route('admin.product');
            }
            else{
                $check->session()->flash('editPd','fail');
                return redirect()->route('admin.editProduct');
            }

       }else{
            $check->session()->flash('errImage','Can not upload file');
            return redirect()->route('admin.editProduct');
       }
      }
    }
}

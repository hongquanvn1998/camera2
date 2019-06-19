<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Product;
use App\Model\ParentCategories;
use Gloudemans\Shoppingcart\Facades\Cart;
class CartController extends Controller
{
    public function cart(Request $req,Product $pd)
    {
    	if($req->ajax()){
    		$id = $req->id;
    		$qty = $req->qty;
    		$color = $req->color;
    		$size = $req->size;
    		$infoPd = $pd->GetAllDataProductsById($id);

    		if($infoPd && is_numeric($qty)){
    			// tien hanh add vao gio hang
    			Cart::add([
    				'id'=>$id,
    				'name'=>$infoPd['name'],
    				'qty'=>$qty,
    				'price'=>$infoPd['price'],

    				'options'=>[
    					'images' => json_decode($infoPd['url_image'],true),
    					'color'  => $color,
    					'size'   => $size,
    					'sale' =>$infoPd['sale_off'],
    				]
    			]);
    			echo 'OK';

    		}else{
    			echo 'FAIL';
    		}
    	}
    }
    function __construct(ParentCategories $parent)
    {
        $nameParent = $parent->NameParent();
        view()->share('nameParent',$nameParent);
    }

    public function showCart()
    {
    	$data = [];

    	$data['cart'] = Cart::content();
    	// dd($data['cart']); 
    	return view('front-end.cart.showCart',$data);
    }

    public function deleteCart(Request $req)
    {
    		$id = $req->id;
    		Cart::remove($id);
    		echo 'OK';
    }

    public function updateCart(Request $req)
    {
    	$id = $req->id;
    	$qty = $req->qty;
    	Cart::update($id,$qty);
    	echo 'OK';
    }
}

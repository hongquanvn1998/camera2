<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Model\ParentCategories;
use App\Model\Payment;
class PaymentController extends Controller
{
	function __construct(ParentCategories $parent)
    {
        $nameParent = $parent->NameParent();
        view()->share('nameParent',$nameParent);
    }
    public function index()
    {
    	$data = [];

    	$data['cart'] = Cart::content();
    	return view('front-end.payment.index',$data);
    }

    public function PayOrder(Request $req,Payment $pay,$id)
    {

        $infoPd = Cart::content();
        // $tt = json_decode($infoPd,true);
        // $ddd  = substr($tt, 86,2);
        // foreach ($tt as $item) {
        //     $ee[] = $item['id'];
        //     $ff[]=$item['qty'];
        // }
        // dd($ee);
        // dd($tt);
        if($infoPd){
            $pay = Payment::create([
                'user_id'=> $id,
                'note' => $req->note,
                'infoPd' =>json_encode($infoPd,true),
                'created_at'=>date('Y:m:d H:i:s'),
                'updated_at'=>null,
            ]);
            
            
            if($pay){
                Cart::destroy();
                return redirect()->route('home');
            }
        }else{
            return redirect()->route('showCart');
        }
        
        
    }

    public function order(Request $req,$id)
    {
        $data['aaa'] = Payment::where('user_id',$id)->get()->toArray();
        $ddd['bbbe']=$data['aaa']['infoPd'];
        dd($ddd['bbbe']);
        return view('front-end.cart.status',$data);
    }
}

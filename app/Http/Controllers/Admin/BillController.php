<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\User;
use Carbon\Carbon;
use PDF;
class BillController extends Controller
{
    public function index(Payment $pay)
    {
    	$data = [];

    	$info = $pay->GetAllData();
        // dd($info);
    	$arr = $info->toArray();
    	$data['link'] = $info;
        // dd($arr);
    	$data['infoPay'] = $arr['data'];
    		
    	foreach($data['infoPay'] as $key =>$item){
    		$data['infoPay'][$key]['infoPd'] = json_decode($item['infoPd'],true);
    	}
    	// dd($data['infoPay']);
    	return view('admin.bill.index',$data);
    }

    public function detailBill($id)
    {
        $data = Payment::find($id);
        $data =$data->toArray();
        $data['product'] = json_decode($data['infoPd'],true);

        $ddd = User::find($data['user_id']);
        $data['name'] = $ddd->name;
        $data['address'] = $ddd->address;
        $data['phone'] = $ddd->phone;
        $data['date'] =Carbon::now();
        $data['id'] = $id;
        return view('admin.bill.detail',$data);
    }

    public function pdf($id)
    {
        $data = Payment::find($id);
        $data =$data->toArray();
        $data['product'] = json_decode($data['infoPd'],true);

        $ddd = User::find($data['user_id']);
        $data['name'] = $ddd->name;
        $data['address'] = $ddd->address;
        $data['phone'] = $ddd->phone;
        $data['date'] =Carbon::now();
        $data['id'] = $id;
        $pdf = PDF::loadView('admin.bill.pdfview',$data);
       return $pdf->download('admin.bill.pdfview.pdf');
    }
}

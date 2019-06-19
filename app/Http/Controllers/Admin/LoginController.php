<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckLogin;
use App\Model\admin;
use App\Model\Social;
use App\Model\CodeMail;
use App\Model\RePass;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use App\Http\Requests\CheckSignIn;
use App\Http\Requests\CheckRegister;
use Illuminate\Support\Str;
use Mail;
use App\Mail\Verify;
use App\Mail\verifyPass;
class LoginController extends Controller
{
    public function index()
    {
        return view('front-end.login.index.login');
    }
    
    public function handleLogin(Request $req)
    {
        $email = $req->email;
        $pass = $req->pass;
        // dd($pass);
        $ifo = [
            'email'=>$email,
            'password' => $pass
        ];
        // dd($ifo);
        // dd(Auth::attempt());

            if(Auth::attempt($ifo)){
                return redirect()->route('home');
            }else{
                return redirect()->route('DangNhap');
            }
        }
        

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
    public function signin()
    {
        return view('front-end.login.register.index');
    }

    public function handleSignin(Request $req){
        $user = new User;
        $user->name = $req->username;
        $user->email = $req->email;
        $user->password = bcrypt($req->pass);
        $user->save();

        if($user){
            $cod = CodeMail::create([
                'user_id' =>$user->id,
                'code' =>Str::random(6),
                'created_at'=>Date('Y:m:d H:i:s'),
                'updated_at'=>null,
            ]);
        }

        $data = [
            'name'=>$user->name,
            'code'=>$cod->code,
            'id' =>$user->id
        ];
        $email = $req->email;
        // dd($email);
        Mail::to($email)->send(new Verify($data));
        return view('front-end.login.register.confirm',$data);
    }
    public function verify(Request $req)
    {
        $dd = CodeMail::where('code',$req->cod)->first();
        if($dd){
            $id_u = $dd->user_id;
            $us = User::where('id',$id_u)->first();
            $us->status = 1;
            $us->save();
            return redirect()->route('DangNhap');
        }else{
             return view('front-end.login.register.confirm');
        }
        
    }

    public function reVerify($id)
    {
        $dd = CodeMail::where('user_id',$id)->first();
        $dd->code = Str::random(6);
        $dd->save();
        $us = User::where('id',$id)->first();

        $data = [
            'name'=>$us->name,
            'code'=>$dd->code,
            'id'=>$id
        ];
        $email = $us->email;
        Mail::to($email)->send(new Verify($data));
        return view('front-end.login.register.confirm',$data);
    }

    public function forgot()
    {
        return view('front-end.login.repass.repass');
    }
    public function confirmMail(Request $req)
    {
        $email =$req->email;
        $us = User::where('email',$email)->first();
        $id = $us->id;
        $code = RePass::create([
            'user_id'=>$id,
            'code'=>Str::random(6)
        ]);
        $data = [
            'name'=>$us->name,
            'id'=>$id,
            'code'=>$code->code,
        ];
        Mail::to($email)->send(new verifyPass($data));
        return view('front-end.login.repass.confirm',$data);
    }

    public function confirmPass(Request $req)
    {
        $cod = $req->cod;
        $cd = RePass::where('code',$cod)->first();

        $id = $cd->user_id;
        $data = [
            'id'=>$id,
        ];
        if($cd){
            return view('front-end.login.repass.pass',$data);
        }else{
            return redirect()->route('forgot');
        }
    }

    public function changePass(Request $req,$id)
    {
        $pass = $req->pass;

        $cr = User::where('id',$id)->first();
        $cr->password = bcrypt($pass);
        $cr->save();
        return redirect()->route('DangNhap');
    }

    public function recodepas($id)
    {
        $dd = RePass::where('user_id',$id)->first();
        $dd->code = Str::random(6);
        $dd->save();
        $us = User::where('id',$id)->first();
        
        $data = [
            'name'=>$us->name,
            'code'=>$dd->code,
            'id'=>$id
        ];
        $email = $us->email;
        Mail::to($email)->send(new verifyPass($data));
        return view('front-end.login.repass.confirm',$data);
    }
}

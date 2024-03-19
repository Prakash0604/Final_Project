<?php

namespace App\Http\Controllers;

use App\Models\network;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function loadregister(){
        return view('index');
    }
    public function storeregister(Request $request){
        $request->validate([
            'full_name'=>'required',
            'email'=>'email|required',
            'password'=>'required',
        ]);
        $referal_code=Str::random(15);
        $token=Str::random(50);
        if(isset($request->referal_code)){
            $referal=User::where('referal_code',$request->referal_code)->get();
            if(count($referal)>0){
               $UserId= User::insertGetId([
                    'name'=>$request->full_name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'referal_code'=>$referal_code,
                    'remember_token'=>$token,
                ]);
                $network=network::insert([
                    'referal_code'=>$request->referal_code,
                    'user_id'=>$UserId,
                    'parent_user_id'=>$referal[0]['id'],
                ]);
                return redirect('/register')->with('referalcode','Register successfully ! Please verify your email now');
            }else{
                return redirect('/register')->with('codeinv','Invalid Referal Code');
            }

        }else{
            User::insert([
                'name'=>$request->full_name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'referal_code'=>$referal_code,
                'remember_token'=>$token,
            ]);
            $domain=URL::to('/');
            $data['url']=$domain.'/verifynow/'.$token;
            $data['name']=$request->full_name;
            $data['email']=$request->email;
            $data['password']=$request->password;
            $data['title']="Referal Code";
            Mail::send('mail.mailtemplate',['data'=>$data],function($message) use($data){
                $message->to($data['email'])->subject($data['title']);
            });
            return redirect('/register')->with('register','Please verify your email now');
        }
    }
    public function verify($token){
        $token=User::where('remember_token',$token)->get();
        if(count($token) > 0){
            if($token[0]['is_verified']==1){
                return view('errorfolder.error2',['message'=>'Email Already Verified']);
            }
            else{
                $update=User::where('id',$token[0]['id'])->update([
                    'is_verified'=>1,
                    'email_verified_at'=>date('Y-m-d H:i:s'),
                ]);
                return view('errorfolder.error1',['message'=>'Email Has been verified']);
            }
        }else{
            return abort('401');
        }
    }
    public function loadlogin(){
        return view('login');
    }
    public function storelogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $login=User::where('email',$request->email)->get();
        if(count($login) >0){
            if($login[0]['is_verified']==0){
                return back()->with('invalid','Email not verified yet');
            }else{
                $Auth=$request->only('email','password');
                if(Auth::attempt($Auth)){
                    $request->session()->put('email');
                    return redirect('/dashboard');
                }else{
                    return back()->with('invalid','Invalid login Crediantials');
                }
            }
        }else{
            return back()->with('invalid','Email not register yet');
        }
    }
    
}

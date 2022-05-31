<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use App\Models\Cart;

class loginRegisterCon extends Controller
{
    public function loginPage(){
        return view('font_end.login');
    }

    public function userRegister(Request $request){
        $data = $request->validate([
            'name'=>'required',
            'email'=>['required','unique:users'],
            'password'=>'required',
        ]);

        User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=>bcrypt($data['password']),
        ]);
        $creads = $request->only('email','password');
        if(Auth::attempt($creads)){
            //update session_id to user_id in the cart
            if(!empty(Session::get('session_id'))){
                $user_id = Auth::user()->id;
                $session_id = Session::get('session_id');
                Cart::where('session_id',$session_id)->update(['user_id'=>$user_id]);
            }
            return redirect('/cart');
        }
        return redirect('/cart');
    }

    public function userLogin(Request $request){
        $data = $request->validate([
           
            'email'=>'required',
            'password'=>'required',
        ]);
        $creads = $request->only('email','password');
        if(Auth::attempt($creads)){
            //update session_id to user_id in the cart
            //$session_id = Session::get('session_id');
            // if(!empty(Session::get('session_id'))){
            //     $user_id = Auth::user()->id;
            //     Cart::where('session_id',Session::get('session_id'))->update(['user_id'=>$user_id]);
            // }
            return redirect('/cart');
        }else{
                 return back()->with('error','your creadintial are not match');
        }
        
    

    }

    public function userLogout(){
        Auth::logout();
        return redirect('/login');
    }
}

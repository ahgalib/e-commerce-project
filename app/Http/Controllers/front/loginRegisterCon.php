<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

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
            return redirect('/cart');
        }else{
                 return back()->with('error','your creadintial are not match');
        }
        
        // if(User::where(['email'=>$data['email'],'password'=>$data['password']])){
        //     return redirect('/cart');
        // }else{
        //     return back()->with('error','your creadintial are not match');
        // }

    }

    public function userLogout(){
        Auth::logout();
        return redirect('/login');
    }
}

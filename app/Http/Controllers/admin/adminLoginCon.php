<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Auth;


class adminLoginCon extends Controller
{
    public function index(Request $req){
        
        return view('admin.admin_login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required',
            'password'=>'required',
        ]);
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
             return redirect('admin/dashboard');
        }else{
             return back()->with('fail','Incorrect credentials');
        }
         //THIS IS ANOTHER WAY FOR LOGIN
        // if(Auth::guard('admin')->attempt(['email'=>$request['email'],'password'=>$request['password']])){
        //     return redirect('admin/dashboard');
        // }else{
        //     return back()->with('fail','Incorrect credentials');
        // }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
        
    }
}

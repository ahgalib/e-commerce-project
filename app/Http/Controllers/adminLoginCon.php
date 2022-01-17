<?php

namespace App\Http\Controllers;

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
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
        
    }
}


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
        // $data = $req->input();
        //  if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password']])){
        //      return redirect('admin/dashboard');
        //     // return redirect()->back();
        //  }else{
        //     return redirect()->back();
        //  }
        $creds = $request->only('email','password');
        if(Auth::guard('admin')->attempt($creds)){
            return redirect('admin/dashboard');
        }else{
            return back();
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
        
    }
}


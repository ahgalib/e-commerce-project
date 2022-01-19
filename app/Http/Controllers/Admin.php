<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Hash;
class Admin extends Controller
{
    public function index(){
        return view('admin.admin');
    }

    public function setting_index(){
        $data = Auth::guard('admin')->user();
        return view('admin.admin_setting',['data'=>$data]);
    }

    public function checkCurrentPassword(Request $request){
        $data =  $req->request();
       // echo print_r($data);die;
       if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
           echo "true";
       }else{
           echo "false";
       }
    }
}

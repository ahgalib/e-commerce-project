<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminCon extends Controller
{
    public function index(){
        return view('admin.admin');
    }

    public function setting_index(){
        $data = Auth::guard('admin')->user();
        return view('admin.admin_setting',['data'=>$data]);
    }

    // public function checkCurrentPassword(Request $request){
    //     $data =  $request->request();
    //    // echo "<pre>";print_r($data);die;
    //      if(Hash::check($data['current_password'],Auth::guard('admin')->user()->password)){
    //          echo "true";
    //      }else{
    //      echo "false";
    //      }
    //  }

    public function updateCurrentPassword(Request $request){
        $request->validate([
            'current_password'=>['required','string','min:6'],
            'password'=>['required', 'string', 'min:6', 'confirmed'],
        ]);
       
        if(Hash::check($request['current_password'],Auth::guard('admin')->user()->password)){
        admin::where('id',Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($request['password'])]);
        return back()->with('success','Password has been updated successfully');
        }else{
        return back()->with('fail','your corrent password is incorrect');
        }
    }

    public function showAdminDetailsPage(){
        $data = Auth::guard('admin')->user();
        return view('admin.admin-details',['data'=>$data]);
    }

    public function updateAdminDetailsPage(Request $request){
        $data = request()->validate([
            'name'=>['required','string'],
            'email'=>'required',
            'type'=>'required',
            'mobile'=>'required',
            'image'=>'',
        ]);
        if(request('image')){
            $imagePath = request('image')->store('profile','public');
            $imageArray = ['image'=>$imagePath];
        }
        Auth::guard('admin')->user()->update(array_merge(
            $data,
            $imageArray ?? [],
        ));
        return redirect('/admin/dashboard');
    }
}


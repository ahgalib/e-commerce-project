<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CuponCode;

class CuponCon extends Controller
{
    public function showCuponPage(){
        $cupon = CuponCode::all();
        return view('admin.cupon.cupon',compact('cupon'));
    }

    public function showAddCupon(){
        return view('admin.cupon.addcupon');
    }

    public function saveAddCupon(Request $request){
        $request->validate([
            'cupon_code'=>'required',
            'amount'=>'required'
        ]);

        CuponCode::create([
            'cupon_code'=>$request['cupon_code'],
            'amount'=>$request[ 'amount'],
            'expiry_date'=>$request['expiry_date'],
            'status'=>$request['status'],
        ]);
        return redirect('/admin/cupon');
    }
}

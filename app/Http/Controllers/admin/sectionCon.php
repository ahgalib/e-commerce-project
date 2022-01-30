<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\section;

class sectionCon extends Controller
{
    public function showSectionPage(){
        $data = section::all();
        return view('admin.section.section',['data'=>$data]);
    }

    public function updateSectionStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            // echo "<pre>";print_r($data);die;
            if($data['status'] =="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            section::where('id',$data['section_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'section_id'=>$data['section_id']]);
        }
    }
}

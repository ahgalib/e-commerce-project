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
}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class sectionCon extends Controller
{
    public function showSectionPage(){
        return view('admin.section.section');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class adminLoginCon extends Controller
{
    public function index(){
      
        return view('admin.admin_login');
    }
}

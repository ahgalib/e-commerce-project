<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;

class categoryCon extends Controller
{
    public function showCategoriesPage(){
        $data = category::all();
        return view('admin.categories.categories',compact('data'));
    }
}

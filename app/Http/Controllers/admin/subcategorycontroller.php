<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class subcategorycontroller extends Controller
{
    public function index(){
        return view('admin.sub_category.create');
    }
    public function manage(){
        return view('admin.sub_category.manage');
    }
}

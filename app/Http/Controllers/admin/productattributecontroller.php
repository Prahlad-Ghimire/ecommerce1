<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productattributecontroller extends Controller
{
    public function index(){
        return view('admin.product_attribute.create');
    }
    public function review_manage(){
        return view('admin.product_attribute.manage');
    }
}

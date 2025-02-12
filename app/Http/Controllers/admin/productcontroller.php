<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    public function index(){
        return view('admin.product.manage');
    }
    public function review_manage(){
        return view('admin.product.manage_product_review');
    }
}

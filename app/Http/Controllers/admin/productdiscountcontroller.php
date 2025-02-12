<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class productdiscountcontroller extends Controller
{
    public function index(){
        return view('admin.discount.create');
    }
    public function review_manage(){
        return view('admin.discount.manage');
    }
}

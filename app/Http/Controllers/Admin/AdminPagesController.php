<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index(){
        return view('admin.layouts.app');
    }
    
    public function listProduct(){
        $products = Product::all();
        return view('admin.products.list',compact('products'));
    }
    public function addProduct(){
        return view('admin.products.add');
    }
    public function listBrand(){
        $products = Product::all();
        return view('admin.brand.list',compact('products'));
    }
    public function addBrand(){
        return view('admin.brand.add');
    }
    public function listAdmin(){
        $products = Product::all();
        return view('admin.account.listAdmin',compact('products'));
    }
    public function listUser(){
        $products = Product::all();
        return view('admin.account.listUser',compact('products'));
    }
    public function addAdmin(){
        return view('admin.account.addAdmin');
    }
    public function updateInterface(){
        return view('admin.interface.update');
    }

}

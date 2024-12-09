<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminPagesController extends Controller
{
    public function index(){
        return view('admin.layouts.app');
    }
    
    public function listProduct(){
        $products = Product::paginate(12);
        return view('admin.products.list',compact('products'));
    }
    public function addProduct(){
        return view('admin.products.add');
    }
    public function listBrand(){
        $listBrand = Brand::paginate(12);
        return view('admin.brand.list',compact('listBrand'));
    }
    public function addBrand(){
        return view('admin.brand.add');
    }
    public function listAdmin(){
        return view('admin.account.listAdmin');
    }
    public function listUser(){
        return view('admin.account.listUser');
    }
    public function addAdmin(){
        return view('admin.account.addAdmin');
    }
    public function updateInterface(){
        return view('admin.interface.update');
    }

}

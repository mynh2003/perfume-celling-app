<?php

namespace App\Http\Controllers\UI;

use App\Models\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('ui.pages.index', compact('products'));
    }

    public function products()
    {
        $products = Product::paginate(12);
        return view('ui.pages.products', compact('products'));
    }
    

    public function about() {
        return view('ui.pages.about');
    }

    public function contact() {
        return view('ui.pages.contact');
    }
}

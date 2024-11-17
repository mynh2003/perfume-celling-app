<?php

namespace App\Http\Controllers\UI;

use App\Models\Product;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
        return view('ui.pages.index');
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

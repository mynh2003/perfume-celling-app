<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function getProductDetails($id)
    {
        $product = Product::with(['category', 'brand'])->findOrFail($id);

        return response()->json([
            'name' => $product->name,
            'details' => $product->details,
            'brand' => $product->brand->name ?? 'N/A',
            'price' => $product->price,
            'price_buy' => $product->price_buy,
            'quantity' => $product->quantity,
            'category' => $product->category->name ?? 'N/A',

            'origin' => $product->origin ?? 'N/A',
            'rel' => $product->rel ?? 'N/A',
            'fragranceGroup' => $product->fragrance_group ?? 'N/A',
            'style' => $product->style ?? 'N/A',

            'images' => [
                $product->image_1 ?? '',
                $product->image_2 ?? '',
                $product->image_3 ?? '',
            ],
        ]);
    }

    public function ProductWithCategory(Request $request, $category_id)
    {
        $products = Product::with(['category'])
            ->where('category_id', $category_id)
            ->paginate(12); // Hiển thị 12 sản phẩm mỗi trang

        return view('pages.products', compact('products', 'category_id'));
    }

    /// note


}

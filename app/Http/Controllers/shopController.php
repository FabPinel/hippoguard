<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class shopController extends Controller
{
    public function getProductById($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return abort(404);
        }

        $categoryId = $product->id_category;

        $relatedProducts = Product::where('id_category', $categoryId)
            ->where('id', '!=', $product->id)
            ->take(5)
            ->get();

        return view('shop.product', compact('product', 'relatedProducts'));
    }
}

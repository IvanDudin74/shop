<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Product $product) {
        $reviews = Review::all()->where('product_id', $product->id);
        return view('product.show', compact('product', 'reviews'));
    }
}

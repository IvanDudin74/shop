<?php

namespace App\Http\Controllers\ProductImage;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(ProductImage $productImage) {
        return view('product_image.show', compact('productImage'));
    }
}

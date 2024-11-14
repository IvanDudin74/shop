<?php

namespace App\Http\Controllers\ProductImage;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(ProductImage $productImage) {
        Storage::disk('public')->delete($productImage->file_path);
        $productImage->delete();
        return redirect()->route('product.edit', $productImage->product_id);
    }
}

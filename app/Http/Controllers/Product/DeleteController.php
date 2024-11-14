<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Product $product) {
        try {
            DB::beginTransaction();
            foreach ($product->productImages as $productImage) {
                Storage::disk('public')->delete($productImage->file_path);
            }
            $product->productImages()->delete();
            $product->colors()->detach();
            $product->tags()->detach();
            $product->reviews()->delete();
            $product->delete();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $errorMessage = 'Нельзя удалить этот товар так как на него есть ссылки из других таблиц';
            return view('error.index', compact('errorMessage'));
        }
        return redirect()->route('product.index');
    }
}

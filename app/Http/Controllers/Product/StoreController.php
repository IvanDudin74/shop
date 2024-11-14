<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            if ((isset($data['tag_ids'])) || (isset($data['color_ids'])) || (isset($data['product_images']))) {
                if (isset($data['tag_ids'])) {
                    $tag_ids = $data['tag_ids'];
                    unset($data['tag_ids']);
                }
                if (isset($data['color_ids'])) {
                    $color_ids = $data['color_ids'];
                    unset($data['color_ids']);
                }
                $product_images = $data['product_images'];
                unset($data['product_images']);
                $product = Product::create($data);
                if (isset($tag_ids)) {
                    $product->tags()->attach($tag_ids);
                }
                if (isset($color_ids)) {
                    $product->colors()->attach($color_ids);
                }
                foreach ($product_images as $product_image) {
                    $filePath = Storage::disk('public')->put('/images', $product_image);
                    ProductImage::create(
                        [
                            'product_id' => $product->id,
                            'file_path' => $filePath,
                        ]);
                }
            }
            else {
                Product::create($data);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return redirect()->route('product.index');
    }
}

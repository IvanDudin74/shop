<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }

            if ((isset($data['tag_ids'])) || (isset($data['color_ids']))) {
                if (isset($data['tag_ids'])) {
                    $tag_ids = $data['tag_ids'];
                    unset($data['tag_ids']);
                }
                if (isset($data['color_ids'])) {
                    $color_ids = $data['color_ids'];
                    unset($data['color_ids']);
                }
                $product = Product::create($data);
                if (isset($tag_ids)) {
                    $product->tags()->attach($tag_ids);
                }
                if (isset($color_ids)) {
                    $product->colors()->attach($color_ids);
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

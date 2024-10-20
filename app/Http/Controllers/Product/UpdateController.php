<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product) {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            if (isset($data['preview_image'])) {
                if ($product->preview_image) {
                    Storage::disk('public')->delete($product->preview_image);
                }
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['tag_ids'])) {
                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);
                $product->tags()->sync($tag_ids);
            }
            else {
                $product->tags()->detach();
            }
            if (isset($data['color_ids'])) {
                $color_ids = $data['color_ids'];
                unset($data['color_ids']);
                $product->colors()->sync($color_ids);
            }
            else {
                $product->colors()->detach();
            }
            if (isset($data['is_published'])) {
                $data['is_published'] = true;
            }
            else {
                $data['is_published'] = false;
            }
            $product->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
        return redirect()->route('product.show', $product->id);
    }
}

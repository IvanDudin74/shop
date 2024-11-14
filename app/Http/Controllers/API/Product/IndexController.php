<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\Product\IndexRequest;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request) {
        $data = $request->validated();
        //dump($data);
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        if ($data['sort'] == 1) {
            $products = Product::filter($filter)->where('is_published', true)->orderBy('price', 'ASC')->paginate(9, ['*'], 'page', $data['page']);
        }
        else {
            if ($data['sort'] == 2) {
                $products = Product::filter($filter)->where('is_published', true)->orderBy('price', 'DESC')->paginate(9, ['*'], 'page', $data['page']);
            }
            else {
                $products = Product::filter($filter)->where('is_published', true)->paginate(9, ['*'], 'page', $data['page']);
            }
        }
        return ProductResource::collection($products);
    }
}

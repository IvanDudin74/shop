<?php

namespace App\Http\Controllers\API\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Review\IndexRequest;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke(IndexRequest $request) {
        $data = $request->validated();
        $reviews = Review::all()->where('product_id', $data['product_id']);
        return ReviewResource::collection($reviews);
    }
}

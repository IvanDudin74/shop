<?php

namespace App\Http\Controllers\API\Review;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Review\StoreRequest;
use App\Models\Review;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $review = Review::create($data);
        return $review;
    }
}

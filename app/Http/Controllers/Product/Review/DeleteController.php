<?php

namespace App\Http\Controllers\Product\Review;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Review $review) {
        $review->delete();
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Resources\Order\IndexResource;
use App\Models\Order;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke() {
        $data = Order::all()->where('user_id', auth()->user()->id);
        return IndexResource::collection($data);
    }
}

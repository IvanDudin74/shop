<?php

namespace App\Http\Controllers\API\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Models\Order;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $data['date'] = date('Y-m-d H:i:s');
        $data['user_id'] = auth()->user()->id;
        $data['is_paid'] = false;
        $order = Order::create($data);
        return response($order);
    }
}

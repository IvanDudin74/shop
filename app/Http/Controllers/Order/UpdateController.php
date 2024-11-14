<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(Order $order) {
        $order->is_shipped ? $data['is_shipped'] = false : $data['is_shipped'] = true;
        $order->update($data);
        return redirect()->route('order.show', $order->id);
    }
}

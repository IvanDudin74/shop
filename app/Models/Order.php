<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use softDeletes;

    const IS_PAID_FALSE = 0;
    const IS_PAID_TRUE = 1;

    const IS_SHIPPED_FALSE = 0;
    const IS_SHIPPED_TRUE = 1;

    public $table = 'orders';
    public $guarded = false;

    public $casts = [
        'products' => 'json',
    ];

    public function getDateInFormatAttribute() {
        $date = Carbon::parse($this->created_at);
        return $date->format('d-m-Y --- H:i');
    }

    static function getIsPaid() {
        return [
            self::IS_PAID_FALSE => 'НЕ ОПЛАЧЕНО',
            self::IS_PAID_TRUE => 'ОПЛАЧЕНО',
        ];
    }

    public function getIsPaidAsTextAttribute() {
        return self::getIsPaid()[$this->is_paid];
    }

    static function getIsShipped() {
        return [
            self::IS_SHIPPED_FALSE => 'НЕ ОТГРУЖЕНО',
            self::IS_SHIPPED_TRUE => 'ОТГРУЖЕНО',
        ];
    }

    public function getIsShippedAsTextAttribute() {
        return self::getIsShipped()[$this->is_shipped];
    }

    public function getProductsAsJsonAttribute() {
        if (is_array($this->products)) {
            return $this->products;
        }
        else {
            return json_decode($this->products, true);
        }
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

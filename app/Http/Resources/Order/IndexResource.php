<?php

namespace App\Http\Resources\Order;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\ProductImage\ProductImageResource;
use App\Http\Resources\Tag\TagResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'date_in_format' => $this->dateInFormat,
            'total_sum' => $this->total_sum,
            'is_paid_as_text' => $this->isPaidAsText,
            'is_shipped_as_text' => $this->isShippedAsText,
        ];
    }
}

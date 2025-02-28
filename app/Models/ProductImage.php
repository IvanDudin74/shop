<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory;
    public $table = 'product_images';
    public $guarded = false;

    public function getImageUrlAttribute() {
        return url('storage/' . $this->file_path);
    }
}

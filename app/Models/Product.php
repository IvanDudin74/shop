<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use Filterable;

    const IS_PUBLISHED_FALSE = 0;
    const IS_PUBLISHED_TRUE = 1;
    const MAX_COUNT_IMAGES = 3;

    public $table = 'products';
    public $guarded = false;

    static function getIsPublished() {
        return [
            self::IS_PUBLISHED_FALSE => 'НЕ ОПУБЛИКОВАНО',
            self::IS_PUBLISHED_TRUE => 'ОПУБЛИКОВАНО',
        ];
    }

    public function getIsPublishedAsTextAttribute() {
        return self::getIsPublished()[$this->is_published];
    }

    public function getOldPriceAttribute() {
        return (($this->price)/100) * 120;
    }

    public function getImageUrlAttribute() {
        if ($this->preview_image) {
            return url('storage/' . $this->preview_image);
        }
        else {
            return url('storage/images/default.jpg');
        }
    }

    public function getMaxCountImagesAttribute() {
        return self::MAX_COUNT_IMAGES;
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function colors() {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'product_id', 'id');
    }
}

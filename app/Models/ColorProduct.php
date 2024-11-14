<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ColorProduct extends Model
{
    use HasFactory;
    public $table = 'color_product';
    public $guarded = false;
}

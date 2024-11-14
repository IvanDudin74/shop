<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;

    public $table = 'reviews';
    public $guarded = false;

    public function getCreatedAtInFormatAttribute() {
        $date = Carbon::parse($this->created_at);
        return $date->translatedFormat('d F Y');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}

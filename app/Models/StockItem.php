<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StockItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'variant_id',
        'quantity',
        'location',
    ];

    protected $casts = [
        'quantity' => 'integer',
    ];
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id');
    }
}
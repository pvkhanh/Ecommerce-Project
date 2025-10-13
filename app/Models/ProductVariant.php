<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_id',
        'name',
        'sku',
        'price',
    ];

    protected $casts = [
        'price' => 'decimal:2',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function stockItems()
    {
        return $this->hasMany(StockItem::class, 'variant_id');
    }
    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items');
    }
}
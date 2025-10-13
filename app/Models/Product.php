<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Enums\ProductStatus;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'status'
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
            'status' => ProductStatus::class,
        ];
    }

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
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
    public function categories()
    {
        return $this->morphToMany(Category::class, 'categoryable');
    }
    public function images()
    {
        return $this->morphMany(Imageable::class, 'imageable');
    }
}
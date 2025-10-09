<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'slug',
        'description',
        'parent_id',
        'level',
        'position',
    ];

    protected $casts = [
        'level' => 'integer',
        'position' => 'integer',
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function categoryables()
    {
        return $this->morphToMany(
            Model::class,
            'categoryable',
            'categoryables',
            'category_id',
            'categoryable_id'
        );
    }
}
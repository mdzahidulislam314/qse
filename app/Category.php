<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;


class Category extends Model
{
    protected $guarded = [];

    protected $table = 'category';

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function scopeParents($query)
    {
        return $query->where('parent_id', null);
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function scopeShowhomepage($query)
    {
        return $query->where('show_homepage', 1);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

}

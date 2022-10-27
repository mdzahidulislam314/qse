<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public function blogCategory()
    {
        return $this->belongsTo(BlogCategory::class,'cat_id');
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(6);
    }
}

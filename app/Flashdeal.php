<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Flashdeal extends Model
{
    public function flashdealProducts()
    {
        return $this->hasMany(FlashDealProduct::class);
    }
}

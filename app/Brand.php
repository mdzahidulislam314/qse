<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    /**
     * @var int|mixed
     */

    protected $fillable = ['name','status','image','slug'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}

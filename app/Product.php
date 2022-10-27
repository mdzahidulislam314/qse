<?php

namespace App;

use Gloudemans\Shoppingcart\Facades\Cart;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Product extends Model
{

    protected $guarded = ['id'];

    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.details' => 5,
            'products.description' => 2,
        ],
    ];

    public function productAltImages()
    {
        return $this->hasMany('App\ProductImage', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function wishlistCustomers()
    {
        return $this->belongsToMany(Customer::class)->withTimestamps();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status',1);
    }

    public function presentPrice()
    {
        return '$'.number_format($this->price / 100, 2);
    }

    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(6);
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        $extraFields = [
            'categories' => $this->categories->pluck('name')->toArray(),
        ];

        return array_merge($array, $extraFields);
    }

    /**
     * Scope a query to only include active users.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('is_enable', 1);
    }

    public function scopeNewarrival($query)
    {
        return $query->where('new_arrival', 1);
    }

    public function getPrice()
    {
        if ($this->spacial_price > 0 && $this->spacial_price !== null){
            return $this->spacial_price;
        }else{
            return $this->price;
        }
    }
}

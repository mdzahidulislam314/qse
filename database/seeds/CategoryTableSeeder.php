<?php

use App\Category;
use App\Subcategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Laptops', 'slug' => 'laptops', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Cooking', 'slug' => 'cooking', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mobile Phones', 'slug' => 'mobile-phones', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Tablets', 'slug' => 'tablets', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Digital Cameras', 'slug' => 'digital-cameras', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Appliances', 'slug' => 'appliances', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lighting', 'slug' => 'lighting', 'created_at' => $now, 'updated_at' => $now],
        ]);

        Subcategory::insert([
            ['name' => 'Dell', 'slug' => 'dell','category_id'=>'1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lenevo', 'slug' => 'lenevo','category_id'=>'1', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Rich Cooker', 'slug' => 'rich-cooker','category_id'=>'2', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Curry Cooker', 'slug' => 'curry-cooker', 'category_id'=>'2','created_at' => $now, 'updated_at' => $now],

            ['name' => 'Walton Mobile', 'slug' => 'walton-mobile','category_id'=>'3', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Samsung Mobile', 'slug' => 'samsung-mobile', 'category_id'=>'3','created_at' => $now, 'updated_at' => $now],

        ]);
    }

}

<?php

use App\Subcategory;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubcategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Subcategory::insert([
            ['name' => 'Dell', 'slug' => 'dell','category_id'=>'1', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Lenevo', 'slug' => 'lenevo','category_id'=>'1', 'created_at' => $now, 'updated_at' => $now],

            ['name' => 'Rich Cooker', 'slug' => 'rich-cooker','category_id'=>'2', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Rich Cooker', 'slug' => 'rich-cooker', 'category_id'=>'2','created_at' => $now, 'updated_at' => $now],

            ['name' => 'Walton Mobile', 'slug' => 'walton-mobile','category_id'=>'3', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Samsung Mobile', 'slug' => 'samsung-mobile', 'category_id'=>'3','created_at' => $now, 'updated_at' => $now],

        ]);
    }
}

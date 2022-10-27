<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('slug')->unique();
            $table->longText('details')->nullable();
            $table->integer('brand_id')->nullable();
            $table->string('brand_name')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('subcategory_id')->nullable();
            $table->integer('price')->nullable();
            $table->integer('spacial_price')->nullable();
            $table->integer('offer_price')->nullable();
            $table->longText('description')->nullable();
            $table->string('video_link')->nullable();
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->date('pro_new_from')->nullable();
            $table->date('pro_new_to')->nullable();
            $table->unsignedInteger('quantity')->default(10);
            $table->boolean('featured')->default(false);
            $table->boolean('new_arrival')->default(false);
            $table->boolean('is_enable')->default(false);
            $table->boolean('hot_deal')->default(false);
            $table->boolean('todays_deal')->default(false);
            $table->text('colors')->nullable();
            $table->text('sizes')->nullable();
            $table->text('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->string('meta_img')->nullable();
            $table->longText('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

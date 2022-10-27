<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlashsellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flashsells', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('title_link')->nullable();
            $table->string('image')->nullable();
            $table->string('button_link')->nullable();
            $table->string('open_new_tab')->nullable();
            $table->integer('regular_price')->nullable();
            $table->integer('discount_price')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('type');
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
        Schema::dropIfExists('flashsells');
    }
}

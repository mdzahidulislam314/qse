<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->unsigned()->nullable();
            $table->string('billing_email')->nullable();
            $table->longText('order_note')->nullable();
            $table->integer('order_status')->default(1);
            $table->integer('payment_status')->default(1);
            $table->string('billing_name')->nullable();
            $table->string('shipping_address_2')->nullable();
            $table->string('shipping_address')->nullable();
            $table->integer('shipping_cost')->nullable();
            $table->string('shipping_method')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('billing_phone')->nullable();
            $table->integer('billing_discount')->default(0);
            $table->string('billing_discount_code')->nullable();
            $table->integer('billing_subtotal');
            $table->integer('billing_tax');
            $table->integer('billing_total');
            $table->string('invoice_no')->unique();
            $table->string('order_id')->unique();
            $table->string('shipped_by')->nullable();
            $table->string('estimated_delivery_time')->nullable();
            $table->string('error')->nullable();
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
        Schema::dropIfExists('orders');
    }
}

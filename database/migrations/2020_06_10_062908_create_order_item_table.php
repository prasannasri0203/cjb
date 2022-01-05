<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('merchandise_product_id');
            $table->string('supplier_id');
            $table->string('product_price');
            $table->string('product_quantity');
            $table->boolean('status')->default(1)->comment('1 - Pending, 2 - Completed, 3 - Cancelled, 4 - Return');
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
        Schema::dropIfExists('order_item');
    }
}

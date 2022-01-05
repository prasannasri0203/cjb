<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartItemManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_item_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cart_id');
            $table->string('customer_id');
            $table->string('merchandise_product_id');
            $table->integer('quantity')->nullable();
            $table->string('placed_date')->nullable();
            $table->boolean('status')->default(1)->comment('1 - Pending, 2 - Placed, 3 - Cancelled');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart_item_management');
    }
}

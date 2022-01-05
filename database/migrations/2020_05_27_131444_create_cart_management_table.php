<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_management', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->string('customer_id');
            $table->string('packing_id')->nullable();
            $table->string('shipping_price')->nullable();
            $table->string('created_time')->nullable();
            $table->string('placed_time')->nullable();
            $table->string('completed_time')->nullable(); 
            $table->string('cancelled_time')->nullable(); 
            $table->string('notes')->nullable();
            $table->boolean('status')->default(1)->comment('1 - Pending, 2 - Placed, 3 - Completed, 4 - Cancelled');
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
        Schema::dropIfExists('cart_management');
    }
}

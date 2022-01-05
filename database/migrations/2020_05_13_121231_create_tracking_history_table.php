<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackingHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracking_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('shipping_info_id')->nullable();
            $table->string('shipping_method')->nullable();        
            $table->string('shipping_company')->nullable();
            $table->string('tracking_num')->nullable(); 
            $table->string('shipping_date')->nullable();           
            $table->string('comments')->nullable();
            $table->integer('order_status_id')->default(1)->comment('1 - Ready To Ship, 2 - Shipped, 3 - Arrived Hub, 4 - Out for Delivery, 5 - Deliverd, 6 -Cancelled');
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
        Schema::dropIfExists('tracking_history');
    }
}

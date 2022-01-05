<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderCustomerAddressManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_customer_address_management', function (Blueprint $table) {            
        $table->bigIncrements('id');
        $table->string('customer_id');
        $table->string('deleivery_name')->nullable();
        $table->string('no');
        $table->string('street_1');
        $table->string('street_2');
        $table->string('region');
        $table->string('country');
        $table->string('zipcode');
        $table->string('contact_no');
        $table->string('landmark')->nullable();
        $table->boolean('is_primary')->default(1)->comment('1 - Yes, 0 - No');
        $table->boolean('status')->default(1)->comment('1 - Active, 0 - Deactive');
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
        Schema::dropIfExists('customer_address_management');
    }
}

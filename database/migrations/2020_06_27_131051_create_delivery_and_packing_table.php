<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveryAndPackingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_and_packing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('type', ['1', '2']);
            $table->string('delivery_name', 64);
            $table->string('delivery_key');
            $table->bigInteger('delivery_value');
            $table->enum('delivery_status', ['0', '1']);	
            $table->timestamp('delivery_created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('delivery_updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->longText('delivery_desc');
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
        Schema::dropIfExists('delivery_and_packing');
    }
}

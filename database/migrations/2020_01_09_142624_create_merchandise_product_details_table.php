<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchandiseProductDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandise_product_details', function (Blueprint $table) {
            $table->unsignedBigInteger('merchandise_product_id');
            $table->string('image_view', 32)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('img_draw', 255)->nullable();
            
            $table->foreign('merchandise_product_id')->references('id')->on('merchandise_products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise_product_details');
    }
}

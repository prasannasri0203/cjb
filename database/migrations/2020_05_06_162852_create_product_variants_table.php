<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products');
            $table->string('variant_name');
            $table->unsignedBigInteger('option_id');
            $table->foreign('option_id')->references('id')->on('product_options'); 
            $table->unsignedBigInteger('value_id');
            $table->foreign('value_id')->references('id')->on('product_option_values');
            $table->string('sku', 32)->unique();
            $table->string('product_image');
            $table->float('price');
            $table->integer('quantites');
            $table->integer('width');
            $table->integer('height');
            $table->string('top')->nullable();
            $table->tinyInteger('status')->comment = '0=Inactive, 1=active';
            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');  
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->softDeletes();
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
        Schema::dropIfExists('product_variants');
    }
}

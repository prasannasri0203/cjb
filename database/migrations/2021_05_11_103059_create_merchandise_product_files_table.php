<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchandiseProductFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandise_product_files', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->bigInteger('product_id')->nullable();
			$table->bigInteger('merch_product_id');
			$table->bigInteger('product_variant_id');
			$table->enum('type', array('image','layer'));
			$table->string('image');
			$table->string('file');
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
        Schema::dropIfExists('merchandise_product_files');
    }
}

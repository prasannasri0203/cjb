<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultiplecoloumnsToMerchandiseProductImages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchandise_product_images', function (Blueprint $table) {
            $table->string('file')->nullable();
			$table->string('sort')->nullable();
			$table->enum('type',array('image','layer'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandise_product_images', function (Blueprint $table) {
            $table->dropColumn(['file','sort','type']);
        });
    }
}

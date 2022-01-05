<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultiplecoloumnsToMerchandiseProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('merchandise_products', function (Blueprint $table) {
            $table->string('artist_category_id');
			$table->integer('merchandise_master_id')->nullable();
			$table->string('merchandise_product_name');
			$table->string('product_price');
			$table->string('artist_price')->nullable();
			$table->string('actual_price')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('merchandise_products', function (Blueprint $table) {
             $table->dropColumn(['artist_category_id','merchandise_master_id','merchandise_product_name','product_price','artist_price','actual_price']);
        });
    }
}

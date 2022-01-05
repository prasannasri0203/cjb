<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultiplecoloumnsToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('reference_number')->nullable();
            $table->string('print_type')->nullable();
            $table->string('print_price')->nullable();
            $table->string('approved_additional_type')->nullable();
            $table->string('approved_additional_price')->nullable();
			$table->string('desgin_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['reference_number','print_type','print_price','approved_additional_type','approved_additional_price','desgin_type']);
        });
    }
}

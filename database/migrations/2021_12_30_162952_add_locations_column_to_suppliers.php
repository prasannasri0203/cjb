<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationsColumnToSuppliers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void address
     */
    public function up()
    {
        Schema::table('suppliers', function (Blueprint $table) {
             $table->string('pincode')->nullable()->after('address');
             $table->string('latitude')->nullable()->after('pincode');
             $table->string('longitude')->nullable()->after('latitude');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('suppliers', function (Blueprint $table) {
            //
        });
    }
}

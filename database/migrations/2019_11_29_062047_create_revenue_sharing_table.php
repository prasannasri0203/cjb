<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRevenueSharingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenue_sharing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('setting_name', 64);
            $table->string('setting_key');
            $table->bigInteger('setting_value');
            $table->enum('setting_status', ['0', '1']);	
            $table->timestamp('setting_created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('setting_updated')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));	
            $table->longText('setting_desc');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('revenue_sharing');
    }
}

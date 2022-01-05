<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCjbThemesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('cjb_themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('theme_name');
            $table->string('dark_color');
            $table->string('light_color');
            $table->tinyInteger('status')->default(1)->comment('1-Active, 0-In-active');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cjb_themes');
    }
}

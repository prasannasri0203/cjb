<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaultsReturnsHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faults_returns_history', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('fault_id')->nullable();
            $table->string('remarks')->nullable();
            $table->enum('status',['pending','processing','completed'])->nullable(); 
            $table->timestamps();
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
        Schema::dropIfExists('faults_returns_history');
    }
}

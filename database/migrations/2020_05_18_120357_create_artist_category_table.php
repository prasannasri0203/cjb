<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtistCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('artist_category', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('category_name');
            $table->string('describe_category');
            $table->string('category_keyword');
            $table->string('category_search_keyword');
            $table->string('sort_order');
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
        Schema::dropIfExists('artist_category');
    }
}

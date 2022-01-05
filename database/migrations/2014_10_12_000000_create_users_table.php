<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 64)->unique();
            $table->string('first_name', 32)->nullable();
            $table->string('last_name', 32)->nullable();
            $table->string('email', 64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->tinyInteger('type')->nullable()->comment = "1=Artist;2=Customer;";
            $table->bigInteger('contact_number')->nullable();
            $table->string('gender', 16)->nullable();
            $table->text('dob')->nullable();
            $table->text('address_1')->nullable();
            $table->text('address_2')->nullable();
            $table->string('city', 64)->nullable();
            $table->string('state', 64)->nullable();
            $table->string('country', 64)->nullable();
            $table->string('post_code', 16)->nullable();
            $table->string('profile_image', 255)->nullable();
            $table->string('language', 8)->default('en');
            $table->string('currency', 16)->nullable();
            $table->tinyInteger('status')->default('0')->comment = "1=Active;0=Inactive;";
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddArtistsDesignRatesToRevenueSharing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('revenue_sharing', function (Blueprint $table) {
            $table->string('artists_design_rates')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('revenue_sharing', function (Blueprint $table) {
            $table->dropColumn('artists_design_rates');
        });
    }
}

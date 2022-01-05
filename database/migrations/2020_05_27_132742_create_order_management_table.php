<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderManagementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_management', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('cart_id');
            $table->string('order_ref_number');
            $table->string('customer_id');
            $table->string('billing_address_id');
            $table->string('shipping_address_id');
            $table->string('payment_type');
            $table->string('shipping_item_count')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('packing_name')->nullable();
            $table->string('packing_amount')->nullable();
            // $table->string('delivery_name')->nullable();
            $table->string('delivery_amount')->nullable();
            $table->string('tax_total')->nullable();
            $table->string('discount_total')->nullable();
            $table->string('shipping_total')->nullable(); 
            $table->string('grand_total')->nullable();
            $table->string('artist_id')->nullable();
            $table->string('artist_percent')->nullable();
            $table->string('artist_revenue')->nullable();
            $table->string('affiliate_id')->nullable();
            $table->string('affiliate_percent')->nullable();
            $table->string('affiliate_revenue')->nullable();
            $table->string('admin_percent')->nullable();
            $table->string('admin_revenue')->nullable();
            $table->string('order_api_response')->nullable();            
            $table->string('notes')->nullable();
            $table->string('release_status')->nullable();
            $table->boolean('status')->default(1)->comment('1 - Pending, 2 - Completed, 3 - Cancelled, 4 - Return');
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
        Schema::dropIfExists('order_management');
    }
}

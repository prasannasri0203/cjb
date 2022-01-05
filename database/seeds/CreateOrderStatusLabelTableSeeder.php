<?php

use Illuminate\Database\Seeder;

class CreateOrderStatusLabelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status_label')->delete();      
        $users = [
	        ['order_status_label' 		=> 'Ready To Ship',],
	        ['order_status_label' 		=> 'Shipped', ],
	        ['order_status_label' 		=> 'Arrived Hub',],
	        ['order_status_label' 		=> 'Out for Delivery',],
            ['order_status_label' 		=> 'Deliverd',],
            ['order_status_label' 		=> 'Cancelled',],
	    ];
         DB::table('order_status_label')->insert($users);
    }
}
        
   


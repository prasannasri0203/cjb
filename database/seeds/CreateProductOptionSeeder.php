<?php

use Illuminate\Database\Seeder;
use App\ProductOption;

class CreateProductOptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void product_options
     */
    public function run()
    {
         $options = [
           'size',
           'colour' 
        ];


        foreach ($options as $op) {
          $name_chk=ProductOption::where('name',$op)->first();
            if(!$name_chk){
               ProductOption::create(['name' => $op]);
            }
        }
    }
}

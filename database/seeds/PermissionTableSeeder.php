<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'supplier-list',
           'supplier-create',
           'supplier-edit',
           'supplier-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
           'color-list', 
           'color-create',
           'color-edit',
           'color-delete',
           'faq-list',
           'faq-create',
           'faq-edit',
           'faq-delete',
           'cms-list',
           'cms-create',
           'cms-edit',
           'cms-delete',
           'videos-list',
           'videos-create',
           'videos-delete',
           'preset-list',
           'preset-create',
           'preset-delete',
           'preset-edit',
           'emoji-list',
           'emoji-create',
           'emoji-delete',
           'emoji-edit',
           'order-list',
           'order-create',
           'order-delete',
           'order-edit',
           'product-delete',
           'product-create',
           'product-list',
           'product-edit'
        ];


        foreach ($permissions as $permission) {
          $name_chk=Permission::where('name',$permission)->first();
            if(!$name_chk){
               Permission::create(['name' => $permission]);
            }
        }
    }
}

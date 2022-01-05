<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminTableDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            ['name' => 'admin', 'email' => 'admin@yopmail.com', 'phone_number' => '9876543210', 'status' => '1']
        ];
        foreach ($admins as $admin) {
            $newuser = User::create($admin);
            $newuser->assignRole('Admin');
        }
    }
}

<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[ 'name' => 'xyz', 'first_name' => 'Superadmin', 'last_name' => '', 'email' => 'admin@yopmail.com', 'password' => bcrypt('123456789') ,'facebook_id' => '1' , 'twitter_id' => '1', 'status' => '1' ]
        ];

        foreach ($users as $user) {
            $newuser = User::create($user);
            $newuser->assignRole('Super Admin');
        }
    }
}

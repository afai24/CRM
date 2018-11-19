<?php

use Illuminate\Database\Seeder;
use crm\Role;
use crm\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name','user')->first();
        $role_admin = Role::where('name','admin')->first();

        $user = new User();
        $user->name = "admin";
        $user->email = "admin@admin.com";
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}

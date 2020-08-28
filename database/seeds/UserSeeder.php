<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin  = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'Daniel';
        $admin->lastname = 'Vargas Sibaja';
        $admin->phone = '+1234555551';
        $admin->email = 'lineadan@gmail.com';
        $admin->password = bcrypt('12345678');
        $admin->address = 'CQ';
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}

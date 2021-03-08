<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\RoleUser;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
         "name" => "Super Admin",
         "email" => "chxnge@hotmail.com",
         "username" => "SAdmin",
         "dni" => "98653245",
         "password" => Hash::make('PSANTILLAN2020')
        ]);

        $user->roles()->attach(Role::where('name', 'super')->first());
    }
}
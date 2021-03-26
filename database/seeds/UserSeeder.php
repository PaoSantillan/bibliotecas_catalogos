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
         "nombre" => "Super Admin",
         "email" => "super@super.com",
         "username" => "admin",
         "dni" => "33333333",
         "password" => Hash::make('SUPERADMIN2021')
        ]);

        $user->roles()->attach(Role::where('name', 'super')->first());

        $user = User::create([
            "nombre" => "Fabiana Bustos",
            "email" => "fbustos@catamarcaciudad.gob.ar",
            "username" => "fbustos",
            "dni" => "33333332",
            "password" => Hash::make('FBUSTOS2021')
           ]);
   
        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
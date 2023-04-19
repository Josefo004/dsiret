<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\User::create([
        	'name' => 'JC MOUSE',
        	'username' => 'superadmin',
        	'password' => 'S1st3m4s',
        ]);
        App\Models\User::create([
        	'name' => 'ADMINISTRADOR',
        	'username' => 'admin',
        	'password' => 'S1st3m4s',
        ]);
        App\Models\User::create([
        	'name' => 'INVITADO',
        	'username' => 'invitado',
        	'password' => '12345678',
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class EmpresasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Empresa::create([
			'nombre' => 'GOBIERNO AUTONOMO DEPARTAMENTAL DE CHUQUISACA',
			'sigla' => 'GADCH',
			'slogan' => 'Camino al bicentenario',
			'logo' => 'gadch.png',
			'direccion' => 'Plaza 25 de mayo',
			'zona' => 'CENTRAL',
			'telefono' => '',
			'email' => 'correo@chuquisaca.gob.bo'
        ]);
    }
}

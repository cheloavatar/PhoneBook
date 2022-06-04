<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipios')->Insert([
        	'nombre'=>'Armería'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Colima'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Comala'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Coquimatlán'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Cuauhtémoc'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Ixtlahuacán'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Manzanillo'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Minatitlán'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Tecomán'
        ]);
        DB::table('municipios')->Insert([
        	'nombre'=>'Villa de Álvarez'
        ]);
        DB::table('municipios')->Insert([
            'nombre'=>'Otro'
        ]);
    }
}

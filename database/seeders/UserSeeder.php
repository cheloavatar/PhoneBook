<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->Insert([
        	'name'=>'CESAR ALEJANDRO GARCIA CORTES',
        	'email'=>'cheloavatar@gmail.com',
        	'password'=>bcrypt('chelo1990'),
            'profile_photo_path'=> 'default.jpg'
        ]);
    }
}

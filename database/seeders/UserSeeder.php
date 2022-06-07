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
        	'name'=>'Administrator',
        	'email'=>'admin@admin.com',
        	'password'=>bcrypt('admin'),
            'profile_photo_path'=> 'default.jpg'
        ]);
    }
}

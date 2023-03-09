<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Anthony Carl Meniado',
            'email' => 'carlsus@gmail.com',
            'password' => bcrypt('password'),
            'position' => 'Web Developer',
            'built_in' => 1,
        ]);


        DB::table('users')->insert([
            'id' => 2,
            'name' => 'John Doe',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),
            'position' => 'System Administrator',
            'built_in' => 0,
        ]);
    }
}

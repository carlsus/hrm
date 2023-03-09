<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([
            'id' => 1,
            'department' => 'Accounting',
            'user_id' => 2
        ]);
        DB::table('departments')->insert([
            'id' => 2,
            'department' => 'Information Technology',
            'user_id' => 2
        ]);
        DB::table('departments')->insert([
            'id' => 3,
            'department' => 'Audit',
            'user_id' => 2
        ]);

    }
}

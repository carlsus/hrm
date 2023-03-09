<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        $this->call(UsersTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);



        // //Country
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/countries.sql'));
        $this->command->info('Countries table seeded!');
        //Permission
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/permissions.sql'));
        $this->command->info('Permissions table seeded!');
        //Roles
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/roles.sql'));
        $this->command->info('Roles table seeded!');
        //roles permission
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/role_has_permissions.sql'));
        $this->command->info('Roles Permission table seeded!');
        //model roles
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/model_has_roles.sql'));
        $this->command->info('Model Roles table seeded!');
        //model roles
        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/permissions_group.sql'));
        $this->command->info('Permission Group table seeded!');

        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/vw_deduction.sql'));
        $this->command->info('View Deduction');

        DB::unprepared(file_get_contents(base_path().'/database/seeds/sql/vw_payslip.sql'));
        $this->command->info('Payslip');
    }
}

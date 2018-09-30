<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i<10; $i++) {
            $this->call(UsersTableSeeder::class);
        }

        for ($i=0; $i<5; $i++) {
            $this->call(CompaniesTableSeeder::class);
        }

        for ($i=0; $i<50; $i++) {
            $this->call(PivotTableSeeder::class);
        }
    }
}

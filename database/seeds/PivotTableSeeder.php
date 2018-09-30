<?php

use Illuminate\Database\Seeder;

class PivotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_user')->insert([
            'company_id' => rand(1, 5),
            'user_id' => rand(1, 10),
        ]);
    }
}

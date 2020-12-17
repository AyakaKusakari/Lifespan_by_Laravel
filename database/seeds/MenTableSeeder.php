<?php

use Illuminate\Database\Seeder;

class MenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('men_age')->insert([
            'age' => '81',
        ]);
        DB::table('men_age')->insert([
            'age' => '72',
        ]);
    }
}

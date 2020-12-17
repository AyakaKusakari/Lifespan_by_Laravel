<?php

use Illuminate\Database\Seeder;

class WomenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('women_age')->insert([
            'age' => '87',
        ]);
        DB::table('women_age')->insert([
            'age' => '75',
        ]);
    }
}

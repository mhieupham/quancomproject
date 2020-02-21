<?php

use Illuminate\Database\Seeder;

class FoodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('foods')->insert([
            'name_food' => 'Cơm 30k',
            'price_food' => '30000'
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class PersonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('persons')->insert([
            'id'=>1,
            'name' => 'Evelin Paola Izaguirre',
            'mobile'=>'98626731',
            'status'=>'1',
        ]);
        
    }
}

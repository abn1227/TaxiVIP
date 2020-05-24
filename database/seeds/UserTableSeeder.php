<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id'=>1,
            'email' => 'evelinizaguirre2015@gmail.com',
            'password'=>bcrypt('asd.45678'),
            'type_users_id'=>'1',
            'persons_id'=>'1',
            'status'=>'1'
        ]);
        
    }
}
